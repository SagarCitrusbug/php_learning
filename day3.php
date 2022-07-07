<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day 3</title>
</head>
<body>
	<!-- PHP String -->
	<?php
		$x = "Hello world! with double quotes";
		$y = 'Hello world! with single quotes';

		echo $x;
		echo "<br>";
		echo $y;
	?>
	<!-- PHP Integer -->
	<?php
		$int = 5985;
		echo "<br>";
		echo "<br>";
		echo "How to know type of data type:";
		var_dump($int);
	?>
	<!-- PHP Array -->
	<?php
		$cars = array("Volvo","BMW","Toyota");
		echo "<br>";
		echo "<br>";
		echo "The PHP var_dump() function returns the data type and value:";
		var_dump($cars);
	?>
	</br>
	<!-- PHP Casting Strings and Floats to Integers -->
	<?php
		// Cast float to int
		$x = 23465.768;
		$int_cast = (int)$x;
		echo $x." Cast float to int ".$int_cast;

		echo "<br>";

		// Cast string to int
		$x = "23465.768";
		$int_cast = (int)$x;
		echo $x." Cast string to int ".$int_cast;
	?>
	<!-- PHP pi() Function -->
	<?php
		echo(pi()); // returns 3.1415926535898
		echo "<br>";
	?>
	<!-- PHP min() and max() Functions -->
	<?php
		echo(min(0, 150, 30, 20, -8, -200));  // returns -200
		echo "<br>";
		echo(max(0, 150, 30, 20, -8, -200));  // returns 150
		echo "<br>";
	?>
	<!-- Random Numbers -->
	<?php
		echo(rand());
		echo "<br>";
		echo "random value between 10 to 100".(rand(10, 100));
		echo "<br>";
	?>
	<!-- PHP Constants -->
	<?php
		define("GREETING", "Welcome to W3Schools.com!");
		echo GREETING;
		echo "<br>";
	?>
	<!-- PHP Constant Arrays -->
	<?php
		define("cars", [
		  "Alfa Romeo",
		  "BMW",
		  "Toyota"
		]);
		echo cars[0];
		echo "<br>";
	?>
	<!-- Constants are Global -->
	<?php
		define("GREETING1", "Welcome to W3Schools.com!");

		function myTest() {
		  echo GREETING1;
		}
		 
		myTest();
		echo "<br>";
	?>

	<!-- The PHP switch Statement -->
	<?php
		$favcolor = "red";

		switch ($favcolor) {
		  case "red":
		    echo "Your favorite color is red!";
		    break;
		  case "blue":
		    echo "Your favorite color is blue!";
		    break;
		  case "green":
		    echo "Your favorite color is green!";
		    break;
		  default:
		    echo "Your favorite color is neither red, blue, nor green!";
		}
	?>
	
</body>
</html>