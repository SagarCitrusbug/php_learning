<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day8</title>
</head>
<body>
	<!--  -->
	<?php
		// Set session variables
		$_SESSION["favcolor"] = "green";
		$_SESSION["favanimal"] = "cat";
		echo "Session variables are set.<br>";
	?>

	<!-- Get PHP Session Variable Values -->
	<?php
		// Echo session variables that were set on previous page
		echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
		echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";
		// Another way to show all the session variable values 

		print_r($_SESSION);
		echo "<br>";
	?>

	<!-- Modify a PHP Session Variable -->
	<?php
		// to change a session variable, just overwrite it
		$_SESSION["favcolor"] = "yellow";
		print_r($_SESSION);
		echo "<br>";
	?>

	Destroy a PHP Session
	<?php
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();
		echo "All session variables are now removed, and the session is destroyed."
	?>

	<!-- PHP Filters -->
	<!-- Validating data = Determine if the data is in proper form.
	Sanitizing data = Remove any illegal character from the data. -->

	<!-- The filter_list() function can be used to list what the PHP filter extension offers: -->
	<table>
	  <tr>
	    <td>Filter Name</td>
	    <td>Filter ID</td>
	  </tr>
	  <?php
	  foreach (filter_list() as $id =>$filter) {
	    echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
	  }
	  ?>
	</table>

	<!-- PHP filter_var() Function -->

	<?php
		// Sanitize a String
		$str = "<h1>Hello World!</h1>";
		$newstr = filter_var($str, FILTER_SANITIZE_STRING);
		echo $newstr;
	?>

	<?php
		// Validate an Integer
		$int = 100;
		echo filter_var($int, FILTER_VALIDATE_INT);
		if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
		  echo("Integer is valid");
		  echo "<br>";
		} else {
		  echo("Integer is not valid");
		  echo "<br>";
		}
	?>

	<?php
		// <!-- Tip: filter_var() and Problem With 0 -->
		$int = 0;

		if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
		  echo("Integer is valid");
		  echo "<br>";
		} else {
		  echo("Integer is not valid");
		  echo "<br>";
		}
	?>

	<?php
		// Validate an IP Address
		$ip = "127.0.0.1";

		if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
		  echo("$ip is a valid IP address");
		  echo "<br>";
		} else {
		  echo("$ip is not a valid IP address");
		  echo "<br>";
		}
	?>

	<?php
		// Sanitize and Validate an Email Address
		$email = "john.doe@example.com";
		echo $email;
		echo "<br>";
		// Remove all illegal characters from email
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		  echo("$email is a valid email address");
		  echo "<br>";
		} else {
		  echo("$email is not a valid email address");
		  echo "<br>";
		}
	?>

	<?php
		// Sanitize and Validate a URL
		$url = "https://www.w3schools.com";

		// Remove all illegal characters from a url
		$url = filter_var($url, FILTER_SANITIZE_URL);

		// Validate url
		if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
		  echo("$url is a valid URL");
		  echo "<br>";
		} else {
		  echo("$url is not a valid URL");
		  echo "<br>";
		}
	?>

	<!-- PHP Filters Advanced -->
	<?php
		// Validate an Integer Within a Range
		$int = 122;
		$min = 1;
		$max = 200;

		if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
		  echo("Variable value is not within the legal range");
		  echo "<br>";
		} else {
		  echo("Variable value is within the legal range");
		  echo "<br>";
		}
	?>

	<?php
		// Validate IPv6 Address
		$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

		if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
		  echo("$ip is a valid IPv6 address");
		  echo "<br>";
		} else {
		  echo("$ip is not a valid IPv6 address");
		  echo "<br>";
		}
	?>

	<?php
		// Validate URL - Must Contain QueryString
		$url = "https://www.w3schools.com";

		if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
		  echo("$url is a valid URL with a query string");
		  echo "<br>";
		} else {
		  echo("$url is not a valid URL with a query string");
		  echo "<br>";
		}
	?>

	<?php
		// Remove Characters With ASCII Value > 127
		$str = "<h1>Hello WorldÆØÅ!</h1>";

		$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		echo $newstr;
		echo "<br>";
	?>

	<!-- PHP Callback Functions -->
	<?php
		function my_callback($item) {
		  return strlen($item);
		}

		$strings = ["apple", "orange", "banana", "coconut"];
		$lengths = array_map("my_callback", $strings);
		print_r($lengths);
		echo "<br>";
	?>

	<?php
		// PHP can pass anonymous functions as callback functions.
		$strings = ["apple", "orange", "banana", "coconut"];
		$lengths = array_map( function($item) { return strlen($item); } , $strings);
		print_r($lengths);
		echo "<br>";
	?>

	<?php
		// Callbacks in User Defined Functions
		function exclaim($str) {
		  return $str . "! ";
		}

		function ask($str) {
		  return $str . "? ";
		}

		function printFormatted($str, $format) {
		  // Calling the $format callback function
		  echo $format($str);
		  echo "<br>";
		}

		// Pass "exclaim" and "ask" as callback functions to printFormatted()
		printFormatted("Hello world", "exclaim");
		printFormatted("Hello world", "ask");
	?>

	<!-- PHP and JSON -->
	<!-- What is JSON? - JSON stands for JavaScript Object Notation, and is a syntax for storing and exchanging data. -->
	<!-- PHP has some built-in functions to handle JSON.
	json_encode()
	json_decode() -->
	<?php
		$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
		echo json_encode($age);
		echo "<br>";
	?>

	<?php
		$cars = array("Volvo", "BMW", "Toyota");
		echo json_encode($cars);
		echo "<br>";
	?>

	<?php
		$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
		var_dump(json_decode($jsonobj));
		echo "<br>";
		var_dump(json_decode($jsonobj, true));
		echo "<br>";

		// PHP - Accessing the Decoded Values
		$obj = json_decode($jsonobj);
		echo $obj->Peter;
		echo "<br>";
		echo $obj->Ben;
		echo "<br>";
		echo $obj->Joe;
		echo "<br>";

		// PHP - Looping Through the Values
		foreach($obj as $key => $value) {
		  echo $key . " => " . $value . "<br>";
		}
 	?>

 	<!-- PHP Exceptions -->
 	<?php
		function divide($dividend, $divisor) {
		  if($divisor == 0) {
		    throw new Exception("Division by zero");
		  }
		  return $dividend / $divisor;
		}

		echo divide(5, 0);
	?>

	<?php
		// The try...catch Statement
		// function divide($dividend, $divisor) {
		//   if($divisor == 0) {
		//     throw new Exception("Division by zero");
		//   }
		//   return $dividend / $divisor;
		// }

		try {
		  echo divide(5, 0);
		} catch(Exception $e) {
		  echo "Unable to divide.";
		}
	?>

	<?php
		// The try...catch...finally Statement
		// function divide($dividend, $divisor) {
		//   if($divisor == 0) {
		//     throw new Exception("Division by zero");
		//   }
		//   return $dividend / $divisor;
		// }

		try {
		  echo divide(5, 0);
		} catch(Exception $e) {
		  echo "Unable to divide. ";
		} finally {
		  echo "Process complete.";
		}
	?>

	<?php
		// The Exception Object
		// function divide($dividend, $divisor) {
		//   if($divisor == 0) {
		//     throw new Exception("Division by zero", 1);
		//   }
		//   return $dividend / $divisor;
		// }

		try {
		  echo divide(5, 0);
		} catch(Exception $ex) {
		  $code = $ex->getCode();
		  $message = $ex->getMessage();
		  $file = $ex->getFile();
		  $line = $ex->getLine();
		  echo "Exception thrown in $file on line $line: [Code $code]
		  $message";
		}
	?>
</body>
</html>