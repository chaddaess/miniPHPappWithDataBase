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
    <title>CreataAccount</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="cssStuff.css"/>
</head>
<body>

<?php

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$cin=$_POST['cin'];
$age=$_POST['age'];
$pwd=$_POST['pwd'];


if($nom=='admin' || $prenom=='admin')
{?>
    <div class="alert alert-danger">
        compte 'admin' reservé , veuillez choisir un autre nom
    </div>

    <?php
}

require 'ConnexionPDO.php';
$cnxPDO=ConnexionPDO::getInstance();
$requete="select* from personne";
$reponse=$cnxPDO->query($requete);
$personnes=$reponse->fetchAll(PDO::FETCH_OBJ);
$test=false;

foreach ($personnes as $personne)
{
    if($personne->cin==$cin )
    {   $test=true;
        break;
    }
}

if($test)
{
    ?>
    <div class="alert alert-danger">
        une personne avec cette cin est déjà inscrite !
    </div>
    <button class="btn btn-primary">
        <a href="seConnecter.php">
            se connecter?
        </a>
    </button>
    <?php
}

else
{
    $requete2="INSERT INTO personne(cin,nom,prenom,age,mdp) values(:cin,:nom,:prenom,:age,:pwd)";
    $req2=$cnxPDO->prepare($requete2);
    $req2->execute(
        array(
            'cin'=>$cin,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'age'=>$age,
            'pwd'=>$pwd,
        )
    );?>


<div class="alert alert-success">
Compte crée avec succès
</div>

<button class="btn btn-primary">
    <a href="seConnecter.php">
    se connecter?
    </a>
</button>
    <?php
}

?>



</body>
</html>

<?php
}
?>