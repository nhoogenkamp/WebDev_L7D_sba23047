<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== 'admin') {
    // Redirect to the login page or show an error message
    header('Location: login.php');
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and process the form data
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

    // Prepare and execute SQL query to insert new movie information into the database
    $stmt = $con->prepare('INSERT INTO new_movies (movie_name, movie_desc, actors, movie_trailer) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $_POST['movie_name'], $_POST['movie_desc'], $_POST['actors'], $_POST['movie_trailer']);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $con->close();

    // Redirect to admin panel or display a success message
    $success_message = 'Movie description added successfully.';
    header("Location: admin_panel.php?success_message=" . urlencode($success_message));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
                <div class="search">
                    <input type="text" id="searchInput" placeholder="Search for a movie..." onkeyup="searchMovies()">
                </div>
            </ul>
        </nav>
    </header>

<h1>Add New Movie</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="movie_name">Movie Name:</label><br>
    <input type="text" id="movie_name" name="movie_name" required><br><br>

    <label for="movie_desc">Movie Description:</label><br>
    <textarea id="movie_desc" name="movie_desc" rows="4" cols="50" required></textarea><br><br>

    <label for="actors">Actors:</label><br>
    <input type="text" id="actors" name="actors" required><br><br>

    <label for="movie_trailer">Movie Trailer URL:</label><br>
    <input type="text" id="movie_trailer" name="movie_trailer" required><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>