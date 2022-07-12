<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day7</title>
	<?php
		$cookie_name = "name";
		$cookie_value = "Citrusbug";
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie("user", "", time() - 3600);
		setcookie("test_cookie", "test", time() + 3600, '/');
	?>
</head>
<body>

	<div class="menu">
		<?php include 'menu.php';?>
	</div>

	<h1>Welcome to my home page!</h1>
	<p>Some text.</p>
	<p>Some more text.</p>
	<?php include 'footer.php';?>

	<h1>Welcome to my home page!</h1>
	<?php include 'vars.php';
	echo "I have a $color $car.";
	?>

	<?php 
		echo "<br>";
		echo readfile("webdictionary.txt");
	?>
	<!-- PHP Open File - fopen() -->
	<?php
		echo "<br>";
		$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("webdictionary.txt"));
		fclose($myfile);

		echo "<br>-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-<br>";
	?>
	<!-- PHP Check End-Of-File - feof() -->
	<?php
		$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
		// Output one line until end-of-file
		while(!feof($myfile)) {
		  echo fgets($myfile) . "<br>";
		}
		fclose($myfile);
	?>
	<!-- PHP Read Single Character - fgetc() -->
	<?php
		$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
		// Output one character until end-of-file
		while(!feof($myfile)) {
		  echo fgetc($myfile);
		}
		fclose($myfile);
	?>
	<!-- PHP Create File - fopen() -->
	<?php
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = "Citrusbug technolab\n";
		fwrite($myfile, $txt);
		$txt = "Learning PHP\n";
		fwrite($myfile, $txt);
		fclose($myfile);
	?>
	<!-- PHP Append Text -->
	<?php
		$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
		$txt = "PHP Advance lavel\n";
		fwrite($myfile, $txt);
		$txt = "For EBR\n";
		fwrite($myfile, $txt);
		fclose($myfile);
		echo "<br>";
	?>

	<form action="upload.php" method="post" enctype="multipart/form-data">
	  Select image to upload:
	  <input type="file" name="fileToUpload" id="fileToUpload">
	  <input type="submit" value="Upload Image" name="submit">
	</form>

	<!-- What is a Cookie? -->
	<!-- A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too. With PHP, you can both create and retrieve cookie values. -->

	<!-- Create Cookies With PHP -->
	<?php
		if(!isset($_COOKIE[$cookie_name])) {
		  echo "Cookie named '" . $cookie_name . "' is not set!";
		} else {
		  echo "Cookie '" . $cookie_name . "' is set!<br>";
		  echo "Value is: " . $_COOKIE[$cookie_name];
		}
		echo "<br>";
		echo "Cookie 'user' is deleted.";
	?>
	<?php
		if(count($_COOKIE) > 0) {
		  echo "Cookies are enabled.";
		} else {
		  echo "Cookies are disabled.";
		}
	?>


</body>
</html>