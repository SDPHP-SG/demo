<?php

defined('ROOTDIR') or define('ROOTDIR', dirname(__FILE__) . '/');

function __autoload($class_name) {
	require_once ROOTDIR . 'libraries/' . $class_name . '.php';
}

//include("controllers/page2.php");

$rtr = new Router();
$rtr->parseRoute();
$page_id = $rtr->page;

include("controllers/$page_id.php");