<?php
$host = "localhost";
$dbname = "V31Eksamen";
$user = "root";
$pass = "";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname; charset=utf8", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo "Fejl: " . $ex;
}
?>