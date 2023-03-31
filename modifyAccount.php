<?php
session_start();
if (!isset($_SESSION['personne']))
    header('location:seConnecter.php');



else
{   ?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>modCompte</title>
            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="cssStuff.css"/>


        </head>
        <body>
        <?php
        $p=$_SESSION['personne'][0];//personne actuellement connectée
        $mdp=$_POST['mdp'];
        //connexion avec la base de données
        require 'ConnexionPDO.php';
        $cnxPdo = ConnexionPDO::getInstance();
        $requete = "select* from personne";
        $reponse = $cnxPdo->query($requete);
        $personnes = $reponse->fetchAll(PDO::FETCH_OBJ);
        $test = false;

        //trouvons l'utilisateur  actuellement connecté dans notre bd
        foreach ($personnes as $personne)
        {
        if($personne->nom=$p['nom'] && $personne->prenom=$p['prenom'])
        {
        $test=true;
        $realMdp=$personne->mdp;
        break;
        }
        }

        if($realMdp!=$mdp)
        {
            ?>
            <div class="alert alert-danger">
                mot de passe (ancien) erroné!
            </div>
            <?php
        }

        else
        {       //mdp utilisateur correct, on récupère les modifications
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
                    'cin'=>$cinNouv,
                    'mdp'=>$mdpNouv,

                ));
                ?>
                <div class="alert alert-success">
                    Vos données ont été modifié avec succès
                </div>

                <button class="btn btn-primary">
                    <a href="AfficherListe.php">voir liste</a>
                </button>
                <?php
                }
                else
                {   //les deux mot de passes ne corrospondent pas
                ?>
                <div class="alert alert-danger">
                    mots de passes non identiques!
                </div>
                <?php
                }


        }
        ?>

        </body>
        </html>

<?php
}
?>





