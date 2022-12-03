<?php

$bdd=new PDO('mysql:host=localhost:5000;dbname=espace_admine;charset=utf8;','root','');

    $getid = $_GET['id'];
    $recup_article = $bdd->prepare('SELECT * FROM description WHERE id = ?');
    $recup_article->execute(array($getid));

    if($recup_article->rowCount() > 0){

        $article_info = $recup_article->fetch();
    
        
        $contenue = str_replace('<br />','',$article_info['conteneu_d']);
        if(isset($_POST['valider'])){
            
            $contenue_saisie = nl2br(htmlspecialchars($_POST['conteneu_d']));

            $update_artcl = $bdd->prepare('UPDATE description SET conteneu_d = ?');
            $update_artcl->execute(array($contenue_saisie));

            header('Location: Description.php');
    }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modefications</title>
</head>
<body>
<form method="POST">
        <textarea name="conteneu_d" id="" cols="30" rows="10" >
        <?= $contenue; ?>
        </textarea>
        <input type="submit"  name="valider">
    </form>
</body>
</html>