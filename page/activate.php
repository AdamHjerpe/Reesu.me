<?php
# Get footer
get_foot();

if (isset($_GET['confirmkey'])) {
	$sql = mysql_query("SELECT active FROM members WHERE `confirm_key`='".mres($_GET['confirmkey'])."'LIMIT 1") or die(mysql_error());
	$row = mysql_fetch_assoc($sql);

	if (mysql_num_rows($sql) == 0) {
		$_msg = "There is no account with that key. Get in touch with us to solve the problem";
	}

	elseif ($row['active'] == 1) { 
		$_msg = "Your account is already activated. Sign in to explore Reesume!";
	}

	else {
		mysql_query("UPDATE members SET `active`='1' WHERE `confirm_key`='".mres($_GET['confirmkey'])."' LIMIT 1") or die(mysql_error());
		$_msg = "Your account is now activated!";
	}
}

else {
	$_msg = "You have to activate your account to be able to sign in at Reesume";
}
?>

<section id="paper">
	<header>
		<hgroup>
			<h1>Activated</h1>
		</hgroup>
	</header>
	<article class="content">
		<?php echo $_msg; ?>
	</article>
</section>