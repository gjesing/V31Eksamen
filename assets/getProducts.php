<?php
require "connect.php";

$statement = $dbh->prepare("SELECT products.productId, products.heading, products.imgUrl, products.imgAlt, products.creationTime, products.description, products.userId, users.username, products.stars, productCategories.categoryName FROM products JOIN Users ON Products.userId=Users.userId JOIN ProductCategories ON Products.categoryId=ProductCategories.categoryId ORDER BY products.creationTime DESC");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <article>
        <img src="img/<?php echo $row['imgUrl']; ?>" alt="<?php echo $row['imgAlt']; ?>">
        <div class="info">
            <h3><?php echo $row['heading']; ?></h3>
            <div class="stars">
                <i <?php echo $row['stars'] >= 1 ? 'class="fa fa-star"' : 'class="fa fa-star-o"'; ?> aria-hidden='true'></i>
                <i <?php echo $row['stars'] >= 2 ? 'class="fa fa-star"' : 'class="fa fa-star-o"'; ?> aria-hidden='true'></i>
                <i <?php echo $row['stars'] >= 3 ? 'class="fa fa-star"' : 'class="fa fa-star-o"'; ?> aria-hidden='true'></i>
                <i <?php echo $row['stars'] >= 4 ? 'class="fa fa-star"' : 'class="fa fa-star-o"'; ?> aria-hidden='true'></i>
                <i <?php echo $row['stars'] >= 5 ? 'class="fa fa-star"' : 'class="fa fa-star-o"'; ?> aria-hidden='true'></i>
            </div>
        </div>
        <div class="description">
            <div class="published">
                Oprettet: <?php echo date('d-m-Y', strtotime($row['creationTime'])) . " af " . $row['username']; ?>
            </div>
            <p><?php echo $row['description']; ?>
                <a href="#">Læs mere...</a></p>
            <!-- Mulighed for sletning herunder -->
        </div>
    </article>
<?php
}

$dbh = null;
?>