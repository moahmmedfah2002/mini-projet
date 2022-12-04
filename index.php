<?php
session_start();
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
    <title>Home</title>
</head>
<body>
    <div class="index">
        <div class="parametres">
            <h1>Paramétres de site web</h1>
            <br>
            <a href="membres.php">Liste des membres .</a>
            <br>
            <a href="Description.php">Description de site web.</a>
            <br>
            <a href="hotel-chambre.php">Hoteles et Chambres .</a>
            <br>
            <a href="logout.php"><input type="submit" value="Deconnexion" class="subm1"></a>
        </div>
    </div>
</body>
</html>