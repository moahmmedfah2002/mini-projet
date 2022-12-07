<?php
session_start();
$bdd=new PDO('mysql:host=localhost:3306;dbname=espace_admine;charset=utf8;','root','');
?>

<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <title>Description</title>
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
        <div class="desc">
            <h2>Description</h2>
        <?php
        $recupartcl = $bdd->query('SELECT * FROM Description');
        while($artcl=$recupartcl->fetch()){
        ?>
        <div class="Description" >        
            <p><?= $artcl['conteneu_d'] ?></p>        
        </div>
        <a href="modifie_d.php ?id=<?= $artcl['id'];?>">
            <button class="subm">Modefier</button>
        </a>
        <?php
        }
        ?>

        </div>
    </div>
    
    
</body>
</html>