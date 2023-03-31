<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AjouterPersonne</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
</head>
<body>
<div class="alert alert-primary"> insérer la cin de la personne à supprimer</div>
<form class="form-control" action="DeletePeople.php" method="post">
    <label>Cin à supprimer</label>
    <input TYPE="text" name="cin">
    <button class="btn btn-danger" type="submit">
        supprimer
    </button>
</form>
