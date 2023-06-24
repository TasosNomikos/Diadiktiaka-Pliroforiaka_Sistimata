<?php
// Replace with your own database credentials
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "gasdb";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the contact form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"], $_POST["phone_number"], $_POST["department"], $_POST["email"], $_POST["subject"], $_POST["message"])) {
    $name = $_POST["name"];
    $phone_number = $_POST["phone_number"];
    $department = $_POST["department"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Insert the message data into the "requests" table
    $sql = "INSERT INTO requests (name, phone_number, department, email, subject, message) VALUES ('$name', '$phone_number', '$department', '$email', '$subject', '$message')";
    if ($conn->query($sql) === true) {
        header("Location: epikoinwnia.php?success=1");
        exit();    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if the newsletter subscription form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"], $_POST["name"], $_POST["email"])) {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Insert the subscriber data into the "subscribers" table
    $sql = "INSERT INTO subscribers (username, name, email) VALUES ('$username', '$name', '$email')";
    if ($conn->query($sql) === true) {
        header("Location: epikoinwnia.php?success=2");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
