<?php
session_start();
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}

if(isset($_POST['Ajouter'])){
    if(!empty($_POST['categorie'])AND !empty($_POST['adresse'])AND!empty($_POST['nbr_ch'])AND!empty($_POST['numch'])){
        $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
        $insert = $bdd->prepare('INSERT INTO hotel(adress_h,nombre_ch,categorie,numch) VALUES(?,?,?,?)');
        $insert->execute(array($_POST['adresse'],$_POST['nbr_ch'],$_POST['categorie'],$_POST['numch']));
        header('Location: hotel.php');
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
    <title>Hoteles</title>
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
            <a href="hotel.php">Hoteles .</a>
            <br>
            <a href="bungalos.php">BUngalos .</a>
            <br>
            <a href="logout.php"><input type="submit" value="Deconnexion" class="subm1"></a>
        </div>
        <div class="desc">
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2>Hoteles</h2>
            <?php
            $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
            $recupuser = $bdd->query('SELECT * FROM hotel');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">
                <label>Categorie :</label>
                <p><?= $user['categorie'];?></p>
                <br>
                <label>Eddresse : </label>
                <p><?= $user['adress_h'];?></p>
                <br>
                <label>Nombre de chambres : </label>
                <p><?= $user['nombre_ch'];?></p>
                <br>
                <label>N° chambre : </label>
                <p><?= $user['numch'];?></p>
           <a href="supprimer_hot.php?id=<?= $user['id_h'];?>"><input type="submit" value="Supprimper"  style="color: red;text-decoration: none;"></a>
           </div>
           <?php
          } 
          ?>
          <form method="POST" class="frm">
                <h4>Ajouter un Hotel</h4>
                <label for="categorie">categorie : </label>
                <input type="text" name="categorie" style="width: 200px;height: 20px;">
                <br>
                <label for="adresse">Eddresse : </label>
                <input type="text" name="adresse" style="width: 200px;height: 20px;">
                <br>
                <label for="nbr_ch">Nombre de chambres : </label>
                <input type="number" name="nbr_ch" style="width: 200px;height: 20px;">
                <br>
                <label for="numch">N° chambre : </label>
                <input type="number" name="numch" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
        </div>
</div>
    
</body>
</html>