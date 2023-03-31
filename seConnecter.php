<?php
session_start();
if (isset($_SESSION['personne']))
    header('location:home.php');
else
{
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>seConnecter</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
</head>
<body>
<form CLASS="form-control" action="Login.php" method="post">
    <label>
        nom
    </label>
    <input type="text" name="login">

    <label>
        prenom
    </label>
    <input type="text" name="prenom">
    <label>
        password
    </label>
    <input type="password" name="pwd">
    <br>
    <br>

    <button type="submit" class="btn btn-primary">
        se connecter
    </button>
</form>

<?php
}
?>
