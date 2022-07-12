<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day 6</title>
</head>
<body>
	<!-- PHP Date and Time -->
	<!-- Syntax:-date(format,timestamp) -->
	<?php
		echo "Today is " . date("Y/m/d") . "<br>"; //hear show different formate of date.
		echo "Today is " . date("Y.m.d") . "<br>"; //hear show different formate of date.
		echo "Today is " . date("Y-m-d") . "<br>"; //hear show different formate of date.
		echo "Today is " . date("l"). "<br>"; //hear show day of week.
		echo "&copy; 2010-" . date("Y")."<br>"; //hear show Only year od current date or given date.
		echo "The time is " . date("h:i:sa"). "<br>";
		// H - 24-hour format of an hour (00 to 23)
		// h - 12-hour format of an hour with leading zeros (01 to 12)
		// i - Minutes with leading zeros (00 to 59)
		// s - Seconds with leading zeros (00 to 59)
		// a - Lowercase Ante meridiem and Post meridiem (am or pm)

		date_default_timezone_set("America/New_York");
		echo "The time is " . date("h:i:sa");
		// Create a Date With mktime()

		// The optional timestamp parameter in the date() function specifies a timestamp. If omitted, the current date and time will be used (as in the examples above).
  		// The PHP mktime() function returns the Unix timestamp for a date. The Unix timestamp contains the number of seconds between the Unix Epoch (January 1 1970 00:00:00 GMT) and the time specified.

  		$d=mktime(11, 14, 54, 8, 12, 2014);
		echo "Created date is " . date("Y-m-d h:i:sa", $d);
		
		// Create a Date From a String With strtotime()
		$d=strtotime("10:30pm April 15 2014");
		echo "Created date is " . date("Y-m-d h:i:sa", $d);

		// PHP is quite clever about converting a string to a date, so you can put in various values:
		$d=strtotime("tomorrow");
		echo date("Y-m-d h:i:sa", $d) . "<br>";

		$d=strtotime("next Saturday");
		echo date("Y-m-d h:i:sa", $d) . "<br>";

		$d=strtotime("+3 Months");
		echo date("Y-m-d h:i:sa", $d) . "<br>";

		// More Date Examples
		$d1=strtotime("July 04");
		$d2=ceil(($d1-time())/60/60/24);
		echo "There are " . $d2 ." days until 4th of July.";

	?>
	<!-- PHP include and require Statements -->
	<!-- require will produce a fatal error (E_COMPILE_ERROR) and stop the script
	include will only produce a warning (E_WARNING) and the script will continue -->

	

</body>
</html>