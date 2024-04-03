<?php

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
    $sql = "SELECT user_id FROM cinema_users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        // Login successful
        echo "Login successful <br>";
        $_SESSION["username"] = $username;

        header("Location: index.php"); 
    } else {
        // Login failed
        echo "SQL Query: " . $sql . "<br>";
        echo "Login failed <br>";

        // Debugging: Print the error message
        echo "Error: " . $conn->error . "<br>";

        // header("Location: http://localhost/WebDev_L7D_sba23047/index.php?error=1"); // Redirect back to login page with error
    }
}

$conn->close();
?>
