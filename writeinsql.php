<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'cinema';

    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, display an error message
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    // Prepare and execute SQL query to insert booking information into the database
    $stmt = $con->prepare('INSERT INTO cinema_booking (name, lastname, email, phonenumber, cinema, quantity, movie, time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssssss', $_POST['inputname'], $_POST['inputlastname'], $_POST['inputemail'], $_POST['inputphonenumber'], $_POST['inputcinema'], $_POST['inputquantity'], $_POST['inputmovie'], $_POST['inputtime']);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $con->close();

    // Redirect back to the booking page or display a success message
    header('Location: boughttickets.html');
    exit;
} else {
    // If the form is not submitted, redirect to the booking page
    header('Location: booking.html');
    exit;
}
