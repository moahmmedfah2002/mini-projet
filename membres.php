<?php
session_start();
$bdd=new PDO('mysql:host=localhost:5000;dbname=espace_admine;charset=utf8;','root','');
$err = "";

if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['pseudo'])){
        $insert = $bdd->prepare('INSERT INTO membres(pseudo) VALUES(?)');
        $insert->execute(array($_POST['pseudo']));
        header('Location: membres.php');
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
    <title>Affichez tout les membres</title>
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
            <h2>Membres</h2>
            <?php
            $recupuser = $bdd->query('SELECT * FROM membres');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">
           <p><?= $user['pseudo'];?><a href="bannir.php?id=<?= $user['id'];?>"style="color: red;text-decoration: none;"></style> bannir le membre</a></p>
           </div>
           <?php
          } 
          ?>
          <br>
          <form method="POST" class="frm">
                <label for="pseudo">Ajouter un membre : </label>
                <input type="text" name="pseudo" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
        </div>
</div>
</body>
</html>