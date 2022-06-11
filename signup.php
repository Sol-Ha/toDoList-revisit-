<!-- this is where magic happens for your security check works
it will pick the right files where all orders are displayed and
interrogating your database -->
<?php require ("actions/signupAction.php");?>
<!DOCTYPE html>
<html lang="fr">

<!-- reduce space by picking the corresponding file in "includes" -->
<?php include "includes/head.php";?>
<body>

<!-- reduce space by picking the corresponding file in "includes" -->
<?php include "includes/header.php";?>

<!-- pick the error message from the right action file -->
<?php if(isset($errorMsg)) {echo "<p>".$errorMsg."</p>";}?>
</body>
</html>