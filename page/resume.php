<?php 
if (isset($uri[2]) && !empty($uri[2])) {
	$sql = mysql_query("SELECT `id`, `ident` FROM `resumes`") or die(mysql_error());
	while ($row = mysql_fetch_assoc($sql)) {
		if ($row['ident'] == $uri[2]) {
			$resume_id = $row['id'];
		}
	}
	$sql2 = mysql_query("SELECT `id`, `title`, `text` FROM `resumes` WHERE `id`='".$resume_id."' LIMIT 1") or die(mysql_error());
	$row2 = mysql_fetch_assoc($sql2);
	if (mysql_num_rows($sql2) == 0) {
		relocate('/404');
	}
	else {
		$title = $row2['title'];
		$text = nl2br($row2['text']);
	}
}
else {
	relocate('/404');
}	
?>

<section id="paper">
	<header class="edit">
		<hgroup>
			<h1><?php echo $title; ?></h1>
		</hgroup>
	</header>

	<section id="resume">
		<article class="content">
			<p><?php echo $text; ?></p>
		</article>
	</section>
</section>

<?php/*
if (isset($_GET['u']) && !empty($_GET['u'])) {
	$sql = mysql_query("SELECT * FROM resumes WHERE ident='".mres($_GET['u'])."' LIMIT 1") or die(mysql_error());
	if (mysql_num_rows($sql)>0) {
		$row = mysql_fetch_assoc($sql);
		echo '
		<section id="paper">
			<header class="edit">
				<hgroup>
					<h1>'.$row['title'].'</h1>
				</hgroup>
			</header>

			<section id="resume">
				<article class="content">
					<p>'.nl2br($row['text'])'</p>
				</article>
			</section>
		</section>
		';
	}
	else {
		relocate('/404');
	}
} 

else {
	relocate('/404');
}
*/?>