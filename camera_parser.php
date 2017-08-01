<?php
/*
URL Parser v1.1
Credits: Kaan Doğan @mkaand
Filtering some strings for IP Camera - 01.08.2017
This script automatically filters Alarm Records of IP Camera. 
Some IP Cameras can records alarms and program to SD cards and records like this format:

Example:
A170801_115044_115059.264	 01-Aug-2017 11:50	  795.0k
P170801_000000_001006.264	 01-Aug-2017 00:10	  14.9M
P170801_001006_002012.264	 01-Aug-2017 00:20	  15.0M

A means motion detect P means programmed records.

This code can filters and shows only A records and you can seek previous day and next day.

USAGE:
Just change baseurl. You can declare your username, camera port and password:
$baseurl="http://admin:password@cameraurl:PORT/sd/"
You need to change this line with your current year:
For 2017:
	if (strpos($arrayItem, 'A17') !== false) {
For 2018:
	if (strpos($arrayItem, 'A18') !== false) {
That's it!
*/
header('Content-Type: text/html; charset=utf-8');
?>
<center><table cellpadding="0">
<?
$date = isset($_GET['date']) ? $_GET['date'] : date('Ymd');
$prev_date = date('Ymd', strtotime($date .' -1 day'));
$next_date = date('Ymd', strtotime($date .' +1 day'));
?>

<a href="?date=<?=$prev_date;?>">Previous</a> | 
<a href="?date=<?=date("Ymd");?>">Today</a> | 
<a href="?date=<?=$next_date;?>">Next</a>
<br>
<br>
<?
Function extract_unit($string, $start, $end)
{
$pos = stripos($string, $start);
$str = substr($string, $pos);
$str_two = substr($str, strlen($start));
$second_pos = stripos($str_two, $end); 
$str_three = substr($str_two, 0, $second_pos);
$unit = trim($str_three); // remove whitespaces
return $unit;
}

For ($i = 0; $i <= 3; $i++) {

$baseurl="http://admin:password@cameraurl:PORT/sd/";
$baseurl= $baseurl.$date."/record00" . $i . "/";
$content = @file_get_contents($baseurl);

If ($content === false) {echo "</table></center>";}

else 
{

	$coordinate = extract_unit($content, '<table cellpadding="0">', '</table>');
	$password = explode("<tr>", $coordinate);
		foreach ($password as $arrayItem) {
			if (strpos($arrayItem, 'A17') !== false) {
				$arrayItem = str_replace("/sd/", "http://cameraurl:PORT/sd/", $arrayItem);
				echo "<tr>" . $arrayItem;
			} //if end
		} //for end
 
} //if end	
} //for end
?>
