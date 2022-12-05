<?php
session_start();
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['type_actvt'])){
        $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
        $insert = $bdd->prepare('INSERT INTO actvt(type_actvt) VALUES(?)');
        $insert->execute(array($_POST['type_actvt']));
        header('Location: Admin_actvt_srvs.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['type_serv'])AND !empty($_POST['tarif'])){
        $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
        $insert = $bdd->prepare('INSERT INTO service(type_serv,tarif) VALUES(?,?)');
        $insert->execute(array($_POST['type_serv'],$_POST['tarif']));
        header('Location: Admin_actvt_srvs.php');
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
    <title>Bungalos</title>
</head>
<body>
<div class="index">
        <div class="parametres">
            <h1>Paramétres de site web</h1>
            <br>
            <a href="Admin_actvt_srvs.php">Activite & Services .</a>
            <br>
            <a href="logout.php"><input type="submit" value="Deconnexion" class="subm1"></a>
        </div>
        <div class="desc">
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2>Activité</h2>
            <?php
            $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
            $recupuser = $bdd->query('SELECT * FROM actvt');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">
                <label for="">Type :</label>
                <p><?= $user['type_actvt'];?></p>
                <br>
           <a href="supprimer_actvt.php?id=<?= $user['id_actvt'];?>"><input type="submit" value="Supprimper"  style="color: red;text-decoration: none;"></a>
           <a href="modifierer_actvt.php?id=<?= $user['id_actvt'];?>"><input type="submit" value="Modifier"  style="color: red;text-decoration: none;"></a>
           </div>
           <?php
          } 
          ?>
          <h2>Service</h2>
            <?php
            $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
            $recupuser = $bdd->query('SELECT * FROM service');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">
                <label >Type :</label>
                <p><?= $user['type_serv'];?></p>
                <br>
                <label for="tarif">Tarif: </label>
                <p><?= $user['tarif'];?></p>
                <br>
           <a href="supprimer_srvs.php?id=<?= $user['id_serv'];?>"><input type="submit" value="Supprimper"  style="color: red;text-decoration: none;"></a>
           </div>
           <?php
          } 
          ?>
        
          <form method="POST" class="frm">
                <h4>Crée une Activité</h4>
                <label for="type_actvt">Type : </label>
                <input type="text" name="type_actvt" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
            <form method="POST" class="frm">
                <h4>Crée une Service</h4>
                <label for="type_serv">Type : </label>
                <input type="text" name="type_serv" style="width: 200px;height: 20px;">
                <br>
                <label for="tarif">Tarif: </label>
                <input type="number" name="tarif" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
        </div>
</div>
</body>
</html>