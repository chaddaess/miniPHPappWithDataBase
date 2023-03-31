<?php
session_start();
//if the current user is non existent or non authorized
if (!isset($_SESSION['personne']))
    header('location:seConnecter.php');
else if ($_SESSION['personne'][0]['nom'] != 'admin')
    header('location:home.php');
else {
    // let's delete someone
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DeletePeople</title>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="cssStuff.css"/>


    </head>
<body>
    <?php
    $cin = $_POST['cin'];
    require 'ConnexionPDO.php';
    $cnxPdo = ConnexionPDO::getInstance();
    $requete = "select* from personne";
    $reponse = $cnxPdo->query($requete);
    $personnes = $reponse->fetchAll(PDO::FETCH_OBJ);
    $test = false;

    if ($cin == 0) {
        ?>
        <div class="alert alert-danger">
            vous ne pouvez pas supprimer le compte admin !
        </div>
        <?php
    } else {
        //we'll delete a non-admin
        foreach ($personnes as $personne) {
            if ($personne->cin == $cin) {
                $test = true;
                break;
            }
        }

        if (!$test) {
            ?>
            <div class="alert alert-danger">
                Pas d'enregistrement avec cette cin!!
            </div>
            <?php
        } else
        {
            // match found
            $requete2 = "DELETE from personne where cin=:cin";
        $req2 = $cnxPdo->prepare($requete2);
        $req2->execute(array(
            'cin' => $cin,
        ));
        ?>
        <div class="alert alert-success">
            Personne supprimée avec succès
        </div>

        <button class="btn btn-primary">
            <a href="AfficherListe.php">voir liste</a>
        </button>


        </body>
        </html>

        <?php
    }
}
}
?>