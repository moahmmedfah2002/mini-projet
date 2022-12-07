<?php
session_start();
$bdd=new PDO('mysql:host=localhost:3306;dbname=m;charset=utf8;','root','');
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}

    if(isset($_GET['id']) AND !empty($_GET['id'])){
       
        $getid = $_GET['id'];
        $recupuser = $bdd->prepare('SELECT * FROM bang WHERE num_b= ?');
        $recupuser->execute(array($getid));
        if($recupuser->rowCount() > 0){
    
            
            $banniruser = $bdd->prepare('DELETE FROM bang WHERE num_b= ?');
            $banniruser->execute(array($getid));
    
            header('Location: bungalos.php');
    
        }else{
            echo "Acun membre n'a ete trouve";
        }
    
    }else{
        echo "l'identifiant n'est pas ete recupere";
    }

?>