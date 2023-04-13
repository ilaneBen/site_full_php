<?php
 require "requete.php";

$burgers = getBurgers();

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
    <section>
        <div class="accueil">
            <a href="indexx.php">accueil</a>
        </div>
        <div >
            <p class="frite">menu +2,50€</p>
        </div>
            <h1 class="burger">burger simple</h1>
        <div class="original">
            <?php foreach ($burgers as $burger) {?>
               <div > <div>
                    
                        <h2><?= $burger["nom"]?></h2>
                    <a href="burger.php?id=<?= $burger["id"]?>">
                    <img src="<?= $burger['photo']?>">
                    <p></a>
                        <?= $burger ['prix']?> €
                    </p>
                </div>
                    <a class="ajout" href="formulaire_update_burger.php?id=<?=$burger["id"]?>"> modifier burger </a>
                    <a class="ajout" href="Suppr_burger.php?id=<?=$burger["id"]?>"> supprimer burger </a>
            </div>
            <?php }?>
            
        </div>
    </section>
    <footer>
    <a class="ajout" href="formulaire_ajout_burger.php">ajouter burger</a><br>


    </footer>


</body>
</html>
