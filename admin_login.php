<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check username and password
  $username = "admin";
  $password = "Root123";

  $input_username = $_POST["username"];
  $input_password = $_POST["password"];

  if ($input_username == $username && $input_password == $password) {
    // Authentication successful, set session variables
    $_SESSION["admin_logged_in"] = true;
    header("Location: admin_messages.php");
    exit();
  } else {
    // Authentication failed
    echo "“Λυπούμαστε δεν είστε διαχειριστής της διαδικτυακής 
          εφαρμογής”";
  }
}
?>
