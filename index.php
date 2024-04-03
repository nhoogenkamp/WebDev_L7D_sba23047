<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
?>

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
                <li><a href="index.html">Home</a></li>
                <li><a href="booking.html">Booking</a></li>
                <li><a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                <?php if ($user_type === 'admin') { ?>
                    <li><a href="view_booked_movies.php">Recent Booked Movies</a></li>
                <li><a href="admin_panel.php">Admin Panel</a></li>
                <?php } ?>
                <div class="search">
                    <input type="text" id="searchInput" placeholder="Search for a movie..." onkeyup="searchMovies()">
                </div>
            </ul>
        </nav>
    </header>
    <!--found carousel on bootstrap and amended accordingly-->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/the secrets of dumbledore.jpg" class="d-block w-100" alt="dumbledoreimage">
                <div class="carousel-caption d-none d-md-block">
                    <h2>COMING SOON IN THE CINEMA</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/london has fallen.jpg" class="d-block w-100" alt="londonhasfallenimage">
                <div class="carousel-caption d-none d-md-block">
                    <h2>COMING SOON IN THE CINEMA</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/the flash.jpg" class="d-block w-100" alt="theflashimage">
                <div class="carousel-caption d-none d-md-block">
                    <h2>COMING SOON IN THE CINEMA</h2>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleAutoplaying" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleAutoplaying" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--In this container you can find all my movies, image, movie title and actor names-->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a href="dune.php" data-actors="Timothée Chalamet, Zendaya, Rebecca Ferguson">
                    <img src="images/dunepart1.webp" class="img-fluid" alt="duneimage">
                    <h6 class="text-center">Dune</h6>
                </a>
            </div>
            <div class="col">
                <a href="fightclub.html" data-actors="Brad Pitt, Edward Norton, Meat Loaf">
                    <img src="images/Fight Club.jpg" class="img-fluid" alt="fightclubimage">
                    <h6 class="text-center">Fight Club</h6>
                </a>
            </div>
            <div class="col">
                <a href="forrestgump.html" data-actors="Tom Hanks, Robin Wright, Gary Sinise">
                    <img src="images/Forrest Gump.jpg" class="img-fluid" alt="forrestgumpimage">
                    <h6 class="text-center">Forrest Gump</h6>
                </a>
            </div>
            <div class="col">
                <a href="gladiator.html" data-actors="Russell Crowe, Joaquin Phoenix, Connie Nielsen">
                    <img src="images/Gladiator.jpg" class="img-fluid" alt="gladiatorimage">
                    <h6 class="text-center">Gladiator</h6>
                </a>
            </div>
            <div class="col">
                <a href="goodfellas.html" data-actors="Robert de Niro, Ray Liotta, Joe Pesci">
                    <img src="images/Goodfellas.jpg" class="img-fluid" alt="goodfellasimage">
                    <h6 class="text-center">Goodfellas</h6>
                </a>
            </div>
            <div class="col">
                <a href="harrypotter.html" data-actors="Daniel Radcliffe, Rupert Grint, Emma Watson">
                    <img src="images/harry potter.jpg" class="img-fluid" alt="harrypotterimage">
                    <h6 class="text-center">Harry Potter</h6>
                </a>
            </div>
            <div class="col">
                <a href="inception.html" data-actors="Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page">
                    <img src="images/Inception.jpg" class="img-fluid" alt="inceptionimage">
                    <h6 class="text-center">Inception</h6>
                </a>
            </div>
            <div class="col">
                <a href="interstellar.html" data-actors="Matthew McConaughey, Anne Hathaway, Jessica Chastain">
                    <img src="images/Interstellar.jpg" class="img-fluid" alt="interstellarimage">
                    <h6 class="text-center">Interstellar</h6>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="pulpfiction.html" data-actors="John Travolta, Uma Thurman, Samuel L. Jackson">
                    <img src="images/Pulp Fiction.jpg" class="img-fluid" alt="pulpfictionimage">
                    <h6 class="text-center">Pulp Fiction</h6>
                </a>
            </div>
            <div class="col">
                <a href="savingprivateryan.html" data-actors="Tom Hanks, Matt Damon, Tom Sizemore">
                    <img src="images/Saving Private Ryan.jpg" class="img-fluid" alt="savingprivateryanimage">
                    <h6 class="text-center">Saving private ryan</h6>
                </a>
            </div>
            <div class="col">
                <a href="schindlerslist.html" data-actors="Liam Neeson, Ralph Fiennes, Ben Kingsley">
                    <img src="images/Schindler's List.jpg" class="img-fluid" alt="schindlerslistimage">
                    <h6 class="text-center">schindler's list</h6>
                </a>
            </div>
            <div class="col">
                <a href="se7en.html" data-actors="Morgan Freeman, Brad Pitt, Kevin Spacey">
                    <img src="images/Se7en.jpg" class="img-fluid" alt="se7enimage">
                    <h6 class="text-center">Se7en</h6>
                </a>
            </div>
            <div class="col">
                <a href="thedarkknight.html" data-actors="Christian Bale, Heath Ledger, Aaron Eckhart">
                    <img src="images/The Dark Knight.jpg" class="img-fluid" alt="thedarkknightimage">
                    <h6 class="text-center">The Dark Knight</h6>
                </a>
            </div>
            <div class="col">
                <a href="thedeparted.html" data-actors="Leonardo DiCaprio, Matt Damon, Jack Nicholson">
                    <img src="images/The Departed.jpg" class="img-fluid" alt="thedepartedimage">
                    <h6 class="text-center">The Departed</h6>
                </a>
            </div>
            <div class="col">
                <a href="thegodfather.html" data-actors="Marlon Brando, Al Pacino, James Caan">
                    <img src="images/The Godfather.jpg" class="img-fluid" alt="thegodfatherimage">
                    <h6 class="text-center">The Godfather</h6>
                </a>
            </div>
            <div class="col">
                <a href="thegreenmile.html" data-actors="Tom Hanks, Michael Clarke Duncan, David Morse">
                    <img src="images/The Green Mile.jpg" class="img-fluid" alt="thegreenmileimage">
                    <h6 class="text-center">The Green Mile</h6>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="theintouchables.html" data-actors="François Cluzet, Omar Sy, Anne Le Ny">
                    <img src="images/The Intouchables.jpg" class="img-fluid" alt="theintouchablesimage">
                    <h6 class="text-center">The Intouchables</h6>
                </a>
            </div>
            <div class="col">
                <a href="thelionking.html" data-actors="Donald Glover, Beyoncé, Seth Rogen">
                    <img src="images/The Lion King.jpg" class="img-fluid" alt="thelionkingimage">
                    <h6 class="text-center">The Lion King</h6>
                </a>
            </div>
            <div class="col">
                <a href="thelordoftherings.html" data-actors="Elijah Wood, Viggo Mortensen, Ian McKellen">
                    <img src="images/The Lord of the Rings.jpg" class="img-fluid" alt="thelordoftheringsimage">
                    <h6 class="text-center">The Lord of the Rings</h6>
                </a>
            </div>
            <div class="col">
                <a href="thematrix.html" data-actors="Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss">
                    <img src="images/The Matrix.jpg" class="img-fluid" alt="thematriximage">
                    <h6 class="text-center">The Matrix</h6>
                </a>
            </div>
            <div class="col">
                <a href="theprestige.html" data-actors="Christian Bale, Hugh Jackman, Scarlett Johansson">
                    <img src="images/The Prestige.jpg" class="img-fluid" alt="theprestigeimage">
                    <h6 class="text-center">The Prestige</h6>
                </a>
            </div>
            <div class="col">
                <a href="theshawshankredemption.html" data-actors="Tim Robbins, Morgan Freeman, Bob Gunton">
                    <img src="images/The Shawshank Redemption.jpg" class="img-fluid" alt="theshawshankredemptionimage">
                    <h6 class="text-center">The Shawshank Redemption</h6>
                </a>
            </div>
            <div class="col">
                <a href="thesilenceofthelambs.html" data-actors="Jodie Foster, Anthony Hopkins, Scott Glenn">
                    <img src="images/The Silence of the Lambs.jpg" class="img-fluid" alt="thesilenceofthelambsimage">
                    <h6 class="text-center">The Silence of the Lambs</h6>
                </a>
            </div>
            <div class="col">
                <a href="theusualsuspects.html" data-actors="Kevin Spacey, Gabriel Byrne, Chazz Palminteri">
                    <img src="images/The Usual Suspects.jpg" class="img-fluid" alt="theusualsuspectsimage">
                    <h6 class="text-center">The Usual Suspects</h6>
                </a>
            </div>
        </div>


    </div>
    <!--these script tags are for using external javascipt libraries in my html file like dropdowns, the carousel etc-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!--link to my javascript file-->
    <script src="script.js"></script>
</body>

</html>