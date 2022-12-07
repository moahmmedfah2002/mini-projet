<?php
session_start();
$bdd=new PDO('mysql:host=localhost:3306;dbname=m;charset=utf8;','root','');
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['type']) AND !empty($_POST['prix']) AND !empty($_POST['equip'])){
        
        $insert = $bdd->prepare('INSERT INTO bang(type,prix,equipement) VALUES(?,?,?)');
        $insert->execute(array($_POST['type'],$_POST['prix'],$_POST['equip']));
        header('Location: bungalos-infra.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}

if(isset($_POST['modefier'])){
    if(!empty($_POST['type']) AND !empty($_POST['prix']) AND !empty($_POST['equip'])AND !empty($_POST['num_b'])){
        
        $insert = $bdd->prepare('UPDATE bang SET type=?,prix=?,equipement=? WHERE num_b=?');
        $insert->execute(array($_POST['type'],$_POST['prix'],$_POST['equip'],$_POST['num_b']));
        header('Location: bungalos-infra.php');
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
            <a href="admin_infra_strctr.php">Hoteles .</a>
            <br>
            <a href="bungalos-infra.php">BUngalos .</a>
            <br>
            <a href="logout.php"><input type="submit" value="Deconnexion" class="subm1"></a>
        </div>
        <div class="desc">
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2>Bangalos</h2>
            <?php
            
            $recupuser = $bdd->query('SELECT * FROM bang');
            $i=0;
        while($user = $recupuser->fetch()){
            $i++;
        ?>
           <div class="Description">
           <label for="">num-bungalo :</label>
                <p><?= $user['num_b'];?></p>
                </br>
                <label for="">Type :</label>
                <p><?= $user['type'];?></p>
                <br>
                <label for="prix">Prix : </label>
                <p><?= $user['prix'];?></p>
                <br>
                <label for="equip">Equipement : </label>
                <p><?= $user['equipement'];?></p>
                <br>
                <label for="num_b">N°: </label>
                <p><?= $user['num_b'];?></p>
                <br>
                <button onclick="b()"><input type="submit" value="modifie"  style="color: #AAAAAA;text-decoration: none;"></button>
           
           <script>
               function b(){
                   var a=document.getElementById("f");
                   a.style.display="block";
               }

           </script>
           <form method="POST" id="f<?=$i;?>"  >
                <h4>Ajouter un Bungalos</h4>
                
                <input type="text" name="num_b" value=<?= $user["num_b"]?> style="display:none">
                
                <label for="pseudo">Type : </label>
                <input type="text" name="type" style="width: 200px;height: 20px;">
                <br>
                <label for="prix">Prix : </label>
                <input type="number" name="prix" style="width: 200px;height: 20px;">
                <br>
                <label for="equip">Equipements : </label>
                <input type="text" name="equip" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="modefier" class="subm" name="modefier">
            </form>
           </div>
           
           
           <?php
          } 
          ?>
        
          <form method="POST" class="frm">
                <h4>Ajouter un Bungalos</h4>
                
                <label for="pseudo">Type : </label>
                <input type="text" name="type" style="width: 200px;height: 20px;">
                <br>
                <label for="prix">Prix : </label>
                <input type="number" name="prix" style="width: 200px;height: 20px;">
                <br>
                <label for="equip">Equipements : </label>
                <input type="text" name="equip" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
        </div>
</div>
</body>
</html>