<?php
session_start();

// Outputs HTML on one line
function compress_page($buffer) { $search = array("/<!–\{(.*?)\}–>|<!–(.*?)–>|[\t\r\n]|<!–|–>|\/\/ <!–|\/\/ –>|<!\[CDATA\[|\/\/ \]\]>|\]\]>|\/\/\]\]>|\/\/<!\[CDATA\[/" => ""); $buffer = preg_replace(array_keys($search), array_values($search), $buffer); return $buffer; }

ob_start('compress_page');

// Include our initiate file
include("inc/initiate.php");

// Set names
mysql_query("SET NAMES 'utf8'") or die(mysql_error());
mysql_query("SET CHARACTER SET 'utf8'") or die(mysql_error());

// Collect data from user	
get_ipadress();
iplog();
online();
lastseen();

// Page structure
get_head();
get_page();
get_foot();

ob_end_flush();
?>