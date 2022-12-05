<?php
session_start();
$err = "";
$bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
$z=$bdd->prepare('SELECT * FROM emp');
$z->execute();
$z = $z->fetchAll();
$h=$bdd->prepare('SELECT * FROM hotel');
$h->execute();
$h = $h->fetchAll();
if(isset($_POST['Entrer'])){
    if(!empty($_POST['id_emp']) AND !empty($_POST['mdp'])){
       $v=0;
       for($i=0;$i<count($z);$i++){
        
        $pseudo_saisie=htmlspecialchars($_POST['id_emp']);
        $mdp_saisie=htmlspecialchars($_POST['mdp']);

        if($pseudo_saisie ==$z[$i]['id_emp'] AND $mdp_saisie==$z[$i]['pass']){
            $_SESSION['mdp']=$mdp_saisie;
            $v=1;
            header('Location: index.php');
        }
        }if($v==0){
            $err= "mot de passe ou pseudo incorrect";
        }
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['categorie'])AND !empty($_POST['adresse'])AND!empty($_POST['nbr_ch'])AND!empty($_POST['nom_h'])){
        $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
        $vh = 1;
        for ($j = 0; $j < count($h); $j++) {
                if ($h[$j]['nom_h']==$_POST['nom_h']){
                $vh = 0;
                break;
                }


        }
        if ($vh == 1) {
            $insert = $bdd->prepare('INSERT INTO hotel(adress_h,nombre_ch,categorie,nom_h) VALUES(?,?,?,?)');
            $insert->execute(array($_POST['adresse'], $_POST['nbr_ch'], $_POST['categorie'], $_POST['nom_h']));
        }
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>connexion-admin</title>
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
            <h2>Hoteles</h2>
            <?php
            $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
            $recupuser = $bdd->query('SELECT * FROM hotel');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">
           <label>Nom Hotel :</label>
                <p><?= $user['nom_h'];?></p>
                <br>
                <label>Categorie :</label>
                <p><?= $user['categorie'];?></p>
                <br>
                <label>Eddresse : </label>
                <p><?= $user['adress_h'];?></p>
                <br>
                <label>Nombre de chambres : </label>
                <p><?= $user['nombre_ch'];?></p>
                <br>
           <a href="supprimer_hot.php?id=<?= $user['id_h'];?>"><input type="submit" value="Supprimper"  style="color: red;text-decoration: none;"></a>
           </div>
           <?php
          } 
          ?>
          <form method="POST" class="frm">
                <h4>Ajouter un Hotel</h4>
                <label for="nom_h">categorie : </label>
                <input type="text" name="nom_h" style="width: 200px;height: 20px;">
                <br>
                <label for="categorie">categorie : </label>
                <input type="text" name="categorie" style="width: 200px;height: 20px;">
                <br>
                <label for="adresse">Eddresse : </label>
                <input type="text" name="adresse" style="width: 200px;height: 20px;">
                <br>
                <label for="nbr_ch">Nombre de chambres : </label>
                <input type="number" name="nbr_ch" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
        </div>
</div>

              
</body>
</html>