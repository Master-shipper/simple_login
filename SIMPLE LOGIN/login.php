<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
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

  // Prepare and execute a query to validate the user's credentials
  $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  // Check if the query returned any rows
  if ($result->num_rows > 0) {
    // User authenticated successfully
    $response = array("success" => true);
    echo json_encode($response);
  } else {
    // Invalid credentials
    $response = array("success" => false, "message" => "Invalid email or password");
    echo json_encode($response);
  }

  // Close the database connection
  $conn->close();
}
?>
