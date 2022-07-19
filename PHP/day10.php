<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day10</title>
</head>
<body>
	<!-- PHP - Access Modifiers -->
	<?php
		class Fruit {
		  public $name;
		  protected $color;
		  private $weight;
		}

		$mango = new Fruit();
		$mango->name = 'Mango'; // OK
		// $mango->color = 'Yellow'; // ERROR 
		// Above code give below Error:-
			// Fatal error: Uncaught Error: Cannot access protected property Fruit::$color in C:\xampp\htdocs\php_learning\day10.php:19 Stack trace: #0 {main} thrown in C:\xampp\htdocs\php_learning\day10.php on line 19


		// $mango->weight = '300'; // ERROR
		// Above code give below Error:-
			// Fatal error: Uncaught Error: Cannot access private property Fruit::$weight in C:\xampp\htdocs\php_learning\day10.php:20 Stack trace: #0 {main} thrown in C:\xampp\htdocs\php_learning\day10.php on line 20
	?>


	<?php
		class Fruit1 {
		  public $name;
		  public $color;
		  public $weight;

		  function set_name($n) {  // a public function (default)
		    $this->name = $n;
		  }
		  protected function set_color($n) { // a protected function
		    $this->color = $n;
		  }
		  function get_color() {
		    return $this->name;
		  }
		  private function set_weight($n) { // a private function
		    $this->weight = $n;
		  }
		}

		$mango = new Fruit1();
		$mango->set_name('Mango'); // OK
		// $mango->set_color('Yellow'); // ERROR
		// $mango->set_weight('300'); // ERROR

		echo $mango -> get_color();
	?>

	<!-- PHP OOP - Inheritance -->
	<?php
		class Fruit2 {
		  public $name;
		  public $color;
		  public function __construct($name, $color) {
		    $this->name = $name;
		    $this->color = $color;
		  }
		  public function intro() {
		    echo "The fruit is {$this->name} and the color is {$this->color}.";
		    echo "<br>";
		  }
		}

		// Strawberry is inherited from Fruit
		class Strawberry extends Fruit2 {
		  public function message() {
		    echo "Am I a fruit or a berry? ";
		    echo "<br>";
		  }
		}
		$strawberry = new Strawberry("Strawberry", "red");
		$strawberry->message();
		$strawberry->intro();
	?>

	<!-- PHP - Inheritance and the Protected Access Modifier -->
	<?php
		class Fruit_in {
		  public $name;
		  public $color;
		  public function __construct($name, $color) {
		    $this->name = $name;
		    $this->color = $color;
		  }
		  protected function intro() {
		    echo "The fruit is {$this->name} and the color is {$this->color}.";
		    echo "<br>";
		  }
		}

		class Strawberry1 extends Fruit_in {
		  public function message() {
		    echo "Am I a fruit or a berry? ";
		    echo "<br>";
		  }
		}

		// Try to call all three methods from outside class
		$strawberry = new Strawberry1("Strawberry", "red");  // OK. __construct() is public
		$strawberry->message(); // OK. message() is public
		// $strawberry->intro(); // ERROR. intro() is protected
		// Below error 
			// Fatal error: Uncaught Error: Call to protected method Fruit_in::intro() from context '' in C:\xampp\htdocs\php_learning\day10.php:110 Stack trace: #0 {main} thrown in C:\xampp\htdocs\php_learning\day10.php on line 110
	?>

	<!-- Now  below code use for access protected method -->
	<?php
		class Fruit_aa {
		  public $name;
		  public $color;
		  public function __construct($name, $color) {
		    $this->name = $name;
		    $this->color = $color;
		  }
		  protected function intro() {
		    echo "The fruit is {$this->name} and the color is {$this->color}.";
		    echo "<br>";
		  }
		}

		class Strawberry2 extends Fruit_aa {
		  public function message() {
		    echo "Am I a fruit or a berry? ";
		    echo "<br>";
		    // Call protected method from within derived class - OK
		    $this -> intro();
		  }
		}

		$strawberry = new Strawberry2("Strawberry", "red"); // OK. __construct() is public
		$strawberry->message(); // OK. message() is public and it calls intro() (which is protected) from within the derived class
	?>

	<!-- PHP - Overriding Inherited Methods -->
	<?php
		class Fruit5 {
		  public $name;
		  public $color;
		  public function __construct($name, $color) {
		    $this->name = $name;
		    $this->color = $color;
		  }
		  public function intro() {
		    echo "The fruit is {$this->name} and the color is {$this->color}.";
		    echo "<br>";
		  }
		}

		class Strawberry5 extends Fruit5 {
		  public $weight;
		  public function __construct($name, $color, $weight) {
		    $this->name = $name;
		    $this->color = $color;
		    $this->weight = $weight;
		  }
		  public function intro() {
		    echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
		    echo "<br>";
		  }
		}

		$strawberry = new Strawberry5("Strawberry", "red", 50);
		$strawberry->intro();
	?>
	
	<!-- PHP - The final Keyword -->
	<?php
	// 	class Fruit6 {
	// 	  final public function intro() {
	// 	    // some code
	// 	  }
	// 	}

	// 	class Strawberry6 extends Fruit6 {
	// 	  // will result in error
	// 	  public function intro() {
	// 	    // some code
	// 	  }
	// 	}
		// Error is below
			// Fatal error: Cannot override final method Fruit6::intro() in C:\xampp\htdocs\php_learning\day10.php on line 185
	?>

	<!-- PHP - Class Constants -->
	<?php
		class Goodbye {
		  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
		  public function byebye() {
		    echo self::LEAVING_MESSAGE;
		    echo "<br>";
		  }
		}

		echo Goodbye::LEAVING_MESSAGE;
		echo "<br>";
		$goodbye = new Goodbye();
		$goodbye->byebye();
	?>

	<!-- PHP OOP - Abstract Classes -->
	<?php
		// Parent class
		abstract class Car {
		  public $name;
		  public function __construct($name) {
		    $this->name = $name;
		  }
		  abstract public function intro() : string;
		}

		// Child classes
		class Audi extends Car {
		  public function intro() : string {
		    return "Choose German quality! I'm an $this->name!<br>";
		  }
		}

		class Volvo extends Car {
		  public function intro() : string {
		    return "Proud to be Swedish! I'm a $this->name!<br>";
		  }
		}

		class Citroen extends Car {
		  public function intro() : string {
		    return "French extravagance! I'm a $this->name!<br>";
		  }
		}

		// Create objects from the child classes
		$audi = new audi("Audi");
		echo $audi->intro();
		echo "<br>";

		$volvo = new volvo("Volvo");
		echo $volvo->intro();
		echo "<br>";

		$citroen = new citroen("Citroen");
		echo $citroen->intro();
	?>

	<?php
		abstract class ParentClass {
		  // Abstract method with an argument
		  abstract protected function prefixName($name);
		}

		class ChildClass extends ParentClass {
		  // The child class may define optional arguments that are not in the parent's abstract method
		  public function prefixName($name, $separator = ".", $greet = "Dear") {
		    if ($name == "John Doe") {
		      $prefix = "Mr";
		    } elseif ($name == "Jane Doe") {
		      $prefix = "Mrs";
		    } else {
		      $prefix = "";
		    }
		    return "{$greet} {$prefix}{$separator} {$name}";
		  }
		}

		$class = new ChildClass;
		echo $class->prefixName("John Doe");
		echo "<br>";
		echo $class->prefixName("Jane Doe");
	?>
</body>
</html>