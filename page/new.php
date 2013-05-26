<?php
if (isset($_POST['submitresume'])) {
	if (!empty($_POST['title']) && !empty($_POST['text']) && !isset($_GET['ident'])) {
		$urlhash = slug(get_randomhash()); // Generates a random hash of 7 chars.
		$user = slug(get_username()); // Gets the username
		mysql_query("INSERT INTO resumes (`id`, `title`, `ident`, `user`, `text`) VALUES ('', '".escape($_POST['title'])."', '".$urlhash."', '".$user."', '".escape($_POST['text'])."')") or die(mysql_error());
		relocate(''.BASEURL.$user.'/'.urlhash.''); // baseurl/username/ident
	}
	else {
		$title = escape($_POST['title']);
		$text = escape($_POST['text']);	
	}
}
?>

<section id="paper">
	<div class="content">
		<form action="" method="post">
			<strong>Title:</strong><br />
			<input type="text" name="title" style="width: 440px;"/><br />
			<textarea name="text"></textarea>
			<br />
			<input type="submit" name="submitresume" value="Spara" />
		</form>
	</div>	
</section>
