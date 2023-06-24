<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
  header("Location: admin_login.html");
  exit();
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "gasdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve messages from the database
$sql = "SELECT name, phone_number, department, email, subject, message FROM requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Messages</title>
  <link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
  <div class="table-container">
    <h2>Admin Messages</h2>
    <?php 
    if ($result->num_rows > 0) {
            // Display messages table
            echo '<table class="messages-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>Phone Number</th>';
            echo '<th>Department</th>';
            echo '<th>Email</th>';
            echo '<th>Subject</th>';
            echo '<th>Message</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["name"] . '</td>';
                echo '<td>' . $row["phone_number"] . '</td>';
                echo '<td>' . $row["department"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>' . $row["subject"] . '</td>';
                echo '<td>' . $row["message"] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';}
    ?>
