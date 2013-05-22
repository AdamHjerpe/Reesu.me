<?php
include("initiate.php");

$result = mysql_query("SELECT countryCode,country, COUNT(*) AS total FROM online GROUP BY countryCode ORDER BY total DESC LIMIT 15");
while($row=mysql_fetch_assoc($result)) {
	echo '
	<div class="geoRow">
		<div class="flag"><img src="dev/img/icons/famfamfam-countryflags/'.strtolower($row['countryCode']).'.gif" width="16" height="11" /></div>
		<div class="country" title="'.htmlspecialchars($row['country']).'">'.$row['country'].'</div>
		<div class="people">'.$row['total'].'</div>
	</div>
	';
} 
?>