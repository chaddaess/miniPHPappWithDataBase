<?php
session_start();
if(!isset($_SESSION['personne'] ))
    header('location:seConnecter.php');
else
{?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier mes données</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
</head>
<body>



<form class="form-control" action="modifyAccount.php" method="post">

    <div class="alert alert-primary"> insérer les nouvelles données de votre compte</div>
    <table>
        <tr>
            <td> <label>Cin</label></td>
            <td><input type="text" name="NEWcin"></td>

        </tr>
        <tr>
            <td><label>Nom</label></td>
            <td> <input type="text" name="NEWnom"></td>

        </tr>
        <tr>
            <td><label>Prénom</label></td>
            <td> <input type="text" name="NEWprenom"></td>

        </tr>
        <tr>
            <td><label>age</label></td>
            <td><input type="text" name="NEWage"></td>

        </tr>


        <tr>
            <td><label>ancien mot de passe</label></td>
            <td><input type="password" name="mdp"></td>

        </tr>

        <tr>
            <td><label>nouveau mot de passe</label></td>
            <td><input type="password" name="NEWmdp"></td>

        </tr>

        <tr>
            <td><label>retaper le mot de passe</label></td>
            <td><input type="password" name="mdpConf"></td>

        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">modifier</button></td>

        </tr>
    </table>

</form>
</body>
</html>


<?php
}?>