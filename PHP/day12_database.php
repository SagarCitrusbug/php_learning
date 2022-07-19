<!-- Example (MySQLi Procedural) -->
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  echo "<br>";
?>

<!-- Example (MySQLi Object-oriented) -->
  <?php
    $sql = "CREATE DATABASE test";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
      echo "<br>";
    } else {
      echo "Error creating database: " . $conn->error;
      echo "<br>";
    }

    $conn1 = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn1->connect_error) {
      die("Connection failed: " . $conn1->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE MyGuests (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";

    if ($conn1->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
      echo "<br>";
    } else {
      echo "Error creating table: " . $conn->error;
      echo "<br>";
    }

    // PHP MySQL Insert Data
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

    if (mysqli_query($conn1, $sql)) {
      $last_id = mysqli_insert_id($conn);
      echo "New record created successfully. Last inserted ID is: " . $last_id;
      echo "<br>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      echo "<br>";
    }

    // PHP MySQL Insert Multiple Records
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";
    if ($conn1->multi_query($sql) === TRUE) {
      echo "New records created successfully";
      echo "<br>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn1->error;
      echo "<br>";
    }

    // // prepare and bind
    // $stmt = $conn1->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
    // $stmt->bind_param("sss", $firstname, $lastname, $email);

    // // set parameters and execute
    // $firstname = "John";
    // $lastname = "Doe";
    // $email = "john@example.com";
    // $stmt->execute();

    // $firstname = "Mary";
    // $lastname = "Moe";
    // $email = "mary@example.com";
    // $stmt->execute();

    // $firstname = "Julie";
    // $lastname = "Dooley";
    // $email = "julie@example.com";
    // $stmt->execute();

    // echo "New records created successfully";
    // echo "<br>";
    // $stmt->close();

    // PHP MySQL Select Data
    $sql = "SELECT id, firstname, lastname FROM myguests";
    $result1 = $conn1->query($sql);

    if ($result1->num_rows > 0) {
      echo "<table><tr><th>ID</th><th>Name</th></tr>";
      // output data of each row
      while($row = $result1->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }

  ?>


  

<!-- Close the Connection -->
<?php
  $conn->close();
?>