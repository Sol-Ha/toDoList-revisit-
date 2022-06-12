<!-- this is where magic happens for your security check works
it will pick the right files where all orders are displayed and
interrogating your database -->
<?php require("actions/signupAction.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<!-- reduce space by picking the corresponding file in "includes" -->
<?php include "includes/head.php"; ?>

<body>

    <!-- reduce space by picking the corresponding file in "includes" -->
    <?php include "includes/header.php"; ?>


    <main class="main_signup">
        <div class="line"></div>
        <form method="POST">
            <h1>Connection</h1>

            <!-- pick the error message from the right action file -->
            <?php if (isset($errorMsg)) {
                echo "<p>" . $errorMsg . "</p>";
            } ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="mail">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="form_btn" name="validate">S'inscrire</button>
        </form>
    </main>

    <footer>
        <h2>Vous possédez déjà un compte? </h2>
        <a href="login.php">Cliquez ici</a>
    </footer>
</body>

</html>