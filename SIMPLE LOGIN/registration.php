<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Establish a database connection
  $servername = "localhost";
  $username = "root"; // Replace with your MySQL username
  $db_password = ""; // Replace with your MySQL password
  $database = "simple_login";

  $conn = new mysqli($servername, $username, $db_password, $database);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute an INSERT query to store the user's registration data
  $sql = "INSERT INTO registration (name, email, password) VALUES ('$name', '$email', '$password')";
  if ($conn->query($sql) === TRUE) {
    // Registration successful
    header("Location: Dashboard.html");
    exit;
  } else {
    // Error occurred during registration
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
