<?php
// Include the PHPMailer autoload file
require 'vendor/autoload.php';

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

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cinemasba23047@gmail.com'; // Your Gmail address
    $mail->Password = 'sba23047'; // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom('cinemasba23047@gmail.com', 'Niels'); // Sender's email and name
    $mail->addAddress($_POST['inputemail']); // Recipient's email
    $mail->addReplyTo('cinemasba23047@gmail.com', 'Niels'); // Reply to

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Movie Booking Confirmation';
    $mail->Body = '
    <h1>Thank you for booking!</h1>
    <p>Your movie booking has been confirmed. Here are the details:</p>
    <ul>
        <li>Movie: ' . $_POST['inputmovie'] . '</li>
        <li>Time: ' . $_POST['inputtime'] . '</li>
        <!-- Add more booking details as needed -->
    </ul>
    <p>We look forward to seeing you at the cinema!</p>
    ';

    // Send email
    if ($mail->send()) {
        echo 'Email confirmation sent successfully!';
    } else {
        echo 'Failed to send email confirmation.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

    // Redirect back to the booking page
    header('Location: boughttickets.html');
    exit;
} else {
    // If the form is not submitted, redirect to the booking page
    header('Location: booking.html');
    exit;
}
?>