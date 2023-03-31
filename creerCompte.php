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
    <title>creer compte</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="cssStuff.css"/>
</head>
<body>

<div class="alert alert-primary"> insérer vos données</div>
<form class="form-control" action="CreateAccount.php" method="post">
    <table>
        <tr>
            <td> <label>Cin</label></td>
            <td><input type="text" name="cin"></td>

        </tr>
        <tr>
            <td><label>Nom</label></td>
            <td> <input type="text" name="nom"></td>

        </tr>
        <tr>
            <td><label>Prénom</label></td>
            <td> <input type="text" name="prenom"></td>

        </tr>
        <tr>
            <td><label>age</label></td>
            <td><input type="text" name="age"></td>

        </tr>


        <tr>
            <td> <label>mot De Passe</label></td>
            <td><input type="password" name="pwd"></td>

        </tr>


        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Submit</button></td>

        </tr>
    </table>


    <div class="alert alert-success">
        vous avez déjà un compte?
        <br>
        <button class="btn btn-primary">
            <a href="seConnecter.php">
                se connecter
            </a>
        </button>
    </div>
</body>
</html>
<?php
}
?>