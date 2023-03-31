<?php
session_start();
if(!isset($_SESSION['personne'] ))
    header('location:seConnecter.php');
else if ( $_SESSION['personne'][0]['nom']!='admin')
    header('location:home.php');

else
{
    require 'ConnexionPDO.php';
    $cnxPDO=ConnexionPDO::getInstance();
    $requete="Select* from personne ";
    $response=$cnxPDO->prepare($requete);
    $response->execute();
    $personnes=$response->fetchAll(PDO::FETCH_OBJ);


    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>afficherListe</title>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    </head>
    <body>

    <table class="table table-striped">

        <thead class="thead-dark">
        <tr>
            <th scope="col">cin</th>
            <th scope="col">Nom</th>
            <th scope="col">Préom</th>
            <th scope="col">age</th>
            <th scope="col">password</th>


        </tr>

        </thead>
    <tbody>
        <?php
        foreach ($personnes as $personne)
            { ?>

                <tr>
                    <td><?=$personne->cin?></td>
                    <td><?=$personne->nom?></td>
                    <td><?=$personne->prenom?></td>
                    <td><?=$personne->age?></td>
                    <td><?=$personne->mdp?></td>


                </tr>

        <?php
            }
        ?>




    </tbody>
    </table>

    </body>
    </html>
<?php
}
?>