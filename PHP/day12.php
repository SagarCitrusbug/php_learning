<?php
namespace Html;
class Table {
  public $title = "";
  public $numRows = 0;
  public function message() {
    echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>";
  }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;
?>

<?php
	namespace Html;
	include "Html.php";

	$table1 = new Table1();
	$table1->title = "My table";
	$table1->numRows = 5;

	$row1 = new Row1();
	$row1->numCells = 3;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Day12</title>
</head>
<body>
	<!-- PHP OOP - Traits -->
	<?php
		trait message1 {
		  public function msg1() {
		    echo "OOP is fun! ";
		  }
		}

		trait message2 {
		  public function msg2() {
		    echo "OOP reduces code duplication!";
		  }
		}

		class Welcome {
		  use message1;
		}

		class Welcome2 {
		  use message1, message2;
		}

		$obj = new Welcome();
		$obj->msg1();
		echo "<br>";

		$obj2 = new Welcome2();
		$obj2->msg1();
		$obj2->msg2();
	?>

	<!-- PHP OOP - Static Methods -->
	<?php
		class domain {
		  protected static function getWebsiteName() {
		    return "W3Schools.com";
		  }
		}

		class domainW3 extends domain {
		  public $websiteName;
		  public function __construct() {
		    $this->websiteName = parent::getWebsiteName();
		  }
		}

		$domainW3 = new domainW3;
		echo "<br>";
		echo $domainW3 -> websiteName;
		echo "<br>";
	?>

	<!-- PHP OOP - Static Properties -->
	<?php
		class pi {
		  public static $value=3.14159;
		}

		class x extends pi {
		  public function xStatic() {
		    return parent::$value;
		  }
		}

		// Get value of static property directly via child class
		echo x::$value;

		// or get value of static property via xStatic() method
		$x = new x();
		echo $x->xStatic();
	?>

	<!-- PHP Namespaces -->
	<?php
		$table->message();
	?>

	<?php $table1->message(); ?>
	<?php $row1->message(); ?>

	<!-- PHP Iterables -->
	<?php
		function printIterable1(iterable $myIterable) {
		  foreach($myIterable as $item) {
		    echo $item;
		  }
		}

		$arr = ["a", "b", "c"];
		printIterable1($arr);
	?>
	<!-- 
		An iterator must have these methods:
			current() - Returns the element that the pointer is currently pointing to. It can be any data type
			key() Returns the key associated with the current element in the list. It can only be an integer, float, boolean or string
			next() Moves the pointer to the next element in the list
			rewind() Moves the pointer to the first element in the list
			valid() If the internal pointer is not pointing to any element (for example, if next() was called at the end of the list), this should return false. It returns true in any other case 
	-->

	<?php
		// Create an Iterator
		class MyIterator implements Iterator {
		  private $items = [];
		  private $pointer = 0;

		  public function __construct($items) {
		    // array_values() makes sure that the keys are numbers
		    $this->items = array_values($items);
		  }

		  public function current() {
		    return $this->items[$this->pointer];
		  }

		  public function key() {
		    return $this->pointer;
		  }

		  public function next() {
		    $this->pointer++;
		  }

		  public function rewind() {
		    $this->pointer = 0;
		  }

		  public function valid() {
		    // count() indicates how many items are in the list
		    return $this->pointer < count($this->items);
		  }
		}

		// A function that uses iterables
		function printIterable(iterable $myIterable) {
		  foreach($myIterable as $item) {
		    echo $item;
		  }
		}

		// Use the iterator as an iterable
		$iterator = new MyIterator(["a", "b", "c"]);
		printIterable($iterator);
	?>


</body>
</html>