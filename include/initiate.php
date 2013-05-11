<?php
# Define site and salt
define('BASEURL', 'http://reesu.me/');
define('DOMAIN', '.reesu.me');
define('SHA1_KEY', '1pQjau/:3mUQ6%5Z:`)!Yhq$.@*fz,+4X!d4(0V|u|myucjD:ObXg!Or1.YRgUy8');
define('SHA512_KEY', 'AB4W{8 lob>ItU_*Gj^NKQH3Lyk_5j-*C]6R6+h|59|q<W#yuoA|Dsl%G_%6${q[');
define('CONFIM_KEY', '?cGkJHHf*<$[w9`bn|kf`J^$;58I#xJq>fi=rg3sw1_!m@l$<]x{|=mP~#(GuB+L');
define('COOKIE_KEY', '*47EY&u?m_n~)}j$>C17A<+V|%q$*./Ezg0+h#4oC2IPi5zcn@DoJm</Ehq(<?+o');

# Connect to DB
$connect = @mysql_connect('db-host', 'db-user', 'db-pass') or die("Error, could not connect to DB. Try again later");
mysql_select_db('db-name', $connect);

# Functions
function check_email($email) { if (!preg_match('/^[-A-Za-z0-9_.]+[@][A-Za-z0-9_-]+([.][A-Za-z0-9_-]+)*[.][A-Za-z]{2,6}$/', $email)) return false; return $email;}

function get_randomhash($length=10) { return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,$length);}
function get_confirmkey() {	return sha1(md5(date('Y-m-d H:i:s')).get_randomhash().CONFIM_KEY);}
function get_cookiekey($username) { return sha1(COOKIE_KEY.$username); }

function mres($value) { return mysql_real_escape_string($value);}	
function mres_id($value) { return mres(ereg_replace("[^0-9]", "", $value));}
function notags($value) { return str_replace(array("<",">",'"', "'"),array("&lt;","&gt;","&quot;","&#39;"),$value);}
function safepass ($username, $password) { $password = sha1($password.SHA1_KEY); return hash('sha512', $username.$password.SHA512_KEY);}

function relocate($url) { if ($url == -1) $url = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : "/";Header("Location: $url");	die();}

function caps($value){	return mb_strtoupper($value);}
function uncaps($value){ return mb_strtolower($value);}
function fcaps($value){	return ucfirst(uncaps($value));}

function sql ($value) {	$sql = mysql_query($value) or die(mysql_error()); return mysql_fetch_assoc($sql);}

function auth() { if (isset($_SESSION['id']) && isset($_SESSION['username']) &&  isset($_SESSION['name'])) { return true; } return false; }
function get_id() { return mres_id($_SESSION['id']); }
function get_username() { return mres($_SESSION['username']); }
function get_name() { return mres($_SESSION['name']); }
function admin() { if (auth()) { $sql = sql("SELECT admin FROM members WHERE id='".get_id()."' LIMIT 1"); if ($sql['admin'] == 1) { return true; } } return false; }

function get_header() { if (file_exists("include/header.php")) { require ("include/header.php"); } }
function get_footer() { if (file_exists("include/footer.php")) { require ("include/footer.php"); } }
function get_page() { 
	if (isset($_GET['p']))
	{
		$_GET['p'] = mres($_GET['p']);
		if (file_exists("page/".$_GET['p'].".php"))
		{
			include ("page/".$_GET['p'].".php");
		}
		else {
			include ("page/404.php");
		}
	}
	else {
		include ("page/start.php");
	}
}

function get_adminpage() { 
	if (!admin()) { relocate("/404");}
	if (isset($_GET['u']))
	{
		$_GET['u'] = mres($_GET['u']);
		if (file_exists("page/admin/".$_GET['u'].".php"))
		{
			include ("page/admin/".$_GET['u'].".php");
		}
		else {
			include ("page/admin/404.php");
		}
	}
	else {
		include ("page/admin/start.php");
	}
}

if (get_magic_quotes_gpc()) {
	function strip_array($var) {
		return is_array($var)? array_map("strip_array", $var):stripslashes($var);
	}
	$_POST = strip_array($_POST);
	$_SESSION = strip_array($_SESSION);
	$_GET = strip_array($_GET);
	$_REQUEST = strip_array($_REQUEST);
	$_COOKIE = strip_array($_COOKIE);
}

function urlname($fn) {
   $fn = strtolower($fn);

   $fn = str_replace(array('.'), "", $fn);
   $fn = str_replace(array('å', 'ä', 'ã', 'â', 'á', 'à'),         	'a', $fn);
   $fn = str_replace(array('ö', 'õ', 'ô', 'ó', 'ò', 'ø'),         	'o', $fn);
   $fn = str_replace(array('ü', 'û', 'ú', 'ù'),                		'u', $fn);
   $fn = str_replace(array('é', 'è', 'ê', 'ë'),               		'e', $fn);
   $fn = str_replace(array('í', 'ì', 'ï', 'î'),               		'i', $fn);
   $fn = str_replace(array('ñ'),                          		 	'n', $fn);
   $fn = str_replace(array('ÿ'),                          		 	'y', $fn);
   $fn = str_replace(array('ß'),                         		   'ss', $fn);
   $fn = str_replace(array('æ'),                          		   'ae', $fn);
   
   $fn = preg_replace("/\s/", "-", $fn);
   $fn = preg_replace("/[^\w\d\.\-]/", "", $fn);
   $fn = preg_replace("/[\-]{2,}/", "-", $fn);

   return $fn;
}

function get_ipaddress() {
	if (isset($_SERVER["HTTP_CLIENT_IP"])) { return $_SERVER["HTTP_CLIENT_IP"];}
	elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { return $_SERVER["HTTP_X_FORWARDED_FOR"];}
	elseif (isset($_SERVER["HTTP_X_FORWARDED"])) { return $_SERVER["HTTP_X_FORWARDED"];}
	elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) { return $_SERVER["HTTP_FORWARDED_FOR"];}
	elseif (isset($_SERVER["HTTP_FORWARDED"])) { return $_SERVER["HTTP_FORWARDED"];	}
	else { return $_SERVER["REMOTE_ADDR"]; }
}

function mysql_count($table, $where="") {
	if ($where) {
		if (strtolower(substr($where,0,5)) != "where") {
			$where = "WHERE ".$where;
		}
	}
	$row = sql("SELECT COUNT(*) as `count` FROM `$table` $where LIMIT 1");
	return $row['count'];
}

function cut($str,$length,$maxlines=null) {
	if ($maxlines>0) {
		$str=explode("\n",$str);
		foreach ($str as $l) {
			$i++;
			if ((!$l && $i == $maxlines) || $i > $maxlines) break;
			else $buffer[] = $l;
		}
		$str = implode("\n",$buffer);
	}
	if ($length > 0 && strlen($str)>$length) return trim(substr($str,0,$length-3))."...";
	else return $str;
}

?>