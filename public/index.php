<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<link href="../public/assets/css/reset.css" rel="stylesheet">
<link href="../public/assets/css/style.css" rel="stylesheet">

<?php include "templates/header.php"; ?>

<ul>
    <li><a href="create.php">Add a new recipe</a></li>
    <li><a href="read.php">Find a recipe</a></li>
    <li><a href="update.php">Edit a recipe</a></li>
    <li><a href="delete.php">Delete a recipe</a></li>
</ul>

<?php include "templates/footer.php"; ?>
