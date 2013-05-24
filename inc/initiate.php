<?php
# Define site URL and DOMAIN
define('BASEURL', 'http://reesu.me/');
define('DOMAIN', '.reesu.me');

# Define salt's (https://api.wordpress.org/secret-key/1.1/salt/)
define('SHA1_KEY', 	 'p9Q|?VXKHe&gjk&nA-P;ZQ%2)f$Y+eyd KRLh|/sL*-1SAu@zZz_Zup3Kzh>Kl<+');
define('SHA512_KEY', 't-0|:,rU.-::bvtu.*(10st$]EaMeLGMG$JNHc|U{aZvK)uG/Z IR u@Ucb`uuId');
define('CONFIM_KEY', 'K(,[Z2feD~q8jX6BYBNb+v-tZiytB7yD~HPZu&],W_$8=Q q,D?[N[[,(#+_$nBO');
define('COOKIE_KEY', 'm2QDzM,h+w7B#Hm*g>l9^aao)ypPr6gX,FQ,zjA)Z8XX/;M[>h*V%GrX>VA9R2SD');

# Connect to DB
$connect = @mysql_connect('reesumedev-160821.mysql.binero.se', '160821_kc77801', 'Smulan13') or die("Kunde inte ansluta till SQL-servern. (Hög belastning...)");
mysql_select_db('160821-reesumedev', $connect);

# Functions
function get_ipadress() { if (isset($_SERVER["HTTP_CLIENT_IP"])) { return $_SERVER["HTTP_CLIENT_IP"]; } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { return $_SERVER["HTTP_X_FORWARDED_FOR"]; } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) { return $_SERVER["HTTP_X_FORWARDED"]; } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) { return $_SERVER["HTTP_FORWARDED_FOR"]; } elseif (isset($_SERVER["HTTP_FORWARDED"])) { return $_SERVER["HTTP_FORWARDED"];	} else { return $_SERVER["REMOTE_ADDR"]; } }
function iplog() { if(is_bot()) die(); $count = mysql_query("SELECT ipadress FROM `visits` WHERE `ipadress`='".get_ipadress()."' AND `date`='".date('Y-m-d')."' LIMIT 1") or die(mysql_error()); if(mysql_num_rows($count)==0) { $ua = getBrowser(); $browser = $ua['name']." ".$ua['version']; $system = $ua['platform']; mysql_query("INSERT INTO `visits` (`id`, `ipadress`, `date`, `browser`, `system`) VALUES ('', '".get_ipadress()."', '".date('Y-m-d')."', '".$browser."', '".$system."')") or die(mysql_error()); } }
function get_tag($tag,$xml) { preg_match_all('/<'.$tag.'>(.*)<\/'.$tag.'>$/imU',$xml,$match); return $match[1]; }
function is_bot() { $botlist = array("Teoma", "alexa", "froogle", "Gigabot", "inktomi","looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory","Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot","crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp","msnbot", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz","Baiduspider", "Feedfetcher-Google", "TechnoratiSnoop", "Rankivabot","Mediapartners-Google", "Sogou web spider", "WebAlta Crawler","TweetmemeBot","Butterfly","Twitturls","Me.dium","Twiceler"); foreach($botlist as $bot) { if(strpos($_SERVER['HTTP_USER_AGENT'],$bot)!==false) return true; } return false; }
function online() { if(is_bot()) die(); $stringIp = get_ipadress(); $intIp = ip2long($stringIp); $inDB = mysql_query("SELECT 1 FROM online WHERE ip=".$intIp); if(!mysql_num_rows($inDB)) { if($_COOKIE['geoData']) { list($city,$countryName,$countryAbbrev) = explode('|',mysql_real_escape_string(strip_tags($_COOKIE['geoData']))); } else { $xml = file_get_contents('http://api.hostip.info/?ip='.$stringIp); $city = get_tag('gml:name',$xml); $city = $city[1]; $countryName = get_tag('countryName',$xml); $countryName = $countryName[0]; $countryAbbrev = get_tag('countryAbbrev',$xml); $countryAbbrev = $countryAbbrev[0]; setcookie('geoData',$city.'|'.$countryName.'|'.$countryAbbrev, time()+60*60*24*30,'/'); } $countryName = str_replace('(Unknown Country?)','UNKNOWN',$countryName); if (!$countryName) { $countryName='UNKNOWN'; $countryAbbrev='XX'; $city='(Unknown City?)'; } mysql_query("INSERT INTO online (ip,city,country,countrycode) VALUES(".$intIp.",'".$city."','".$countryName."','".$countryAbbrev."')"); } else { mysql_query("UPDATE online SET dt=NOW() WHERE ip=".$intIp); }	mysql_query("DELETE FROM online WHERE dt<SUBTIME(NOW(),'0 0:10:0')"); }
function lastseen() { if (auth()) { mysql_query("UPDATE members SET lastseen=NOW(), ipaddress='".get_ipadress()."' WHERE id='".get_id()."' LIMIT 1") or die(mysql_error()); } }
function getBrowser() { $u_agent = $_SERVER['HTTP_USER_AGENT']; $bname = 'Annan'; $platform = 'Annat'; $version= ""; if (preg_match('/linux/i', $u_agent)) { $platform = 'Linux'; } elseif (preg_match('/macintosh|mac os|iPhone/i', $u_agent)) { $platform = 'Mac';     } elseif (preg_match('/iPhone/i', $u_agent)) { $platform = 'Mac'; } elseif (preg_match('/windows|win32/i', $u_agent)) { $platform = 'Windows'; } if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { $bname = 'Internet Explorer'; $ub = "MSIE"; } elseif (preg_match('/iPhone/i',$u_agent) && preg_match('/Opera/i',$u_agent)) { $bname = 'iPhone Opera Mini'; $ub = "Ipone"; } elseif( preg_match('/iPod/i',$u_agent) && preg_match('/Opera/i',$u_agent)) { $bname = 'iPod Opera Mini'; $ub = "iPod"; } elseif (preg_match('/iPhone/i',$u_agent)) { $bname = 'iPhone Safari'; $ub = "Ipone"; }  elseif (preg_match('/iPod/i',$u_agent)) { $bname = 'iPod Safari'; $ub = "iPod"; }  elseif (preg_match('/Firefox/i',$u_agent)) { $bname = 'Mozilla Firefox'; $ub = "Firefox"; } elseif (preg_match('/Chrome/i',$u_agent)) { $bname = 'Google Chrome'; $ub = "Chrome"; } elseif (preg_match('/Safari/i',$u_agent)) { $bname = 'Apple Safari'; $ub = "Safari"; } elseif (preg_match('/Opera/i',$u_agent)) { $bname = 'Opera'; $ub = "Opera"; } elseif (preg_match('/Netscape/i',$u_agent)) { $bname = 'Netscape'; $ub = "Netscape"; } $known = array('Version', $ub, 'other'); $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#'; if (!preg_match_all($pattern, $u_agent, $matches)) { } $i = count($matches['browser']); if ($i != 1) { if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){ $version= $matches['version'][0]; } else { $version= $matches['version'][1]; } } else { $version= $matches['version'][0]; } if ($version==null || $version=="") {  $version="?";  } return array( 'userAgent' => $u_agent, 'name'      => $bname, 'version'   => $version, 'platform'  => $platform, 'pattern'   => $pattern ); }
function now() { date('Y-m-d H:i:s'); }
function check_email($email) { if (!preg_match('/^[-A-Za-z0-9_.]+[@][A-Za-z0-9_-]+([.][A-Za-z0-9_-]+)*[.][A-Za-z]{2,6}$/', $email)) return false; return $email;}

function get_randomhash($length=7) { return substr(uniqid(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789')),0,$length); }
function get_confirmkey() {	return sha1(md5(date('Y-m-d H:i:s')).get_randomhash().CONFIM_KEY); }
function get_cookiekey($username) { return sha1(COOKIE_KEY.$username); }

function mres($value) { return mysql_real_escape_string($value); }	
function mres_id($value) { return mres(ereg_replace("[^0-9]", "", $value)); }
function notags($value) { return str_replace(array("<",">",'"', "'"),array("&lt;","&gt;","&quot;","&#39;"),$value); }
function safepass ($username, $password) { $password = sha1($password.SHA1_KEY); return hash('sha512', $username.$password.SHA512_KEY);}
function escape ($value) { $value = trim($value); $value = str_replace(array("<",">",'"', "'", ";"),"",$value); return mysql_real_escape_string($value); }
function filename($file) { $file = str_replace(array(" ", "Ã¶", "Ã¤", "Ã¥"), array("_", "o", "a", "a"), $file); return $file;}

function slug($str) { $str = strtolower(trim($str)); $str = preg_replace('/[^a-z0-9-]/', '-', $str); $str = preg_replace('/-+/', "-", $str); return $str; }
function relocate($url) { if ($url == -1) $url = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : "/"; Header("Location: $url");	die(); }

function caps($value) {	return mb_strtoupper($value); }
function uncaps($value) { return mb_strtolower($value); }
function fcaps($value) {return ucfirst(uncaps($value)); }

function sql ($value) {	$sql = mysql_query($value) or die(mysql_error()); return mysql_fetch_assoc($sql); }
function mysql_count($table, $where="") { if ($where) { if (strtolower(substr($where,0,5)) != "where") { $where = "WHERE ".$where; } } $row = sql("SELECT COUNT(*) as `count` FROM `$table` $where LIMIT 1"); return $row['count']; }
function cut($str,$length,$maxlines=null) { if ($maxlines>0) { $str=explode("\n",$str); foreach ($str as $l) { $i++; if ((!$l && $i == $maxlines) || $i > $maxlines) break; else $buffer[] = $l; } $str = implode("\n",$buffer); } if ($length > 0 && strlen($str)>$length) return trim(substr($str,0,$length-3))."..."; else return $str; }

function auth() { if (isset($_SESSION['id']) && isset($_SESSION['username']) &&  isset($_SESSION['name'])) { return true; } return false; }
function get_id() { return mres_id($_SESSION['id']); }
function get_username() { return mres($_SESSION['username']); }
function get_name() { return mres($_SESSION['name']); }
function admin() { if (auth()) { $sql = sql("SELECT admin FROM members WHERE id='".get_id()."' LIMIT 1"); if ($sql['admin'] == 1) { return true; } } return false; }
function id2user ($value) { $value = mysql_query("SELECT `username` FROM `members` WHERE `id`='".$value."' LIMIT 1") or die(mysql_error()); $value = mysql_fetch_assoc($value); return $value['username']; }
function user2id ($value) { $value = mysql_query("SELECT `id` FROM `members` WHERE `username`='".$value."' LIMIT 1") or die(mysql_error()); $value = mysql_fetch_assoc($value); return $value['id']; }

function get_head() { if (file_exists("inc/header.php")) { require ("inc/header.php"); } }
function get_foot() { if (file_exists("inc/footer.php")) { require ("inc/footer.php"); } }
function get_page() { if (isset($_GET['p'])) { $_GET['p'] = mres($_GET['p']); if (file_exists("page/".$_GET['p'].".php")) { include ("page/".$_GET['p'].".php"); } else { include ("page/404.php"); } } else { include ("page/start.php"); } }

/*
class Upload {
	function __construct($file, $dir, $thumb="", $feed="") {
		$extensions = array("jpg", "jpeg", "gif", "png");
		$max_size = 1024 * 5000;

		$fileSplit = explode(".", $file['name']);
		$ext = $fileSplit[count($fileSplit) - 1];
	
		if(!in_array(strtolower($ext), $extensions)) {
			$_error_ = "This format isn't allowed";
		}

		if($file['size'] > $max_size) {
			$_error_ = "This file is to big";
		}

		$size = getimagesize($file['tmp_name']);

		if (empty($size['mime'])) die('Thats not a real image');

		if(is_uploaded_file($file['tmp_name']) && !$_error_) { move_uploaded_file($file['tmp_name'], $dir.$file['name']);
			
			if($thumb) {
				$this->convertToThumbnail("dev/users/".$file['name'], "32", "32", $ext);
				$this->convertToThumbnail("dev/users/".$file['name'], "100", "100", $ext);
			}

			elseif($feed) {
				$this->convertToThumbnail("dev/img/feed/".$file['name'], "64", "64", $ext, "dev/img/feed");
				$this->convertToThumbnail("dev/img/feed/".$file['name'], "160", "140", $ext, "dev/img/feed");
				$this->convertToThumbnail("dev/img/feed/".$file['name'], "360", "260", $ext, "dev/img/feed");
				$this->convertToThumbnail("dev/img/feed/".$file['name'], "640", "480", $ext, "dev/img/feed");
			}
		}
		
		else {
			echo "<div class=\"notification\">$_error_</div>";
		}
	}

	function convertToThumbnail($file, $width, $height, $ext, $location="", $compression = 100) {

		$folder = $width;

		if(!$location) {
			$location = "dev/users";
		}

		if(!file_exists($file)) {
			exit("File doesn't exist");
		}

		if($height < 1 || $width < 1) {
			exit("Height or width is smaller than 1");
		}

		list($orgWidth, $orgHeight) = getimagesize($file);
	
		$emptyImage = imagecreatetruecolor($width, $height);
		$new_name = explode("/", $file);
		$new_name = end($new_name);
		
		if(strtolower($ext) == "jpg" || strtolower($ext) == "jpeg") {
			$image = imagecreatefromjpeg($file);
			imagecopyresampled($emptyImage, $image, 0, 0, 0, 0, $width, $height, $orgWidth, $orgHeight);
			imagejpeg($emptyImage, "$location/$folder/".$new_name, $compression);
		}

		elseif(strtolower($ext) == "gif") {
			$image = imagecreatefromgif($file);
			imagecopyresampled($emptyImage, $image, 0, 0, 0, 0, $width, $height, $orgWidth, $orgHeight);
			imagegif($emptyImage, "$location/$folder/".$new_name);
		}

		elseif(strtolower($ext) == "png") {
			$image = imagecreatefrompng($file);
			imagecopyresampled($emptyImage, $image, 0, 0, 0, 0, $width, $height, $orgWidth, $orgHeight);
			imagepng($emptyImage, "$location/$folder/".$new_name);
		}   
	
		imagedestroy($image);
		imagedestroy($emptyImage);
	}
}
*/
if (get_magic_quotes_gpc()) {
	function strip_array($var) { return is_array($var)? array_map("strip_array", $var):stripslashes($var); }
	$_POST = strip_array($_POST);
	$_SESSION = strip_array($_SESSION);
	$_GET = strip_array($_GET);
	$_REQUEST = strip_array($_REQUEST);
	$_COOKIE = strip_array($_COOKIE);
}
?>