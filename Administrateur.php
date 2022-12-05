<<<<<<< HEAD
<?php
session_start();
$err = "";
try{
    $bdd=new PDO('mysql:host=localhost:5000;dbname=espace_membre;charset=utf8;','root','');
}
catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}

if(isset($_POST['Entrer'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_pardefaut="admin";
        $mdp_pardefaut="admin1234";

        $pseudo_saisie=htmlspecialchars($_POST['pseudo']);
        $mdp_saisie=htmlspecialchars($_POST['mdp']);

        if($pseudo_saisie == $pseudo_pardefaut AND $mdp_saisie==$mdp_pardefaut){
            $_SESSION['mdp']=$mdp_saisie;
            header('Location: index.php');

        }else{
            $err= "mot de passe ou pseudo incorrect";
        }
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
    <title>connexion-admin</title>
</head>
<body>
    <div class="adm-main">
        <p><?= $err; ?></p><br>
      <form method="POST" class="admin" >
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" autocomplete="off"><br>
        <label for="mdp">Password :</label>
        <input type="password" name="mdp" autocomplete="off"><br>
        <input type="submit" name="Entrer" value="Entrer">
      </form>
    </div>
</body>
=======
<?php
session_start();
$err = "";
try{
    $bdd=new PDO('mysql:host=localhost:5000;dbname=espace_membre;charset=utf8;','root','');
}
catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}

if(isset($_POST['Entrer'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_pardefaut="admin";
        $mdp_pardefaut="admin1234";

        $pseudo_saisie=htmlspecialchars($_POST['pseudo']);
        $mdp_saisie=htmlspecialchars($_POST['mdp']);

        if($pseudo_saisie == $pseudo_pardefaut AND $mdp_saisie==$mdp_pardefaut){
            $_SESSION['mdp']=$mdp_saisie;
            header('Location: index.php');

        }else{
            $err= "mot de passe ou pseudo incorrect";
        }
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
    <title>connexion-admin</title>
</head>
<body>
    <div class="adm-main">
        <p><?= $err; ?></p><br>
      <form method="POST" class="admin" >
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" autocomplete="off"><br>
        <label for="mdp">Password :</label>
        <input type="password" name="mdp" autocomplete="off"><br>
        <input type="submit" name="Entrer" value="Entrer">
      </form>
    </div>
</body>
>>>>>>> 5057b6559e3f4e07be0f2ca162803d4e8b47f059
</html>