<?php
session_start();
include "server.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform your login validation here (e.g., check against a database)
    // For demonstration purposes, let's assume a simple validation

    if ($username === "your_username" && $password === "your_password") {
        // Set session variables to mark the user as logged in
        $_SESSION["username"] = $username;

        // Redirect the user to another page (e.g., index.php)
        header("Location: index.php");
        exit(); // Ensure that no further code is executed after redirection
    } else {
        // If login fails, you can redirect back to the login page with an error message
        header("Location: index.php?login_error=1");
        exit();
    }
} else {
    // If the form is not submitted via POST method, redirect back to the login page
    header("Location: index.php");
    exit();
}
?>