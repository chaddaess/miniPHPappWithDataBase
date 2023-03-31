<?php
session_start();
require 'ConnexionPDO.php';
$cnxPDO=ConnexionPDO::getInstance();
$cin=$_POST['cin'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$age=$_POST['age'];


$requete="INSERT INTO personne(cin,nom,prenom,age) values(:cin,:nom,:prenom,:age)";

$req=$cnxPDO->prepare($requete);
$req->execute(
    array(
        'cin'=>$cin,
        'nom'=>$nom,
        'prenom'=>$prenom,
        'age'=>$age,
    )
)





?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="cssStuff.css"/>

</head>
<body>
<div class="alert alert-success">Personne ajoutée avec succès</div>
<button class="btn btn-primary">
    <a href="AfficherListe.php">voir liste</a>

</button>


</body>
</html>

