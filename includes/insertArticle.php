<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
    require "connect.php";
    move_uploaded_file($_FILES['imgUrl']['tmp_name'], '../img/' . basename($_FILES['imgUrl']['name']));
    try {
        $statement = $dbh->prepare("INSERT INTO Products (heading, imgUrl, imgAlt, description, userId, stars, categoryId) VALUES (:heading, :imgUrl, :imgAlt, :description, :userId, :stars, :categoryId)");
        $statement->bindParam(':heading', $_POST['heading']);
        $statement->bindParam(':imgUrl', $_FILES['imgUrl']['name']);
        $statement->bindParam(':imgAlt', $_POST['imgAlt']);
        $statement->bindParam(':description', $_POST['description']);
        $statement->bindParam(':userId', $_SESSION['userId']);
        $statement->bindParam(':stars', $_POST['stars']);
        $statement->bindParam(':categoryId', $_POST['categoryId']);
        $statement->execute();
        header("location: ../index.php");
    } catch (PDOException $e) {
        echo "Fejl: $e";
    }
    
    $dbh = null;
}
else {
    header("location: ../" . $_SESSION['previousPage']);
}
?>