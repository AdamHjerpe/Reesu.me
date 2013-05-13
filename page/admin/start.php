<?php
list($totalOnline) = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM online"));

// Grab days
$today = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime("-1 days"));
$thismonth = date("Y-m-d", strtotime("-1 months"));

$threedayb = date("Y-m-d", strtotime("-2 days"));
$fourdayb = date("Y-m-d", strtotime("-3 days"));
$fivedayb = date("Y-m-d", strtotime("-4 days"));
$sixdayb = date("Y-m-d", strtotime("-5 days"));
$sevendayb = date("Y-m-d", strtotime("-6 days"));

// Member count
$members_total = mysql_count('members');

// Visit count
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

$visits_threedayb = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date='".$threedayb."'");
$visits_fourdayb = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date='".$fourdayb."'");
$visits_fivedayb = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date='".$fivedayb."'");
$visits_sixdayb = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date='".$sixdayb."'");
$visits_sevendayb = sql("SELECT COUNT(*) AS `count` FROM visits WHERE date='".$sevendayb."'");
?>

<!--
<div id="widgets">
	<div class="this-week left">
		<h3>Past week</h3>
	  <span class="line"><?php echo "".$visits_sevendayb['count'].",".$visits_sixdayb['count'].",".$visits_fivedayb['count'].",".$visits_fourdayb['count'].",".$visits_threedayb['count'].",".$visits_yesterday['count'].",".$visits_today['count'].""; ?></span>
	</div>

	<div class="stats right">
		<h3>Quick stats</h3>
		<div class="pie">
		  <span data-colours='["#10D080", "#eee"]' data-diameter="120"><?php echo $visits_today['count']; ?>/<?php echo $visits_month_row['count']; ?></span><!-- Idag / Månad --
		  <span style="margin-left: 10px;" data-colours='["#10D080", "#eee"]' data-diameter="120"><?php echo $visits_today['count']; ?>/<?php echo $visits_yesterday['count']; ?></span><!-- Idag / Igår --
			<p>Today / Month - Today / Yesterday</p>
		</div>
	</div>
	
	<div style="clear: left;">&nbsp;</div>

	<div class="unique-visits left">
		<div class="unique-visits-int">
			<span><?php echo $visits_today['count']; ?></span>
		</div>

		<div class="unique-visits-text">
			Visits today
		</div>
		<!--
			<strong>Unika igår</strong> <?php echo $visits_yesterday['count']; ?><br />
			<strong>Unika denna månaden</strong> <?php echo $visits_month_row['count']; ?>
		--
	</div>

	<div class="total-visits right">
		<strong>Totalt denna månaden</strong> <?php echo $visits_month['count']; ?><br />
		<strong>Totalt förra månaden</strong> <?php echo $visits_lastmonth['count']; ?><br />
		<strong>Totalt unika sedan <?php echo $visits_total_start['date']; ?></strong> <?php echo $visits_total_unik['count'];?><br />
		<strong>Totalt sedan <?php echo $visits_total_start['date']; ?></strong> <?php echo $visits_total;?>	
	</div>
	<div style="clear: left;">&nbsp;</div>
</div>
-->
<!--
	  <span data-colours='["#10D080", "#eee"]' data-diameter="200"><?php echo $members_total; ?>/100</span><!-- Medlemmar / Mål --
	  <span data-colours='["#10D080", "#eee"]' data-diameter="200">0/10</span><!-- Pro / Mål --
-->
<!--
<p>
	<strong>Online just nu</strong> <?php echo $totalOnline; ?><br />
	<strong>Genomsnitt / dag</strong> <?php echo number_format($visits_average_day,2);?>
</p>-->

<?php/*
$browser_qry = mysql_query("SELECT DISTINCT browser FROM `visits` GROUP by `browser` ORDER BY COUNT(DISTINCT ipadress) DESC, `browser` ASC") or die(mysql_error());
while ($browser_row = mysql_fetch_assoc($browser_qry)) {
	$browser_row2 = sql("SELECT COUNT(DISTINCT ipadress) as `count` FROM `visits` WHERE `browser`='".$browser_row['browser']."'");
	echo '<p>'.$browser_row['browser'].''.$browser_row2['count'].'</p>';							
}

$system_qry = mysql_query("SELECT DISTINCT system FROM `visits` GROUP by `system` ORDER BY COUNT(DISTINCT ipadress) DESC") or die(mysql_error());
while ($system_row = mysql_fetch_assoc($system_qry)) {
	$system_row2 = sql("SELECT COUNT(DISTINCT ipadress) as `count` FROM `visits` WHERE `system`='".$system_row['system']."'");
	echo '<p>'.$system_row['system'].' - '.$system_row2['count'].'</p>';							
}
*/
?>
