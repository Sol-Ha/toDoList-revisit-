<?php
// 1 call the database
require("database.php");

// if (isset= boolean) this exist "validate" and if those input bla bla aren't empty 
if (isset($_POST["validate"])) {
    if (!empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["mail"]) && !empty($_POST["pseudo"]) && !empty($_POST["password"])) {

        // making variable to simplify
        $user_lastname = htmlspecialchars($_POST["lastname"]);
        $user_firstname = htmlspecialchars($_POST["firstname"]);
        $user_mail = htmlspecialchars($_POST["mail"]);
        $user_pseudo = htmlspecialchars($_POST["pseudo"]);
        $user_pw = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // does the user exist in your database?
        $doesMyUserExist = $bdd->prepare("SELECT pseudo FROM users WHERE pseudo = ?");
        $doesMyUserExist->execute(array($user_pseudo));
        if ($doesMyUserExist->rowCount() == 0) {

            // if everything is ok! then we can proceed to print them in our database!
            $newUser = $bdd->prepare("INSERT INTO users(nom, prenom, email, pseudo, mdp)VALUES(?, ?, ?, ?, ?)");
            $newUser->execute(array($user_lastname, $user_firstname, $user_mail, $user_pseudo, $user_pw));

            // making sure our users are printed
            $infoUser = $bdd->prepare("SELECT id, nom, prenom, email, pseudo FROM users WHERE nom = ? AND prenom = ? AND email = ? AND pseudo = ?");
            $infoUser->execute(array($user_lastname, $user_firstname, $user_mail, $user_pseudo));

            // STORE INFO COLLECTED
            $userRecorded = $infoUser->fetch();

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
            $errorMsg = "L'utilisateur existe déjà...";
        }
    } else {
        $errorMsg = "Veuillez compléter les champs...";
    }
}
