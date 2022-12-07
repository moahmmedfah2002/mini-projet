<?php
session_start();
$bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}

    if(isset($_GET['id']) AND !empty($_GET['id'])){
        
        $getid = $_GET['id'];
        $recupuser = $bdd->prepare('SELECT * FROM service WHERE id_serv= ?');
        $recupuser->execute(array($getid));
        if($recupuser->rowCount() > 0){
    
            
            $banniruser = $bdd->prepare('DELETE FROM service WHERE id_serv= ?');
            $banniruser->execute(array($getid));
    
            header('Location: Admin_actvt_srvs.php');
    
        }else{
            echo "Acun membre n'a ete trouve";
        }
    
    }else{
        echo "l'identifiant n'est pas ete recupere";
    }

?>