<?php
session_start();
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
?>