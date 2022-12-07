<?php
session_start();
$bienveneu ="Bienveneu sur votre compte!"; 
$bdd=new PDO('mysql:host=localhost:3306;dbname=espace_membre;charset=utf8;','root','');
$getnom ="";
$getprenom = "";
$get_email= "";
$get_tel ="";

if(isset($_POST['valider'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['tel'])){
        $getnom = $_POST['nom'];
        $getprenom = $_POST['prenom'];
        $get_email= $_POST['email'];
        $get_tel = $_POST['tel'];

    }else{
        $err='<p style="color: blue;margin-left: 7%;margin-top: 1rem;margin-bottom: -0.6rem;">'."veuillez remplire toutes les champs...".'</p>';
    }
}
if(isset($_POST['deco'])){
    $_SESSION = array();
    session_destroy();
    header('Location: inscription.php');
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
    <title>utilisateur</title>
</head>
<body>
    <div class="main1">
        <div class="navbar">
        <div class="esp">
         <h4 style="padding-top: ;color: orange;padding-left: ;"><?= $bienveneu; ?></h4>
         <div class="logoo">
            <div class="prof">
                <input type="file"  class="image">
                <div class="nn">
                    <h1>Youssef Ouhba</h1>
                </div>
                
            </div>
         </div>
            
        <form  method="POST">
       <div class="content1">
        <legend>Informations Personnelles</legend><br/>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" onclick="desable" value="<?= $getnom; ?>">
        <label for="prenom">Prenom :</label>
        <input type="text" value="<?= $getprenom; ?>" name="prenom">
        <label for="email">Email :</label>
        <input type="email" value="<?= $get_tel; ?>" name="email" id="">
        <label for="tel">Tel :</label>
        <input type="tel" value="<?= $get_email; ?>" name="tel" id=""><br>
        <button type="submit"  name="valider" >Valider</button>
    </div>

    </form>
    <div class="info_perso">
                <form method="POST">
                <button Type="" name="modify" classe="modefie" class="deco">Modefie</button>
                <button type="submit" name="deco" class="deco">Deconnecter</button>
             
         </form> 
            </div>
                    
            
            
         </div>
         

       </div>
            <div class="ic">
                <h2 class="lo"></h2>
            </div>
            <div class="search">
                <input class="srch" type="search" name="" id="" placeholder="Type to text">
                <a href="#"><button class="btn">Search</button></a>
            </div>
            

        </div>
    
</body>
</html>