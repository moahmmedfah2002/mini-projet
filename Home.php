<?php
session_start();
$bdd=new PDO('mysql:host=localhost:3306;dbname=m;charset=utf8;','root','');
                    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
    <title>Home</title>
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Reseau Village</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Description</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="search">
                <input class="srch" type="search" name="" id="" placeholder="Type to text">
                <a href="#"><button class="btn">Search</button></a>
            </div>            
        </div>
        <div class="content">
            <h1>Description</h1>
            <?php
            $bdd=new PDO('mysql:host=localhost:5000;dbname=espace_admine;charset=utf8;','root','');
            $recupartcl = $bdd->query('SELECT * FROM description');
            while($artcl=$recupartcl->fetch()){
            ?>
            <div class="article" >
               <p><?= $artcl['conteneu_d'] ?></p>    
            </div>
            <?php } ?>
            <button class="cn"><a href="#">Plus</a></button>
        </div>
    </div>
<div class="bod">
    <a href="mailto:youssafouhba@gmail.com"></a>
    <?php
    $bdd=new PDO('mysql:host=localhost:5000;dbname=mini_projet;charset=utf8;','root','');
    $recupartcl = $bdd->query('SELECT * FROM chambre');
    while($chambre=$recupartcl->fetch()){
        ?>
        <div class="chambre">
        <label for="chambres">Type de chambre :</label><br> 
        <input list="chambres" name="chambres"> 
        <datalist id="chambres"> 
              <option value="<?= $chambre['type-ch'] ?>"> 
              <option value="Lily"> 
              <option value="Tulip"> 
              <option value="Daffodil"> 
              <option value="Orchid"> 
        </datalist>     
        </div>
        <?php
    }
    ?>
</div>
<div class="footer">

</div>
    
</body>
</html>

