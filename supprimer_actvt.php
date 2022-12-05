<?php
session_start();
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}

    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
        $getid = $_GET['id'];
        $recupuser = $bdd->prepare('SELECT * FROM actvt WHERE id_actvt= ?');
        $recupuser->execute(array($getid));
        if($recupuser->rowCount() > 0){
    
            $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
            $banniruser = $bdd->prepare('DELETE FROM actvt WHERE id_actvt= ?');
            $banniruser->execute(array($getid));
    
            header('Location: Admin_actvt_srvs.php');
    
        }else{
            echo "Acun membre n'a ete trouve";
        }
    
    }else{
        echo "l'identifiant n'est pas ete recupere";
    }

?>