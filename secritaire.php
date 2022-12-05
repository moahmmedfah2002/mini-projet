<?php
session_start();
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pres-resrvation</title>
</head>
<body>
    <label for="date_rsrv_s"></label>
    <input type="date" name="date_rsrv_s">
    <br>
    <label for="nom_p"></label>
    <input type="text" name="nom_p">
    <br>
    <label for="prenom_p"></label>
    <input type="text" name="prenom_p">
    <br>
    <label for="date_n"></label>
    <input type="date" name="date_n">
    <br>
    <label for="type_hbrg"></label>
    <input type="text" name="type_hbrg">
    <br>
    <label for="actvt"></label>
    <input type="text" name="actvt">
    <br>
    <label for="package"></label>
    <input type="text" name="package">
    <br>
    <label for="acompte"></label>
    <input type="number" name="acompte">
</body>
</html>