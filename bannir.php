<?php
session_start();
$bdd=new PDO('mysql:host=localhost:3306;dbname=espace_admine;charset=utf8;','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupuser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $recupuser->execute(array($getid));
    if($recupuser->rowCount() > 0){

        $banniruser = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $banniruser->execute(array($getid));

        header('Location: membres.php');

    }else{
        echo "Acun membre n'a ete trouve";
    }

}else{
    echo "l'identifiant n'est pas ete recupere";
}
?>