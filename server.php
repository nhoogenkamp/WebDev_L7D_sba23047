<?php
session_start();

// Connect to MySQL database
$servername = "localhost";
$username = "root"; // Define the database username
$password = "";
$database = "cinema"; // Use the cinema database

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "error connecting to mysql";
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to fetch user from database
    echo "test";
    $sql = "SELECT id FROM cinema_users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Debugging: Print the SQL query
    echo "SQL Query: " . $sql . "<br>";

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION["username"] = $username;
        header("Location: http://localhost/WebDev_L7D_sba23047/index.php"); // Redirect to welcome page
    } else {
        // Login failed
        echo "Login failed <br>";

        // Debugging: Print the error message
        echo "Error: " . $conn->error . "<br>";

        header("Location: http://localhost/WebDev_L7D_sba23047/index.php?error=1"); // Redirect back to login page with error
    }
}

$conn->close();
?>
