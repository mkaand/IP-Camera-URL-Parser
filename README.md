# IP Camera URL Parser v1
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
