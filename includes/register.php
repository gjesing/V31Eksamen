<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "connect.php";

    $statement = $dbh->prepare("SELECT * FROM Users WHERE username = ?");
    $statement->bindparam(1, $_POST['username']);
    $statement->execute();

    session_start();

    if (!empty($row = $statement->fetch())) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['password2'] = $_POST['password2'];
        $_SESSION['registerErrorMsg'] = "Dette brugernavn er ikke tilgængeligt. Vælg et andet.";
        header("location: ../register.php");
        
    } elseif ($_POST['password2'] != $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['password2'] = $_POST['password2'];
        $_SESSION['registerErrorMsg'] = "Paswords er ikke ens.";
        header("location: ../register.php");

    } else {
        $statement = $dbh->prepare("INSERT INTO Users (username, password) VALUES (:username, :password)");
        $statement->bindParam(':username', $_POST['username']);
        $statement->bindParam(':password', $_POST['password']);
        $statement->execute();
        $statement = $dbh->prepare("SELECT * FROM Users WHERE username = ?");
        $statement->bindparam(1, $_POST['username']);
        $statement->execute();
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['accessLevel'] = $row['accessLevel'];
        }
        header("location: ../index.php");
    }

    $dbh = null;
} else {
    header("location: ../" . $_SESSION['previousPage']);;
}
