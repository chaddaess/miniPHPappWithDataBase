<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Document</title>
             <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>

</head>
<body>
<?php
$login=$_POST['login'];
$prenom=$_POST['prenom'];
$pwd=$_POST['pwd'];
/*make connexion with database*/
require 'ConnexionPDO.php';
$cnxPdo = ConnexionPDO::getInstance();
$requete = "select* from personne";
$reponse = $cnxPdo->query($requete);
$personnes = $reponse->fetchAll(PDO::FETCH_OBJ);
$test = false;
/*see if the input credentials exist in the database of users*/
foreach ($personnes as $personne)
{
    if ($personne->nom == $login && $personne->prenom==$prenom&& $personne->mdp==$pwd)
    {
        $test = true;
        break;
    }
}

if (!$test)
{ /*no matching user with that password and username*/
?>
<div class="alert alert-danger">
    mot de passe ou login erroné
</div>

<?php
}
else
{   /*match found*/
    if (!isset($_SESSION['personne']))
    {
        $_SESSION['personne'] =[];
    }

        $nom = $_POST['login'];
        $prenom = $_POST['prenom'];
        $tab = array(
            'nom' => $nom,
            'prenom' => $prenom,
        );
        array_push($_SESSION['personne'], $tab);
header('location:home.php');
?>
}



</body>
</html>

<?php
}
?>