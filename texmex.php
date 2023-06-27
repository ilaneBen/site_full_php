<?php
require "requete.php";
$id = $_GET["id"];
$texmexs = getTexMex($id);

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
        <h1 class="burger">Tex Mex</h1>
        <div class="original">
          
        <div class="card">
  <img src="<?= $texmexs['photo']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $texmexs["nom"]?></h5>
    <p class="card-text black"><?= $texmexs ['description']?></p>
    <p class="black"><?= $texmexs ['prix']?> €</p>
  </div>
        </div>
    </section>
    
</body>
</html>