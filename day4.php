<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day 4</title>
</head>
<body>
	<!-- The PHP while Loop -->
	<?php
		$x = 1;

		while($x <= 5) {
		  echo "The number is: $x <br>";
		  $x++;
		}
	?>
	<br>
	<!-- The PHP do...while Loop -->
	<?php
		$x = 1;

		do {
		  echo "The number is: $x <br>";
		  $x++;
		} while ($x <= 5);
	?>
	<br>
	<!-- The PHP for Loop -->
	<?php
		for ($x = 0; $x <= 10; $x++) {
		  echo "The number is: $x <br>";
		}
	?>
	<!-- The PHP foreach Loop -->
	<?php
		$colors = array("red", "green", "blue", "yellow");

		foreach ($colors as $value) {
		  echo "$value <br>";
		}

		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

		foreach($age as $x => $val) {
		  echo "$x = $val<br>";
		}
	?>
	<!-- PHP Break -->
	<?php
		for ($x = 0; $x < 10; $x++) {
		  if ($x == 4) {
		    break;
		  }
		  echo "The number is: $x <br>";
		}
	?>
	<!-- PHP Continue -->
	<!-- The continue statement breaks one iteration (in the loop), if a specified condition occurs, and continues with the next iteration in the loop. -->
	<?php
		for ($x = 0; $x < 10; $x++) {
		  if ($x == 4) {
		    continue;
		  }
		  echo "The number is: $x <br>";
		}
	?>
	<!-- Create a User Defined Function in PHP -->
	<?php
		function writeMsg() {
		  echo "Hello world!";
		}

		writeMsg(); // call the function
	?>
	<!-- PHP Function Arguments -->
	<?php
		function familyName($fname) {
		  echo "$fname Refsnes.<br>";
		}

		familyName("Jani");
		familyName("Hege");
		familyName("Stale");
		familyName("Kai Jim");
		familyName("Borge");
	?>

	<!-- <?php 
	//declare(strict_types=1); // strict requirement
	//	function addNumbers(float $a, float $b) : int {
	//	  return (int)($a + $b);
	//	}
	//	echo addNumbers(1.2, 5.2);
	?> -->

	<!-- Get The Length of an Array - The count() Function -->
	<?php
		$cars = array("Volvo", "BMW", "Toyota");
		echo count($cars);
	?>

	<!-- PHP Associative Arrays -->
	<?php
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

		foreach($age as $x => $x_value) {
		  echo "Key=" . $x . ", Value=" . $x_value;
		  echo "<br>";
		}
	?>
	<!-- PHP - Multidimensional Arrays -->
	<?php
		$cars = array (
		  array("Volvo",22,18),
		  array("BMW",15,13),
		  array("Saab",5,2),
		  array("Land Rover",17,15)
		);
		echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
		echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
		echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
		echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";
	?>

	<!-- Sort Array in Ascending Order - sort() -->
	<?php
		$numbers = array(4, 6, 2, 22, 11);
		sort($numbers);
		// Sort Array in Descending Order - rsort()
		$cars = array("Volvo", "BMW", "Toyota");
		rsort($cars);
		// Sort Array (Ascending Order), According to Value - asort()
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		asort($age);
		// Sort Array (Ascending Order), According to Key - ksort()
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		ksort($age);
	?>
	
	<!-- PHP $_POST -->
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	  Name: <input type="text" name="fname">
	  <input type="submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  // collect value of input field
	  $name = $_POST['fname'];
	  if (empty($name)) {
	    echo "Name is empty";
	  } else {
	    echo $name;
	  }
	}
	?>

</body>
</html>