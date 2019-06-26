<?php
require "connect.php";

$statement = $dbh->prepare("SELECT categoryId, categoryName FROM ProductCategories");
$statement->execute();

$categories = array();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    array_push($categories, array("categoryId" => $row['categoryId'], "categoryName" => $row['categoryName']));
}

$dbh = null;
?>