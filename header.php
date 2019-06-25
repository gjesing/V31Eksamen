<?php
session_start();
$_SESSION['currentPage'] = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1);
if (isset($_SERVER['HTTP_REFERER'])){
    if (!isset($_SESSION['previousPage']) || substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != $_SESSION['currentPage']) {
        $_SESSION['previousPage'] = substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1);
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?> | FancyClothes.dk</title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        <!-- Velkomstbesked -->
        <h2><?php echo isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] ? 'Velkommen: ' . $_SESSION['username'] : ''; ?></h2>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <li class="active"><a href="index.php">Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="#">Om os</a></li>
                <?php
                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                    echo "<li><a href='assets/logOut.php'>Log ud</a></li>";
                } else {
                    echo "<li><a href='#' class='loginBtn'>Log ind</a></li>";
                    echo "<li><a href='register.php' class='loginBtn'>Opret bruger</a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="login container">
        <form action="assets/login.php" method="post">
            <label for="username">Bruger:</label>
            <input type="text" name="username" placeholder="Brugernavn" required>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Log ind">
        </form>
        <a id="newUser" href="register.php">Ny bruger?</a>
    </div>
    <hr>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/slide1.jpg" alt=""></li>
            <li><img src="img/slide2.jpg" alt=""></li>
            <li><img src="img/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>