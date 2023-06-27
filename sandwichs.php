<?php require "requete.php" ;
$sandwichs = getSandwichs();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet"  type="text/css" href="cv.css">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/1fdc877c77.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<title>Document</title>
</head>
<body>
<div class="accueil">
            <a href="indexx.php">accueil</a>
        </div>
        <div >
            <p class="frite">menu +2,50€</p>
        </div>
    <section>
        <h1 class="burger">Nos Sandwich</h1>
        <div class="original">
        
       <?php foreach ($sandwichs as $sandwich) {?>
       <div> <div>
        <a href="sandwich.php?id=<?= $sandwich["id"]?>">
        <h2 ><?= $sandwich["nom"]?>
        </h2>
            <img src="<?= $sandwich['photo']?>"></a>
        <p>
            <?= $sandwich ['description']?>
        </p>
        <p>
            <?= $sandwich ['prix']?> €
        </p>
         </div>
         
        <a class="ajout" href="formulaire_update_sandwich.php?id=<?=$sandwich["id"]?>"> modifier sandwich </a><br>
        <a class="ajout" href="Suppr_burger.php?id=<?=$sandwich["id"]?>"> supprimer sandwich </a><br>
    </div><?php }?>
   <footer><a class="ajout" href="formulaire_ajout_sandwich.php">ajouter sandwich</a></footer> 
    </section>
    <div class="burger">
                    
    
</body>
</html>