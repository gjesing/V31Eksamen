<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "connect.php";
    
    $statement = $dbh->prepare("SELECT * FROM Users WHERE username = ? AND password = ?");
    $statement->bindparam(1, $_POST['username']);
    $statement->bindparam(2, $_POST['password']);
    $statement->execute();
    
    
    if (empty($row = $statement->fetch())) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['errorMsg'] = "Forkert brugernavn eller adgangskode";
        header("location: ../" . $_SESSION['currentPage']);
    } else {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userId'] = $row['userId'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['accessLevel'] = $row['accessLevel'];
        header("location: ../" . $_SESSION['currentPage']);
    }
    $dbh = null;
} else {
    header("location: ../" . $_SESSION['currentPage']);
}
?>