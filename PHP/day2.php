<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day 2</title>
</head>
<body>

	<!-- Php syntex how and when start php code. -->
	<?php 
		echo "php syntex"
	?><br>

	<!-- Comments in PHP -->
	<!-- Here 3 type of comment you will do. -->

	<!-- Single line comment. -->
	<?php
		// This is a single-line comment

		# This is also a single-line comment
	?><br>

	<!-- Multiple line comment -->
	<?php
		/*
		This is a multiple-lines comment block
		that spans over multiple
		lines
		*/
	?><br>

	<!-- Using comments to leave out parts of the code: -->
	<?php
		// You can also use comments to leave out parts of a code line
		$x = 5 /* + 15 */ + 5;
		echo $x;
	?><br>
	
	<!-- Creating (Declaring) PHP Variables -->
	<?php
		$txt = "Hello world!";
		$x = 5;
		$y = 10.5;
		$lng = "PHP";
		echo "I love " . $lng . "!";
	?><br>

	<?php
		$x = 5;
		$y = 4;
		echo $x + $y;
	?>
	<!-- Variable with global scope: -->
	<?php
		$x = 5; // global scope

		function myTest() {
		  // using x inside this function will generate an error
		  echo "<p>Variable x inside function is: $x</p>";
		}
		myTest();

		echo "<p>Variable x outside function is: $x</p>";
	?>
	<!-- Variable with local scope: -->

	<?php
		function myTest() {
		  $x = 5; // local scope
		  echo "<p>Variable x inside function is: $x</p>";
		}
		myTest();

		// using x outside the function will generate an error
		echo "<p>Variable x outside function is: $x</p>";
	?>

	


</body>
</html>