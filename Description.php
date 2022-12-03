<?php
session_start();
$bdd=new PDO('mysql:host=localhost:5000;dbname=espace_admine;charset=utf8;','root','');
?>

<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Description</title>
</head>
<body>
    <?php
    $recupartcl = $bdd->query('SELECT * FROM Description');
    while($artcl=$recupartcl->fetch()){
        ?>
        <div class="article" style="border:1px solid black;padding-left: 25px;">
        
            <p><?= $artcl['conteneu_d'] ?></p>
            <a href="modifie_d.php ?id=<?= $artcl['id'];?>">
            <button style="color: while;background-color: yellow;margin-bottom: 15px;">Modefier</button>
        </a>
          
            
        </div>
        <?php
    }
    ?>
</body>
</html>
