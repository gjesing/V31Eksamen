<?php
$title = "Opret bruger";
$description = "Opret bruger på FancyClothes.dk";
include "header.php";
?>

<form action="includes/register.php" method="post" class="register">
    <div>
        <label for="username">Indtast brugernavn</label>
        <input type="text" name="username" <?php echo isset($_SESSION['username']) ? 'value="' . $_SESSION['username'] . '"' : 'autofocus'; ?> placeholder="Indtast brugernavn" required>
    </div>
    <div>
        <label for="password">Indtast password</label>
        <input type="password" name="password" <?php echo isset($_SESSION['password']) ? 'value="' . $_SESSION['password'] . '"' : ''; ?> placeholder="Indtast password" required>
    </div>
    <div>
        <label for="password2">Indtast password igen</label>
        <input type="password" name="password2" <?php echo isset($_SESSION['password2']) ? 'value="' . $_SESSION['password2'] . '"' : ''; ?> placeholder="Indtast password igen" required>
    </div>
    <?php echo isset($_SESSION['registerErrorMsg']) ? '<p class="error">' . $_SESSION['registerErrorMsg'] . '</p>' : ''; ?>
    <input type="submit" value="Ok">
</form>

<?php
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['password2']);
unset($_SESSION['registerErrorMsg']);

include "footer.php";
?>