<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <!--link to my css file-->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
 
</head>

<body>


    <header>
        <nav class="navbar">
            <ul>
                <!--Navigation links and search input-->
                <li><a href="index.php">Home</a></li>
                <li><a href="booking.html">Booking</a></li>
                <li><a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </nav>
    </header>

<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== 'admin') {
    // Redirect to the login page or show an error message
    header('Location: login.php');
    exit;
}

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

// Fetch all records from the cinema_booking table
$result = mysqli_query($con, 'SELECT * FROM cinema_booking');

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    // Start table with larger row and column sizes
    echo '<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">';
    
    // Table headers
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Lastname</th>';
    echo '<th>Email</th>';
    echo '<th>Phone Number</th>';
    echo '<th>Cinema</th>';
    echo '<th>Quantity</th>';
    echo '<th>Movie</th>';
    echo '<th>Time</th>';
    echo '</tr>';

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["booking_id"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["lastname"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["phonenumber"] . '</td>';
        echo '<td>' . $row["cinema"] . '</td>';
        echo '<td>' . $row["quantity"] . '</td>';
        echo '<td>' . $row["movie"] . '</td>';
        echo '<td>' . $row["time"] . '</td>';
        echo '</tr>';
    }

    // End table
    echo '</table>';
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($con);
?>
