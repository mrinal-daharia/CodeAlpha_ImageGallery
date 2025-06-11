<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Error while submitting the form";
    exit;
}

// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "Optic_Flow";

$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input
$name = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : "";
$message = isset($_POST["message"]) ? $conn->real_escape_string($_POST["message"]) : "";

// Store in session (optional)
$_SESSION["name"] = $name;
$_SESSION["message"] = $message;

// Get current date and time
$date = date("Y-m-d");
$time = date("H:i:s");

// Insert query
$sql = "INSERT INTO feedback (name, message, date, time) 
        VALUES ('$name', '$message', '$date', '$time')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for your feedback!";
    header("Location: index.html");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
