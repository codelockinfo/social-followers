<?php
include_once '../append/connection.php';
include_once ABS_PATH . '/user/cls_functions.php';
require_once '../cls_shopifyapps/config.php';
$cls_functions = new Client_functions($_GET['store']);
   
?>