<?php
include("initiate.php");
if(is_bot()) die();
$stringIp = get_ipadress();
$intIp = ip2long($stringIp);

$inDB = mysql_query("SELECT 1 FROM online WHERE ip=".$intIp);

if(!mysql_num_rows($inDB)) {
	if($_COOKIE['geoData']) {
		list($city,$countryName,$countryAbbrev) = explode('|',mysql_real_escape_string(strip_tags($_COOKIE['geoData'])));
	}
	else {
		$xml = file_get_contents('http://api.hostip.info/?ip='.$stringIp);
		
		$city = get_tag('gml:name',$xml);
		$city = $city[1];
		
		$countryName = get_tag('countryName',$xml);
		$countryName = $countryName[0];
		
		$countryAbbrev = get_tag('countryAbbrev',$xml);
		$countryAbbrev = $countryAbbrev[0];

		setcookie('geoData',$city.'|'.$countryName.'|'.$countryAbbrev, time()+60*60*24*30,'/');
	}
	
	$countryName = str_replace('(Unknown Country?)','UNKNOWN',$countryName);
	
	if (!$countryName) {
		$countryName='UNKNOWN';
		$countryAbbrev='XX';
		$city='(Unknown City?)';
	}
	
	mysql_query("INSERT INTO online (ip,city,country,countrycode) VALUES(".$intIp.",'".$city."','".$countryName."','".$countryAbbrev."')");
}

else {
	mysql_query("UPDATE online SET dt=NOW() WHERE ip=".$intIp);
}

mysql_query("DELETE FROM online WHERE dt<SUBTIME(NOW(),'0 0:10:0')");

list($totalOnline) = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM online"));

echo $totalOnline;
?>
