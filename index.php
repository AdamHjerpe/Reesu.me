<?php
session_start();
function compress_page($buffer) { $search = array("/<!–\{(.*?)\}–>|<!–(.*?)–>|[\t\r\n]|<!–|–>|\/\/ <!–|\/\/ –>|<!\[CDATA\[|\/\/ \]\]>|\]\]>|\/\/\]\]>|\/\/<!\[CDATA\[/" => ""); $buffer = preg_replace(array_keys($search), array_values($search), $buffer); return $buffer; }
ob_start('compress_page');
include("include/ini.php");
mysql_query("SET NAMES 'utf8'") or die(mysql_error());
mysql_query("SET CHARACTER SET 'utf8'") or die(mysql_error()); 	
get_header();
get_page();
get_footer();
ob_end_flush();
?>