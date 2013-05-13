<?php
session_start();
if (!admin()) { relocate('/404'); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reesume - Create your beautiful resume within minitues, free!</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="content-language" content="ENG" /> 
  <meta http-equiv="imagetoolbar" content="false" />
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,minimum-scale=1 user-scalable=no,width = 320" /> 
  <meta name="robots" content="index, nofollow" />
  <meta name="rating" content="general" />
  <meta name="doc-class" content="completed" />
  <meta name="author" content="Linus Lilja, Adam Hjerpe" />
  <meta name="copyright" content="&copy; <?php date("Y"); ?>" />
  <meta name="description" content="At Reesume we let you create your own beautiful resume within minitues to share when you're looking for a job, for free!" /> 
  <meta name="keywords" content="Free resume, CV for free, online CV, share CV, resume online" />
  
  <link rel="canonical" href="http://reesu.me/" />
  <link rel="image_src" href="http://reesu.me/asset/img/img_src.png" />
  <link rel="stylesheet" href="<?php echo BASEURL; ?>dev/css/admin.css?<?php echo time(); ?>" media="all" type="text/css" />

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<header id="admin-header">
	<h1>R</h1>
</header><!-- ./ #admin-header -->

<section id="admin-main">
	<nav id="admin-nav">
		<ul>
			<li><a href="#"><span aria-hidden="true" data-icon="&#x21dd;"></span><p>Settings</p></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
		</ul>
	</nav><!-- ./ #admin-nav -->

	<section id="admin-content">

	<?php
	/*
		# Notifications
		if (auth()) {
			$sql = mysql_query("SELECT * FROM notifications WHERE members_to='".get_id()."' ORDER BY viewed ASC LIMIT 1") or die(mysql_error());
			if (mysql_num_rows($sql)>0) {
				while ($row = mysql_fetch_assoc($sql)) {
					echo '<div class="notification"><p>'.$row['text'].'</p></div>';
				}
			}

			else {
				echo '<div class="notification"><p>You have no new notifications</p></div>';
			}

		}
			
		else {
			echo '<div class="notification"><p><a href="'.BASEURL.'">Sign up</a> and create your own resume for free!</p></div>';
		}
		*/
	?>
