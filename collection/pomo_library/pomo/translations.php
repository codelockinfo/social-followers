<?php
require_once dirname(__FILE__) . '/plural-forms.php';
require_once dirname(__FILE__) . '/entry.php';
if ( ! class_exists( 'Translations', false ) ):
class Translations {
	var $entries = array();
	var $headers = array();
	function add_entry($entry) {
		if (is_array($entry)) {
			$entry = new Translation_Entry($entry);
		}
		$key = $entry->key();
		if (false === $key) return false;
		$this->entries[$key] = &$entry;
		return true;
	}
	function add_entry_or_merge($entry) {
		if (is_array($entry)) {
			$entry = new Translation_Entry($entry);
		}
		$key = $entry->key();
		if (false === $key) return false;
		if (isset($this->entries[$key]))
			$this->entries[$key]->merge_with($entry);
		else
			$this->entries[$key] = &$entry;
		return true;
	}
	function set_header($header, $value) {
		$this->headers[$header] = $value;
	}
	function set_headers($headers) {
		foreach($headers as $header => $value) {
			$this->set_header($header, $value);
		}
	}
	function get_header($header) {
		return isset($this->headers[$header])? $this->headers[$header] : false;
	}
	function translate_entry(&$entry) {
		$key = $entry->key();
		return isset($this->entries[$key])? $this->entries[$key] : false;
	}
	function translate($singular, $context=null) {
		$entry = new Translation_Entry(array('singular' => $singular, 'context' => $context));
		$translated = $this->translate_entry($entry);
		return ($translated && !empty($translated->translations))? $translated->translations[0] : $singular;
	}
	function select_plural_form($count) {
		return 1 == $count? 0 : 1;
	}
	function get_plural_forms_count() {
		return 2;
	}
	function translate_plural($singular, $plural, $count, $context = null) {
		$entry = new Translation_Entry(array('singular' => $singular, 'plural' => $plural, 'context' => $context));
		$translated = $this->translate_entry($entry);
		$index = $this->select_plural_form($count);
		$total_plural_forms = $this->get_plural_forms_count();
		if ($translated && 0 <= $index && $index < $total_plural_forms &&
				is_array($translated->translations) &&
				isset($translated->translations[$index]))
			return $translated->translations[$index];
		else
			return 1 == $count? $singular : $plural;
	}
	function merge_with(&$other) {
		foreach( $other->entries as $entry ) {
			$this->entries[$entry->key()] = $entry;
		}
	}
	function merge_originals_with(&$other) {
		foreach( $other->entries as $entry ) {
			if ( !isset( $this->entries[$entry->key()] ) )
				$this->entries[$entry->key()] = $entry;
			else
				$this->entries[$entry->key()]->merge_with($entry);
		}
	}
}
class Gettext_Translations extends Translations {
	function gettext_select_plural_form($count) {
		if (!isset($this->_gettext_select_plural_form) || is_null($this->_gettext_select_plural_form)) {
			list( $nplurals, $expression ) = $this->nplurals_and_expression_from_header($this->get_header('Plural-Forms'));
			$this->_nplurals = $nplurals;
			$this->_gettext_select_plural_form = $this->make_plural_form_function($nplurals, $expression);
		}
		return call_user_func($this->_gettext_select_plural_form, $count);
	}
	function nplurals_and_expression_from_header($header) {
		if (preg_match('/^\s*nplurals\s*=\s*(\d+)\s*;\s+plural\s*=\s*(.+)$/', $header, $matches)) {
			$nplurals = (int)$matches[1];
			$expression = trim( $matches[2] );
			return array($nplurals, $expression);
		} else {
			return array(2, 'n != 1');
		}
	}
	function make_plural_form_function($nplurals, $expression) {
		try {
			$handler = new Plural_Forms( rtrim( $expression, ';' ) );
			return array( $handler, 'get' );
		} catch ( Exception $e ) {
			return $this->make_plural_form_function( 2, 'n != 1' );
		}
	}
	function parenthesize_plural_exression($expression) {
		$expression .= ';';
		$res = '';
		$depth = 0;
		for ($i = 0; $i < strlen($expression); ++$i) {
			$char = $expression[$i];
			switch ($char) {
				case '?':
					$res .= ' ? (';
					$depth++;
					break;
				case ':':
					$res .= ') : (';
					break;
				case ';':
					$res .= str_repeat(')', $depth) . ';';
					$depth= 0;
					break;
				default:
					$res .= $char;
			}
		}
		return rtrim($res, ';');
	}
	function make_headers($translation) {
		$headers = array();
		$translation = str_replace('\n', "\n", $translation);
		$lines = explode("\n", $translation);
		foreach($lines as $line) {
			$parts = explode(':', $line, 2);
			if (!isset($parts[1])) continue;
			$headers[trim($parts[0])] = trim($parts[1]);
		}
		return $headers;
	}
	function set_header($header, $value) {
		parent::set_header($header, $value);
		if ('Plural-Forms' == $header) {
			list( $nplurals, $expression ) = $this->nplurals_and_expression_from_header($this->get_header('Plural-Forms'));
			$this->_nplurals = $nplurals;
			$this->_gettext_select_plural_form = $this->make_plural_form_function($nplurals, $expression);
		}
	}
}
endif;
if ( ! class_exists( 'NOOP_Translations', false ) ):
class NOOP_Translations {
	var $entries = array();
	var $headers = array();
	function add_entry($entry) {
		return true;
	}
	function set_header($header, $value) {
	}
	function set_headers($headers) {
	}
	function get_header($header) {
		return false;
	}
	function translate_entry(&$entry) {
		return false;
	}
	function translate($singular, $context=null) {
		return $singular;
	}
	function select_plural_form($count) {
		return 1 == $count? 0 : 1;
	}
	function get_plural_forms_count() {
		return 2;
	}
	function translate_plural($singular, $plural, $count, $context = null) {
			return 1 == $count? $singular : $plural;
	}
	function merge_with(&$other) {
	}
}
endif;
