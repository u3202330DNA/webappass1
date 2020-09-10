<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php include "templates/header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="../public/assets/css/reset.css" rel="stylesheet">
    <link href="../public/assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="page-header">
        <h1>Welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

    <ul>
        <li><a href="create.php">Add a new recipe</a></li>
        <li><a href="read.php">Find a recipe</a></li>
        <li><a href="update.php">Edit a recipe</a></li>
        <li><a href="delete.php">Delete a recipe</a></li>
    </ul>

</body>

<?php include "templates/footer.php"; ?>

</html>
