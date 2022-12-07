<?php
session_start();



$err = "";
$bdd=new PDO('mysql:host=localhost:3306;dbname=m;charset=utf8;','root','');
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

if(isset($_POST['modefier'])){
    if( !empty($_POST['adress_h']) AND !empty($_POST['nombre_ch']) AND !empty($_POST['categorie']) AND !empty($_POST['nom_h'])AND !empty($_POST['id_h'])){
        
        $insert = $bdd->prepare('UPDATE hotel SET adress_h=? ,nombre_ch=? , categorie=?, nom_h=? WHERE id_h=?');
        $insert->execute(array($_POST['adress_h'],$_POST['nombre_ch'],$_POST['categorie'],$_POST['nom_h'],$_POST['id_h']));
        header('Location: hotel_directeur.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}




if(isset($_POST['Ajouter'])){
    if(!empty($_POST['categorie'])AND !empty($_POST['adresse'])AND!empty($_POST['nbr_ch'])AND!empty($_POST['nom_h'])){
        
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
<div class="index">
        <div class="parametres">
            <h1>Paramétres de site web</h1>
            <br>
            <a href="hotel_directeur.php">Hoteles .</a>
            <br>
            <a href="bungalos.php">BUngalos .</a>
            <br>
            <a href="logout.php"><input type="submit" value="Deconnexion" class="subm1"></a>
        </div>
        
        <div class="desc">
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2>Hoteles</h2>
            <?php
            $bdd=new PDO('mysql:host=localhost:3306;dbname=m;charset=utf8;','root','');
            $recupuser = $bdd->query('SELECT * FROM hotel');
            $i=0;
           
            while($user = $recupuser->fetch()){
               

                if(isset($_GET['supprimer'])){
                    $getid = $user["id_h"];
                    $recupuser = $bdd->prepare('SELECT * FROM hotel WHERE id_h = ?');
                    $recupuser->execute(array($getid));
                    if($recupuser->rowCount() > 0){
                
                        
                        $banniruser = $bdd->prepare('DELETE FROM hotel WHERE id_h = ?');
                        $banniruser->execute(array($getid));
                
                        header('Location: hotel_directeur.php');
                
                    }else{
                        echo "Acun membre n'a ete trouve";
                    }
                
                }
               


                
           ?>
           <div class="Description">
           <label>NOM HOTEL :</label>
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
                
           <form methode="POST" ><input  type="submit"  name="supprimer" value="supprimer"  style="color: #AAAAAA;text-decoration: none;"></form>
 

           
           <form methode="POST" ><input  name="modifie" type="submit" value="modifie<?=$i;?>"  style="color: #AAAAAA;text-decoration: none;"></form>
           <form method="POST" id="f<?=$i;?>"    >
                <h4>Modefier un HOTEL</h4>
                

                <input type="text" name="id_h" value=<?= $user["id_h"]?> style="display:none">
                
                <label for="prix">nom_h </label>
                <input type="text" name="nom_h" style="width: 200px;height: 20px;">
                <br>
                <label for="">adress_h : </label>
                <input type="text" name="adress_h" style="width: 200px;height: 20px;">
                <br>
                
                <label for="categorie">categorie : </label>
                <input type="text" name="categorie" style="width: 200px;height: 20px;">
                <br>
                <label for="nombre_ch">nombre_ch: </label>
                <input type="number" name="nombre_ch" style="width: 200px;height: 20px;">
                <br>
                <input type="submit" value="Valider" class="subm" name="modefier">
            </form>
            <?php
            if($_GET['modifie']=="modifie<?=$i;?>"){
                    ?>
                    <script>
                            var a=document.getElementById("f<?=$i;?>");
                            a.style.display="block";
                            console.log("hi");
                            
                    </script>
                    
                <?php
                  

                }else{?>
                    <script>
                    var a=document.getElementById("f<?=$i;?>");
                    a.style.display="block";
                    console.log("hi");
                    
            </script>
            <?php  
                }?>
           <script>
                 
                   
               
              
               function b(){
                    var a=document.getElementById("f<?=$i;?>");
                    var p=document.getElementById("p<?=$i;?>");
                    if(a.style.display=="none" && p.value==p<?=$i;?>){
                  
                   a.style.display="block";
                   
                }else{
                    a.style.display="none";
                    

                   }
               }

           </script>
           
          
            <script>
             var a =document.getElementById("f<?=$i;?>");
               a.style.display="none";
           </script>

           </div>
           <?php
           $i++;
          } 
          ?>
          <form method="POST" class="frm">
                <h4>Ajouter un Hotel</h4>
                <label for="categorie">nom HOTEL : </label>
                <input type="text" name="nom_h" style="width: 200px;height: 20px;">
                <br>
                <label for="nom_h">categorie : </label>
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