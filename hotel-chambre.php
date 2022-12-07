<?php
session_start();
$err = "";
$bdd=new PDO('mysql:host=localhost:3306;dbname=m;charset=utf8;','root','');
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['categorie']) AND !empty($_POST['num-ch'])){
        $insert = $bdd->prepare('INSERT INTO hotel(categorie,numch) VALUES(?,?)');
        $insert->execute(array($_POST['categorie'],$_POST['num-ch']));
        header('Location: hotel-chambre.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>les chambres</title>
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
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2>Hotel & Chambres.</h2>
            <?php
            $bdd=new PDO('mysql:host=localhost:3306;dbname=m;charset=utf8;','root','');
            $recupuser = $bdd->query('SELECT * FROM hotel');
            $rescupch = $bdd->query('SELECT * FROM hotel,chambre WHERE hotel.numch=chambre.numch');
            while($user = $recupuser->fetch()){
           ?>
           <div class="hotel">
           <p>Categorie-Hotel : <?= $user['categorie'];?></p>
           <?php
           while($ch=$rescupch->fetch()){
            ?>
            <p>Categorie-chambre : <?= $ch['type-ch'];?></p>
            <?php
           }
           ?>
           </div>
           <?php
          } 
          ?>
          <br>
          <form method="POST" class="frm">
                <label for="pseudo">Ajouter un categorie : </label>
                <input type="text" name="categorie" style="width: 200px;height: 20px;">
                <br>
                <input type="number" name="num-ch" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
    </div>
</div>
</body>
</html>