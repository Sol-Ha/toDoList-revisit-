<!-- setting the database -->
<!-- open session and if it fails tells you why -->
<?php
try {
    session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=todolist;charset=UTF8;", "root", "");
} catch (Exception $e) {
    die("Une erreur de type:" . $e->getMessage());
}
