<?php
session_start();
if (auth()) {}

# Sign in
elseif (isset($_POST['signin']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$sql = mysql_query("SELECT `id`, `name`, `username`, `password`, `active` FROM `members` WHERE `username`='".mres($_POST['username'])."' OR `email`='".mres($_POST['email'])."' LIMIT 1") or die(mysql_error());
	if (mysql_num_rows($sql)>0) {
		$row = mysql_fetch_assoc($sql);
		echo $row['password'];
		echo '<br />';
		echo safepass($row['username'], mres($_POST['password']));
		if ($row['password'] == safepass($row['username'], mres($_POST['password']))) {
			if ($row['active']==0) { 
				relocate('/activate');
			}
			else {
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = mres($row['username']);
				$_SESSION['name'] = $row['name'];					
				if($_POST['remember_me']) {
					$remember_hash = get_cookiekey($row['username']);
					mysql_query("UPDATE `members` SET `cookie_key`='".$remember_hash."' WHERE `id`='".$row['id']."' LIMIT 1") or die(mysql_error());
					setcookie("remember_me", $remember_hash, time()+86400*30, "/", DOMAIN);
				}
				relocate('/');			
			}
			relocate('/');
		}
	}
	relocate('/');		
}

# Remember me
elseif(!empty($_COOKIE['remember_me'])) {
	$row = sql("SELECT id, name, username FROM members WHERE `cookie_key` = '".mres($_COOKIE['remember_me'])."' AND `active`= 1 LIMIT 1");
	if($row) {
		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['name'] = $row['name'];		
	}
}

#Sign up
elseif (isset($_POST['signup']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
	$username = mres($_POST['username']);
	$email = mres($_POST['email']);
	if (!check_email($_POST['email'])) {
		$_msg = "ERROR";
	}
	$sql = mysql_query("SELECT id FROM members WHERE username='".$username."'") or die(mysql_error());
	if (mysql_num_rows($sql)>0) {
		$_msg = "Dublicate";
	}
	$sql = mysql_query("SELECT id FROM members WHERE email='".$email."'") or die(mysql_error());
	if (mysql_num_rows($sql)>0) {
		$_msg = "Dublicate";
	}
	if (!$_msg) {
		$confirm_key = get_confirmkey();
		$ipaddress = get_ipadress();
		$password = mres($_POST['password']);
		$safepass = safepass($username, $password);
		$today = date('Y-m-d');
		mysql_query("INSERT INTO members (username, password, email, confirm_key, name, reg_ip, lastseen) VALUES ('".$username."', '".$safepass."', '".$email."', '".$confirm_key."', '".$username."', '".$ipaddress."', '".$today."')") or die(mysql_error());
		mysql_query("INSERT INTO notifications (members_to, members_from, text) VALUES ('".$row['id']."', '0', 'Welcome to Reesume!')") or die(mysql_error());
		$subject = 'Welcome to Reesume';
		$message =
'Welcome dear user, now your\'e close to 

Activate: http://reesu.me/activate/'.$confirm_key.'

Your account information @ Reesume
Username: '.$username.'		
Password: '.$password.'		

Create your own resume with our easy to use tool and share it, get back to us if you got a job via us, always nice to know!

Best regards,
Crew at Reesume';
		$headers = 'From: Reesume Crew' . "\r\n" .
			'Reply-To: welcome@reesu.me' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($email, $subject, $message, $headers);
		relocate("/");
	}
}

# Recover password
elseif (isset($_POST['recover']) && !empty($_POST['username'])) {
	$sql = mysql_query("SELECT `id`, `username`, `email` FROM `members` WHERE `username`='".mres($_POST['username'])."' OR `email`='".mres($_POST['username'])."' LIMIT 1") or die(mysql_error());
	if (mysql_num_rows($sql)>0) {
		$row = mysql_fetch_assoc($sql);
		$newpass = get_randomhash();
		$username = $row['username'];
		$email = $row['email'];
		mysql_query("UPDATE members SET password='".safepass($username, $newpass)."' WHERE id='".$row['id']."' LIMIT 1") or die(mysql_error());
		$subject = 'Recover your password';
		$message = 
'Dear member, you have requested a new password.
So here is your new, fresh and secure password!

Your new account information @ Reesume
Username: '.$username.'		
Password: '.$newpass.'
		
Hope everything is better now when you can sign in!

Best regards,
Crew at Reesume';
		$headers = 'From: Reesume Crew' . "\r\n" .
			'Reply-To: recover@reesu.me' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($email, $subject, $message, $headers);
		relocate("/#$newpass"); #Just for now
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reesume - Create your beautiful resume within minitues, free!</title>
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="content-language" content="ENG" /> 
  <meta http-equiv="imagetoolbar" content="false" />
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
  <link rel="stylesheet" href="<?php echo BASEURL; ?>dev/css/style.css" media="all" type="text/css" />

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<section id="headings">
	<a class="logo" href="<?php echo BASEURL; ?>">
		<h1>R<span>eesume - Create your beautiful resume within minitues, free!</span></h1>
	</a>

	<ul id="nav">
		<li><a class="nav-icon" href="#"> </a>
			<?php 
				# User signed-in navigation
				if (auth()) { 
			?>
			<ul>
				<!--<li><a href="<?php echo BASEURL; ?>go-pro/">Go pro <span>$1</span></a></li>-->
				<li><a href="<?php echo BASEURL; ?>logout">Disconnect</a></li>
			</ul>
			<?php 
				# Guest navigation
				} else { 
			?>
			<ul>
				<li><a href="<?php echo BASEURL; ?>#sign-in">Sign in</a></li>
				<li><a href="<?php echo BASEURL; ?>#sign-up">Sign up</a></li>
				<li><a href="<?php echo BASEURL; ?>reesume/">Reesume?</a></li>
			</ul>
			<?php } ?>
		</li>
	</ul>

	<?php
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
			echo '<div class="notification"><p><a href="'.BASEURL.'#sign-up">Sign up</a> and create your own resume for free!</p></div>';
		}
	?>
</section>
