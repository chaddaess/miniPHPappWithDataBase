<?php
session_start();
if(isset($_SESSION['personne'])) {
    unset($_SESSION['personne']);
    echo 'redirecting...';
}

header('location:seConnecter.php');

