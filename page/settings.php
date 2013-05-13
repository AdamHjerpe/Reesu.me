<?php
	if (!auth()) { relocate(-1); }
	$id = get_id();
	if (isset($_POST['submit_settings']) && !empty($_POST['name'])) {	
		$name = mres($_POST['name']);
		if (!preg_match('/^[a-zåäöA-ZÅÄÖ ]+$/i', $name)) {
			$_msg = "Only char in name";
		}
		$city = mres($_POST['city']);
		$image = $_FILES['profilepicture'];
		
		if (!$_msg) {
			$_SESSION['name'] = $name;
			mysql_query("UPDATE members SET name='".$name."' WHERE id='".$id."' LIMIT 1") or die(mysql_error());
			if(!empty($image['name'])) {
				$image_name = time().'-'.filename($image['name']);
				$image['name'] = mres($image_name);
				
				$upload = new Upload($image, 'img/users/', 1);
				mysql_query("UPDATE members SET picture='".$image_name."' WHERE `id`='".$id."' LIMIT 1") or die(mysql_error());
			}
			$_msg = "Your settings has been updated";
			mysql_query("INSERT INTO notifications (members_to, members_from, text) VALUES ('".$id."', '0', 'Your settings has been updated!')") or die(mysql_error());
		}

	}
	$sql = mysql_query("SELECT `name`, `picture` FROM `members` WHERE `id`='".$id."' LIMIT 1") or die(mysql_error());
	if (mysql_num_rows($sql)>0) {
		$row = mysql_fetch_assoc($sql);ereg_replace(pattern, replacement, string)
?>
		<section id="paper">
			<h3>Settings</h3>
			<?php if ($_msg) echo '<div class="notification">'.$_msg.'</div>'; ?>
			<form id="settings" class="form" action="" method="post" enctype="multipart/form-data">
				<label>Change name</label>
				<input type="text" name="name" value="<?php echo $row['name'];?>" required />

				<label>Upload profilepicture</label>
				<div><input type="file" name="profilepicture" style="display: inline;" /><img src="/img/users/32/<?php echo $row['picture'];?>" width="32" height="32" class="right" /></div>

				<input type="submit" name="submit_settings" value="update" />
			</form>
		</section>
<?php 
	} else {
		echo '<section id="bigcontent"><div class="notification">Userprofile can\'t be found</div></section>';
	}
?>