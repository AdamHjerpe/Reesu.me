<?php
$today = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime("-1 days"));
$thismonth = date("Y-m-d", strtotime("-1 months"));
$lastmonth = $thismonth - strtotime("-1 months");

$visits_total = mysql_count('visits');
$visits_total_start = sql("SELECT `date` FROM `visits` ORDER BY `date` LIMIT 1");
$visits_month = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date>='".$thismonth."'");
$visits_lastmonth = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date>='".$lastmonth."'");
$visits_today = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date='".$today."'");
$visits_yesterday = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date='".$yesterday."'");
$visits_month_row = sql("SELECT COUNT(DISTINCT ipadress) AS `count` FROM visits WHERE date BETWEEN '$thismonth' AND '$today'");
$visits_total_unik = sql("SELECT COUNT(DISTINCT ipadress) AS `count` FROM visits");
$visits_qry = sql("SELECT COUNT(DISTINCT date) AS `count` FROM visits");
$visits_average_day = $visits_total/$visits_qry['count'];
?>


<p>
	<strong>Unika idag</strong> <?php echo $visits_today['count']; ?><br />
	<strong>Unika igår</strong> <?php echo $visits_yesterday['count']; ?><br />
	<strong>Unika denna månaden</strong> <?php echo $visits_month_row['count']; ?>
</p>

<p>
	<strong>Totalt denna månaden</strong> <?php echo $visits_month['count']; ?><br />
	<strong>Totalt förra månaden</strong> <?php echo $visits_lastmonth['count']; ?><br />
	<strong>Totalt unika sedan <?php echo $visits_total_start['date']; ?></strong> <?php echo $visits_total_unik['count'];?><br />
	<strong>Totalt sedan <?php echo $visits_total_start['date']; ?></strong> <?php echo $visits_total;?>	
</p>

<p>
	<strong>Genomsnitt / dag</strong> <?php echo number_format($visits_average_day,2);?>
</p>

<?php
$browser_qry = mysql_query("SELECT DISTINCT browser FROM `visits` GROUP by `browser` ORDER BY COUNT(DISTINCT ipadress) DESC, `browser` ASC") or die(mysql_error());
while ($browser_row = mysql_fetch_assoc($browser_qry)) {
	$browser_row2 = sql("SELECT COUNT(DISTINCT ipadress) as `count` FROM `visits` WHERE `browser`='".$browser_row['browser']."'");
	echo '<p>'.$browser_row['browser'].' - '.$browser_row2['count'].'</p>';							
}
?>
		
<?php
$system_qry = mysql_query("SELECT DISTINCT system FROM `visits` GROUP by `system` ORDER BY COUNT(DISTINCT ipadress) DESC") or die(mysql_error());
while ($system_row = mysql_fetch_assoc($system_qry)) {
	$system_row2 = sql("SELECT COUNT(DISTINCT ipadress) as `count` FROM `visits` WHERE `system`='".$system_row['system']."'");
	echo '<p>'.$system_row['system'].' - '.$system_row2['count'].'</p>';							
}
?>
