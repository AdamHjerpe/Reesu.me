<?php 
if (isset($_GET['user']) && !empty($_GET['user']) && isset($_GET['ident']) && !empty($_GET['ident'])) {
	$sql = mysql_query("SELECT * FROM resumes WHERE user='".mres($_GET['user'])."' AND ident='".mres($_GET['ident'])."' LIMIT 1") or die(mysql_error());
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
			<p>'.nl2br($row['text']).'</p>
		</article>
	</section>
</section>
<div style="clear: both; font-size: 1px;">&nbsp;</div>
';
	}
	else {
		relocate('/404');
	}
} 

else {
	relocate('/404');
}
?>
