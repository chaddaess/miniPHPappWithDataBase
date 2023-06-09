<?php

session_start();
if(!isset($_SESSION['personne'] )|| $_SESSION['personne'][0]['nom']!='admin')
    header('location:seConnecter.php');

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
        <title>ModifyPeople</title>
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

    if($cin==0)
    {
        ?>
        <div class="alert alert-danger">désolé! vous ne pouvez pas modifier le compte admin</div>
        <?php
    }
    else
    {
        foreach ($personnes as $personne)
        {
            if ($personne->cin == $cin)
            {
                $test = true;
                break;
            }
        }

        if (!$test)
        {
        ?>
            <div class="alert alert-danger">
                Pas d'enregistrement avec cette cin!!
            </div>

        <?php
        }
        else
        {
            $cinNouv =$_POST["NEWcin"];
            $nomNouv =$_POST["NEWnom"];
            $prenomNouv =$_POST["NEWprenom"];
            $ageNouv =$_POST["NEWage"];
            $mdpNouv=$_POST["NEWmdp"];
            $mdpConf=$_POST["mdpConf"];

            if($mdpConf==$mdpNouv)
            {
                $requete2="UPDATE personne set cin=:newcin,nom=:nom,prenom=:prenom,age=:age,mdp=:mdp where cin=:cin ";
                $req2=$cnxPdo->prepare($requete2);
                $response2=$req2->execute(array(
                    'newcin'=>$cinNouv,
                    'nom'=>$nomNouv,
                    'prenom'=>$prenomNouv,
                    'age'=>$ageNouv,
                    'cin'=>$cin,
                    'mdp'=>$mdpNouv,

                ));
                ?>
                <div class="alert alert-success">
                Personne modifiée avec succès
                </div>

                <button class="btn btn-primary">
                    <a href="AfficherListe.php">voir liste</a>
                </button>
          <?php
           }
            else
                {
                    ?>
                    <div class="alert alert-danger">
                        mots de passes non identiques!
                    </div>
                <?php
                }

            ?>


        <?php
        }

    }
    ?>




    </body>
    </html>

<?php
}
?>
