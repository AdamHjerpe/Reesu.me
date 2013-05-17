<?php
if (isset($_POST['submitresume'])) {
	if (!empty($_POST['title']) && !empty($_POST['text']) && !isset($_GET['pageID'])) {
		$urlhash = get_username().'/'.get_randomhash();
		mysql_query("INSERT INTO resumes (`id`, `title`, `ident`, `text`) VALUES ('', '".escape($_POST['title'])."', '".$urlhash."', '".escape($_POST['text'])."')") or die(mysql_error());
		relocate(''.BASEURL.$urlhash.''); // BASEURL.'resume/'.$urlhash
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
			<input type="text" name="title" value="<?php echo $title;?>" style="width: 440px;"/><br />
			<textarea name="text"></textarea>
			<br />
			<input type="submit" name="submitresume" value="Spara" />
		</form>
	</div>	
</section>