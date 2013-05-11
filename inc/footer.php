	
	<!-- // JAVASCRIPT's -->
	<script type="text/javascript" src=""></script>

</body>
</html>

<?php
$time_start = getmicrotime();
for ($i=0; $i <1000; $i++){}
$time_end = getmicrotime();
$time = $time_end - $time_start;
$time = round($time,6);

echo "<!-- Generated in $time seconds. -->";
?>

