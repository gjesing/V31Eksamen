<?php
$title = "Forside";
$description = "Velkommen til FancyClothes.dk";
include "header.php";
require "includes/getProductCategories.php";
?>

<?php
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    ?>
    <div class="createArticle container">
        <h3 class="center errorMsg">Opret ny vare:</h3>
        <form action="includes/insertArticle.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="imgUrl">Billede</label>
                <input type="file" id="imgUrl" name="imgUrl" accept="image/*" placeholder="Vælg billede" required>
            </div>
            <div>
                <label for="imgAlt">Alt tekst</label>
                <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
            </div>
            <div>
                <label for="heading">Overskrift</label>
                <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
            </div>
            <div>
                <label for="description">Brødtekst</label>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Brødtekst..." required></textarea>
            </div>
            <div>
                <label for="stars">Antal stjerner</label>
                <select name="stars" id="stars">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="categoryId">Kategori</label>
                <select name="categoryId" id="categoryId" required>
                    <option value="" disabled selected>Vælg kategori</option>
                    <?php
                    foreach ($categories as $key => $value) {
                        echo '<option value="' . $value['categoryId'] . '">' . $value['categoryName'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Opret" name="value">
            </div>
        </form>
    </div>
<?php
}
?>

</div>
<main class="container">
    <aside>
        <div class="categories">
            <div class="catTop">
                <h4>Kategorier:</h4>
            </div>
            <div class="catMain">
                <ul>
                    <?php
                    foreach ($categories as $key => $category) {
                        echo '<li><a href="?categoryId=' . $category['categoryId'] . '">' . $category['categoryName'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="newsletter">
            <div class="newsTop">
                <h4>Tilmeld nyhedsbrev</h4>
            </div>
            <div class="newsMain">
                <form action="">
                    <input type="text" placeholder="Navn">
                    <input type="email" placeholder="Email">
            </div>
            <div class="newsBottom">
                <input type="submit" value="Tilmeld">
                </form>
            </div>
        </div>
    </aside>
    <div class="products">
        <h3>INSPIRATION</h3>
        <hr>
        <div class="inspiration">
            <div class="catMen">
                <img src="img/kategoriHerre.jpg" alt="">
                <h5>Herretøj</h5>
                <div class="action">Lær mere</div>
            </div>
            <div class="catWomen">
                <img src="img/kategoriKvinde.jpg" alt="">
                <h5>Kvindetøj</h5>
                <div class="action">Lær mere</div>
            </div>
        </div>
        <div class="frontProducts">
            <?php require "includes/getProducts.php" ?>
        </div>
    </div>
</main>

<?php include "footer.php"; ?>