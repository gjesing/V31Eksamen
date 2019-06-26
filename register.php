<?php
$title = "Opret bruger";
$description = "Opret bruger på FancyClothes.dk";
include "header.php";
?>

<form action="includes/register.php" method="post" class="register">
    <div>
        <label for="username">Indtast brugernavn</label>
        <input type="text" name="username" placeholder="Indtast brugernavn" required>
    </div>
    <div>
        <label for="password">Indtast password</label>
        <input type="text" name="password" placeholder="Indtast password" required>
    </div>
    <div>
        <label for="password2">Indtast password igen</label>
        <input type="text" name="password2" placeholder="Indtast password igen" required>
    </div>
    <input type="submit" value="Ok">
</form>

<?php include "footer.php"; ?>