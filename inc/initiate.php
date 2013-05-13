<?php
# Define time
$today = date("Y-m-d");

# Define site URL and DOMAIN
define('BASEURL', 	 'http://reesu.me/');
define('DOMAIN', 	 '.reesu.me');

# Define salt's (https://api.wordpress.org/secret-key/1.1/salt/)
define('SHA1_KEY', 	 'p9Q|?VXKHe&gjk&nA-P;ZQ%2)f$Y+eyd KRLh|/sL*-1SAu@zZz_Zup3Kzh>Kl<+');
define('SHA512_KEY', 't-0|:,rU.-::bvtu.*(10st$]EaMeLGMG$JNHc|U{aZvK)uG/Z IR u@Ucb`uuId');
define('CONFIM_KEY', 'K(,[Z2feD~q8jX6BYBNb+v-tZiytB7yD~HPZu&],W_$8=Q q,D?[N[[,(#+_$nBO');
define('COOKIE_KEY', 'm2QDzM,h+w7B#Hm*g>l9^aao)ypPr6gX,FQ,zjA)Z8XX/;M[>h*V%GrX>VA9R2SD');

# Connect to DB
$connect = @mysql_connect('reesume-134355.mysql.binero.se', '134355_jk78569', 'B4kishK4kish') or die("Kunde inte ansluta till SQL-servern. (Hög belastning...)");
mysql_select_db('134355-reesume', $connect);

# Functions
function check_email($email) { if (!preg_match('/^[-A-Za-z0-9_.]+[@][A-Za-z0-9_-]+([.][A-Za-z0-9_-]+)*[.][A-Za-z]{2,6}$/', $email)) return false; return $email;}

function get_randomhash($length=10) { return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,$length);}
function get_confirmkey() {	return sha1(md5(date('Y-m-d H:i:s')).get_randomhash().CONFIM_KEY); }
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

function get_head() { if (file_exists("inc/header.php")) { require ("inc/header.php"); } }
function get_foot() { if (file_exists("inc/footer.php")) { require ("inc/footer.php"); } }
function get_page() { 
	if (isset($_GET['p'])) {
		$_GET['p'] = mres($_GET['p']);
		if (file_exists("page/".$_GET['p'].".php")) {
			include ("page/".$_GET['p'].".php");
		} else {
			include ("page/404.php");
		}
	} else {
		include ("page/start.php");
	}
}

function get_adminhead() { if (file_exists("inc/admin-header.php")) { require ("inc/admin-header.php"); } }
function get_adminfoot() { if (file_exists("inc/admin-footer.php")) { require ("inc/admin-footer.php"); } }
function get_adminpage() { 
	if (!admin()) { relocate("/404"); }
	if (isset($_GET['u'])) {
		$_GET['u'] = mres($_GET['u']);
		if (file_exists("page/admin/".$_GET['u'].".php")) {
			include ("page/admin/".$_GET['u'].".php");
		} else {
			include ("page/admin/404.php");
		}
	} else {
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

function get_ipadress() {
	if (isset($_SERVER["HTTP_CLIENT_IP"])) { return $_SERVER["HTTP_CLIENT_IP"];}
	elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { return $_SERVER["HTTP_X_FORWARDED_FOR"];}
	elseif (isset($_SERVER["HTTP_X_FORWARDED"])) { return $_SERVER["HTTP_X_FORWARDED"];}
	elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) { return $_SERVER["HTTP_FORWARDED_FOR"];}
	elseif (isset($_SERVER["HTTP_FORWARDED"])) { return $_SERVER["HTTP_FORWARDED"];	}
	else { return $_SERVER["REMOTE_ADDR"]; }
}

function iplog() {
	$count = mysql_query("SELECT ipadress FROM `visits` WHERE `ipadress`='".get_ipadress()."' AND `date`='".date('Y-m-d')."' LIMIT 1") or die(mysql_error());
	if(mysql_num_rows($count)==0) {
		$ua = getBrowser();
		$browser = $ua['name']." ".$ua['version'];
		$system = $ua['platform'];
		mysql_query("INSERT INTO `visits` (`id`, `ipadress`, `date`, `browser`, `system`) VALUES ('', '".get_ipadress()."', '".date('Y-m-d')."', '".$browser."', '".$system."')") or die(mysql_error());
	}
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

function getBrowser() {
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $bname = 'Annan';
  $platform = 'Annat';
  $version= "";

  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'Linux';
  }
  
  elseif (preg_match('/macintosh|mac os|iPhone/i', $u_agent)) {
    $platform = 'Mac';    
	}
  
  elseif (preg_match('/iPhone/i', $u_agent)) {
    $platform = 'Mac';
  }

  elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'Windows';
  }

  if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }

  elseif (preg_match('/iPhone/i',$u_agent) && preg_match('/Opera/i',$u_agent)) {
    $bname = 'iPhone Opera Mini';
    $ub = "Ipone";
  }

	elseif( preg_match('/iPod/i',$u_agent) && preg_match('/Opera/i',$u_agent)) {
    $bname = 'iPod Opera Mini';
    $ub = "iPod";
  }

	elseif (preg_match('/iPhone/i',$u_agent)) {
    $bname = 'iPhone Safari';
    $ub = "Ipone";
  } 

	elseif (preg_match('/iPod/i',$u_agent)) {
    $bname = 'iPod Safari';
    $ub = "iPod";
  } 

	elseif (preg_match('/Firefox/i',$u_agent)) {
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
  }

  elseif (preg_match('/Chrome/i',$u_agent)) {
    $bname = 'Google Chrome';
    $ub = "Chrome";
  }

  elseif (preg_match('/Safari/i',$u_agent)) {
    $bname = 'Apple Safari';
    $ub = "Safari";
  }
   
  elseif (preg_match('/Opera/i',$u_agent)) {
    $bname = 'Opera';
    $ub = "Opera";
  }

  elseif (preg_match('/Netscape/i',$u_agent)) {
    $bname = 'Netscape';
    $ub = "Netscape";
  }

  $known = array('Version', $ub, 'other');
  $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
  if (!preg_match_all($pattern, $u_agent, $matches)) { }

  $i = count($matches['browser']);
  if ($i != 1) {
    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
      $version= $matches['version'][0];
    }
    else {
      $version= $matches['version'][1];
    }
  }
  
  else {
    $version= $matches['version'][0];
  }
  
  if ($version==null || $version=="") { 
  	$version="?"; 
 	}
   
  return array(
    'userAgent' => $u_agent,
    'name'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'pattern'   => $pattern
  );
}
?>