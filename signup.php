<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to your database
    $conn = new mysqli('localhost', 'root', '', 'cinema');
    
    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Check if the username or email already exists
    $check_query = "SELECT * FROM cinema_users WHERE username='$username' OR user_email='$email'";
    $result = $conn->query($check_query);
    
    if ($result->num_rows > 0) {
        // Username or email already exists
        echo "<script>alert('Username or email already exists. Please choose another.');</script>";
        
    } else {
        // Insert user data into the database
        $insert_query = "INSERT INTO cinema_users (username, user_email, password, user_type) VALUES ('$username', '$email', '$password', 'regular')";
        if ($conn->query($insert_query) === TRUE) {
            echo "<script>alert('Sign-up successful!');</script>";
        } else {
            echo "<script>alert('Error: " . $insert_query . "\\n" . $conn->error . "');</script>";
        }
    }
    
    // Close database connection
    $conn->close();
}
?>