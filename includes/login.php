<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "connect.php";
    
    $statement = $dbh->prepare("SELECT * FROM Users WHERE username = :username");
    $statement->bindparam(':username', $_POST['username']);
    $statement->execute();
    
    
    if (empty($row = $statement->fetch()) || !password_verify($_POST['password'], $row['password'])) {
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