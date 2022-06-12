<?php
// 1 call the database
require("database.php");

// if (isset= boolean) this exist "validate" and if those input bla bla aren't empty 
if (isset($_POST["validate"])) {
    if (!empty($_POST["pseudo"]) && !empty($_POST["password"])) {

        // making variable to simplify;
        $user_pseudo = htmlspecialchars($_POST["pseudo"]);
        $user_pw = htmlspecialchars($_POST["password"]);

        // does the user exist in your database?
        $doesMyUserExist = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
        $doesMyUserExist->execute(array($user_pseudo));
        if ($doesMyUserExist->rowCount() > 0) {

            // go pick up info if you find them
            $userRecorded = $doesMyUserExist->fetch();

            if (password_verify($user_pw, $userRecorded["mdp"])) {
                // "auth" is in "securityAction"
                $_SESSION["auth"] = true;
                $_SESSION["id"] = $userRecorded["id"];
                $_SESSION["lastname"] = $userRecorded["nom"];
                $_SESSION["firstname"] = $userRecorded["prenom"];
                $_SESSION["mail"] = $userRecorded["email"];
                $_SESSION["pseudo"] = $userRecorded["pseudo"];

                // once you are authentified you will be sent to
                header("location: toDoList_interface.php");
            } else {
                $errorMsg = "Le mot de passe ne correspond pas à celui de l'utilisateur";
            }
        } else {
            $errorMsg = "Cet utilisateur n'existe pas";
        }
    } else {
        $errorMsg = "Veuillez compléter les champs...";
    }
}
