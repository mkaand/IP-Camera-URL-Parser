# IP Camera URL Parser v1.1

Credits: Kaan Doğan @mkaand<br>
Filtering some strings for IP Camera - 01.08.2017<br>
This script automatically filters Alarm Records of IP Camera. <br>
Some IP Cameras can records alarms and program to SD cards and records like this format:<br>
<br>
Example:<br>
A170801_115044_115059.264	 01-Aug-2017 11:50	  795.0k<br>
P170801_000000_001006.264	 01-Aug-2017 00:10	  14.9M<br>
P170801_001006_002012.264	 01-Aug-2017 00:20	  15.0M<br>
<br>
A means motion detect P means programmed records.<br>
<br>
This code can filters and shows only A records and you can seek previous day and next day.<br>
<br>
USAGE:<br>
Just change baseurl. You can declare your username, camera port and password:<br>
$baseurl="http://admin:password@cameraurl:PORT/sd/"<br><br>
You need to change this line with your current year:<br><br>
For 2017:<br>
	if (strpos($arrayItem, 'A17') !== false) {<br>
For 2018:<br>
	if (strpos($arrayItem, 'A18') !== false) {<br>
That's it!<br>

Original / Filtered Screenshots:

![Original](/screenshot2.jpg?raw=true "Original Results")
![Filtered](/screenshot1.jpg?raw=true "Filtered Results")
