<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day9</title>
</head>
<body>
	<?php
		class Fruit {
		  // Properties
		  public $name;
		  public $color;

		  // Methods
		  function set_name($name) {
		    $this->name = $name;
		  }
		  function get_name() {
		    return $this->name;
		  }
		}

		$apple = new Fruit();
		$banana = new Fruit();
		$apple->set_name('Apple');
		$banana->set_name('Banana');

		echo $apple->get_name();
		echo "<br>";
		echo $banana->get_name();
		echo "<br>";

		// 1. Inside the class (by adding a set_name() method and use $this):
		$Cit = new Fruit();
		$Cit->set_name("Citrusbug");

		echo $Cit->name;
		echo "<br>";
		// 2. Outside the class (by directly changing the property value):

		$php = new Fruit();
		$php->name = "PHP";

		echo $php->name;
		echo "<br>";
	?>

	<?php
		class Fruit1 {
		  // Properties
		  public $name;
		  public $color;

		  // Methods
		  function set_name($name) {
		    $this->name = $name;
		  }
		  function get_name() {
		    return $this->name;
		  }
		  function set_color($color) {
		    $this->color = $color;
		  }
		  function get_color() {
		    return $this->color;
		  }
		}

		$apple = new Fruit1();
		$apple->set_name('Apple');
		$apple->set_color('Red');
		echo "Name: " . $apple->get_name();
		echo "<br>";
		echo "Color: " . $apple->get_color();
		echo "<br>";


		// PHP - instanceof
		$apple = new Fruit();
		var_dump($apple instanceof Fruit);	
		echo "<br>";
	?>

	<!-- PHP - The __construct Function -->

	<?php
		class Contruction {
		  public $name;
		  public $color;

		  function __construct($name, $color) {
		    $this->name = $name;
		    $this->color = $color;
		  }
		  function get_name() {
		    return $this->name;
		  }
		  function get_color() {
		    return $this->color;
		  }
		}

		$apple = new Contruction("Apple", "red");
		echo $apple->get_name();
		echo "<br>";
		echo $apple->get_color();
		echo "<br>";
	?>

	<!-- PHP - The __destruct Function -->
	<?php
		class Destruction {
		  public $name;
		  public $color;

		  function __construct($name, $color) {
		    $this->name = $name;
		    $this->color = $color;
		  }
		  function __destruct() {
		    echo "The fruit is {$this->name} and the color is {$this->color}.";
		  }
		}

		$apple = new Destruction("Apple", "red");
	?>
</body>
</html>