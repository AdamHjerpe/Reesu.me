<?php
	if (!auth()) { relocate(-1); }
	$id = get_id();
	if (isset($_POST['submit_settings']) && !empty($_POST['name'])) {	
		$name = mres($_POST['name']);
		if (!preg_match('/^[a-zåäöA-ZÅÄÖ ]+$/i', $name)) {
			$_msg = "Only char in name";
		}
		$city = mres($_POST['city']);
		$email = mres($_POST['email']);
		$image = $_FILES['profilepicture'];
		
		if (!$_msg) {
			$_SESSION['name'] = $name;
			mysql_query("UPDATE members SET name='".$name."', email='".$email."' WHERE id='".$id."' LIMIT 1") or die(mysql_error());
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
	$sql = mysql_query("SELECT `name`, `email`, `picture` FROM `members` WHERE `id`='".$id."' LIMIT 1") or die(mysql_error());
	if (mysql_num_rows($sql)>0) {
		$row = mysql_fetch_assoc($sql);ereg_replace(pattern, replacement, string)
?>	
		<section id="paper">
			<h1>Settings</h1>

			<?php if ($_msg) echo '<p>'.$_msg.'</p>'; ?>

			<form id="settings" action="" method="post" enctype="multipart/form-data">
			
			<p>
				<label>Your name</label>
				<input type="text" name="name" value="<?php echo $row['name'];?>" required />
			</p>

			<p>	
				<label>Your email</label>
				<input type="text" name="email" value="<?php echo $row['email'];?>" required />
			</p>
			<!--
				<label>Your name</label>
				<input type="text" name="name" value="<?php echo $row['name'];?>" required />
			
				<label>Your name</label>
				<input type="text" name="name" value="<?php echo $row['name'];?>" required />
			-->
			<p>
				<label>Upload picture <small>(max 100x100px)</small></label>
				<input type="file" name="profilepicture" />
			</p>

			<p>
				<input type="submit" name="submit_settings" value="update" />
			</p>
			</form>
		</section>
<?php 
	} else {
		echo '<section id="bigcontent"><div class="notification">Userprofile can\'t be found</div></section>';
	}
?>