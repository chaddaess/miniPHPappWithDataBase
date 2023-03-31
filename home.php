<?php
session_start();
$name=$_SESSION['personne'][0]['nom'];
$prenom=$_SESSION['personne'][0]['prenom'];
$login=$prenom.' '.$name;
if(!isset($_SESSION['personne']))
{
    header('location:login.php');
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="cssStuff.css"/>


</head>
<body>
<div class="alert alert-success">
    bienvenue <?=$login?> !
</div>

<?php
if ($_SESSION['personne'][0]['nom']=='admin')
{
    ?>
    <button class="alert alert-primary">
        <a href="MenuAdmin.html">menu</a>
    </button>
<?php
}

else
{

?>
    <button class="alert alert-primary">
        <a href="MenuUtilisateur.html">menu</a>
    </button>

 <?php
}
?>

<button class="alert alert-danger">
    <a href="sedeconnecter.php"> se deconnecter</a>
</button>

</body>
</html>

<?php
}
?>