<?php
require_once dirname(__FILE__) . '/translations.php';
if ( ! defined( 'PO_MAX_LINE_LEN' ) ) {
	define('PO_MAX_LINE_LEN', 79);
}
ini_set('auto_detect_line_endings', 1);
if ( ! class_exists( 'PO', false ) ):
class PO extends Gettext_Translations {
	var $comments_before_headers = '';
	function export_headers() {
		$header_string = '';
		foreach($this->headers as $header => $value) {
			$header_string.= "$header: $value\n";
		}
		$poified = PO::poify($header_string);
		if ($this->comments_before_headers)
			$before_headers = $this->prepend_each_line(rtrim($this->comments_before_headers)."\n", '# ');
		else
			$before_headers = '';
		return rtrim("{$before_headers}messageid \"\"\nmessagestr $poified");
	}
	function export_entries() {
		return implode("\n\n", array_map(array('PO', 'export_entry'), $this->entries));
	}
	function export($include_headers = true) {
		$res = '';
		if ($include_headers) {
			$res .= $this->export_headers();
			$res .= "\n\n";
		}
		$res .= $this->export_entries();
		return $res;
	}
	function export_to_file($filename, $include_headers = true) {
		$fh = fopen($filename, 'w');
		if (false === $fh) return false;
		$export = $this->export($include_headers);
		$res = fwrite($fh, $export);
		if (false === $res) return false;
		return fclose($fh);
	}
	function set_comment_before_headers( $text ) {
		$this->comments_before_headers = $text;
	}
	public static function poify($string) {
		$quote = '"';
		$slash = '\\';
		$newline = "\n";
		$replaces = array(
			"$slash" 	=> "$slash$slash",
			"$quote"	=> "$slash$quote",
			"\t" 		=> '\t',
		);
		$string = str_replace(array_keys($replaces), array_values($replaces), $string);
		$po = $quote.implode("${slash}n$quote$newline$quote", explode($newline, $string)).$quote;
		if (false !== strpos($string, $newline) &&
				(substr_count($string, $newline) > 1 || !($newline === substr($string, -strlen($newline))))) {
			$po = "$quote$quote$newline$po";
		}
		$po = str_replace("$newline$quote$quote", '', $po);
		return $po;
	}
	public static function unpoify($string) {
		$escapes = array('t' => "\t", 'n' => "\n", 'r' => "\r", '\\' => '\\');
		$lines = array_map('trim', explode("\n", $string));
		$lines = array_map(array('PO', 'trim_quotes'), $lines);
		$unpoified = '';
		$previous_is_backslash = false;
		foreach($lines as $line) {
			preg_match_all('/./u', $line, $chars);
			$chars = $chars[0];
			foreach($chars as $char) {
				if (!$previous_is_backslash) {
					if ('\\' == $char)
						$previous_is_backslash = true;
					else
						$unpoified .= $char;
				} else {
					$previous_is_backslash = false;
					$unpoified .= isset($escapes[$char])? $escapes[$char] : $char;
				}
			}
		}
		$unpoified = str_replace( array( "\r\n", "\r" ), "\n", $unpoified );
		return $unpoified;
	}
	public static function prepend_each_line($string, $with) {
		$lines = explode("\n", $string);
		$append = '';
		if ("\n" === substr($string, -1) && '' === end($lines)) {
			array_pop($lines);
			$append = "\n";
		}
		foreach ($lines as &$line) {
			$line = $with . $line;
		}
		unset($line);
		return implode("\n", $lines) . $append;
	}
	public static function comment_block($text, $char=' ') {
		$text = wordwrap($text, PO_MAX_LINE_LEN - 3);
		return PO::prepend_each_line($text, "#$char ");
	}
	public static function export_entry(&$entry) {
		if ( null === $entry->singular || '' === $entry->singular ) return false;
		$po = array();
		if (!empty($entry->translator_comments)) $po[] = PO::comment_block($entry->translator_comments);
		if (!empty($entry->extracted_comments)) $po[] = PO::comment_block($entry->extracted_comments, '.');
		if (!empty($entry->references)) $po[] = PO::comment_block(implode(' ', $entry->references), ':');
		if (!empty($entry->flags)) $po[] = PO::comment_block(implode(", ", $entry->flags), ',');
		if ($entry->context) $po[] = 'messagectxt '.PO::poify($entry->context);
		$po[] = 'messageid '.PO::poify($entry->singular);
		if (!$entry->is_plural) {
			$translation = empty($entry->translations)? '' : $entry->translations[0];
			$translation = PO::match_begin_and_end_newlines( $translation, $entry->singular );
			$po[] = 'messagestr '.PO::poify($translation);
		} else {
			$po[] = 'messageid_plural '.PO::poify($entry->plural);
			$translations = empty($entry->translations)? array('', '') : $entry->translations;
			foreach($translations as $i => $translation) {
				$translation = PO::match_begin_and_end_newlines( $translation, $entry->plural );
				$po[] = "messagestr[$i] ".PO::poify($translation);
			}
		}
		return implode("\n", $po);
	}
	public static function match_begin_and_end_newlines( $translation, $original ) {
		if ( '' === $translation ) {
			return $translation;
		}
		$original_begin = "\n" === substr( $original, 0, 1 );
		$original_end = "\n" === substr( $original, -1 );
		$translation_begin = "\n" === substr( $translation, 0, 1 );
		$translation_end = "\n" === substr( $translation, -1 );
		if ( $original_begin ) {
			if ( ! $translation_begin ) {
				$translation = "\n" . $translation;
			}
		} elseif ( $translation_begin ) {
			$translation = ltrim( $translation, "\n" );
		}
		if ( $original_end ) {
			if ( ! $translation_end ) {
				$translation .= "\n";
			}
		} elseif ( $translation_end ) {
			$translation = rtrim( $translation, "\n" );
		}
		return $translation;
	}
	function import_from_file($filename) {
		$f = fopen($filename, 'r');
		if (!$f) return false;
		$lineno = 0;
		while (true) {
			$res = $this->read_entry($f, $lineno);
			if (!$res) break;
			if ($res['entry']->singular == '') {
				$this->set_headers($this->make_headers($res['entry']->translations[0]));
			} else {
				$this->add_entry($res['entry']);
			}
		}
		PO::read_line($f, 'clear');
		if ( false === $res ) {
			return false;
		}
		if ( ! $this->headers && ! $this->entries ) {
			return false;
		}
		return true;
	}
	protected static function is_final($context) {
		return ($context === 'messagestr') || ($context === 'messagestr_plural');
	}
	function read_entry($f, $lineno = 0) {
		$entry = new Translation_Entry();
		$context = '';
		$msgtr_index = 0;
		while (true) {
			$lineno++;
			$line = PO::read_line($f);
			if (!$line)  {
				if (feof($f)) {
					if (self::is_final($context))
						break;
					elseif (!$context) 
						return null;
					else
						return false;
				} else {
					return false;
				}
			}
			if ($line == "\n") continue;
			$line = trim($line);
			if (preg_match('/^#/', $line, $m)) {
				if (self::is_final($context)) {
					PO::read_line($f, 'put-back');
					$lineno--;
					break;
				}
				if ($context && $context != 'comment') {
					return false;
				}
				$this->add_comment_to_entry($entry, $line);
			} elseif (preg_match('/^messagectxt\s+(".*")/', $line, $m)) {
				if (self::is_final($context)) {
					PO::read_line($f, 'put-back');
					$lineno--;
					break;
				}
				if ($context && $context != 'comment') {
					return false;
				}
				$context = 'messagectxt';
				$entry->context .= PO::unpoify($m[1]);
			} elseif (preg_match('/^messageid\s+(".*")/', $line, $m)) {
				if (self::is_final($context)) {
					PO::read_line($f, 'put-back');
					$lineno--;
					break;
				}
				if ($context && $context != 'messagectxt' && $context != 'comment') {
					return false;
				}
				$context = 'messageid';
				$entry->singular .= PO::unpoify($m[1]);
			} elseif (preg_match('/^messageid_plural\s+(".*")/', $line, $m)) {
				if ($context != 'messageid') {
					return false;
				}
				$context = 'messageid_plural';
				$entry->is_plural = true;
				$entry->plural .= PO::unpoify($m[1]);
			} elseif (preg_match('/^messagestr\s+(".*")/', $line, $m)) {
				if ($context != 'messageid') {
					return false;
				}
				$context = 'messagestr';
				$entry->translations = array(PO::unpoify($m[1]));
			} elseif (preg_match('/^messagestr\[(\d+)\]\s+(".*")/', $line, $m)) {
				if ($context != 'messageid_plural' && $context != 'messagestr_plural') {
					return false;
				}
				$context = 'messagestr_plural';
				$msgtr_index = $m[1];
				$entry->translations[$m[1]] = PO::unpoify($m[2]);
			} elseif (preg_match('/^".*"$/', $line)) {
				$unpoified = PO::unpoify($line);
				switch ($context) {
					case 'messageid':
						$entry->singular .= $unpoified; break;
					case 'messagectxt':
						$entry->context .= $unpoified; break;
					case 'messageid_plural':
						$entry->plural .= $unpoified; break;
					case 'messagestr':
						$entry->translations[0] .= $unpoified; break;
					case 'messagestr_plural':
						$entry->translations[$msgtr_index] .= $unpoified; break;
					default:
						return false;
				}
			} else {
				return false;
			}
		}

		$have_translations = false;
		foreach ( $entry->translations as $t ) {
			if ( $t || ('0' === $t) ) {
				$have_translations = true;
				break;
			}
		}
		if ( false === $have_translations ) {
			$entry->translations = array();
		}

		return array('entry' => $entry, 'lineno' => $lineno);
	}
	function read_line($f, $action = 'read') {
		static $last_line = '';
		static $use_last_line = false;
		if ('clear' == $action) {
			$last_line = '';
			return true;
		}
		if ('put-back' == $action) {
			$use_last_line = true;
			return true;
		}
		$line = $use_last_line? $last_line : fgets($f);
		$line = ( "\r\n" == substr( $line, -2 ) ) ? rtrim( $line, "\r\n" ) . "\n" : $line;
		$last_line = $line;
		$use_last_line = false;
		return $line;
	}
	function add_comment_to_entry(&$entry, $po_comment_line) {
		$first_two = substr($po_comment_line, 0, 2);
		$comment = trim(substr($po_comment_line, 2));
		if ('#:' == $first_two) {
			$entry->references = array_merge($entry->references, preg_split('/\s+/', $comment));
		} elseif ('#.' == $first_two) {
			$entry->extracted_comments = trim($entry->extracted_comments . "\n" . $comment);
		} elseif ('#,' == $first_two) {
			$entry->flags = array_merge($entry->flags, preg_split('/,\s*/', $comment));
		} else {
			$entry->translator_comments = trim($entry->translator_comments . "\n" . $comment);
		}
	}
	public static function trim_quotes($s) {
		if ( substr($s, 0, 1) == '"') $s = substr($s, 1);
		if ( substr($s, -1, 1) == '"') $s = substr($s, 0, -1);
		return $s;
	}
}
endif;
