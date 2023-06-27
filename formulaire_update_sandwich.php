<?php
require "requete.php";
$id = $_GET['id'] ;
$nom =isset($_POST['nom']) ? $_POST['nom'] : "";
$description= isset($_POST['description']) ? $_POST['description'] : "";;
$prix = isset($_POST['prix']) ? $_POST['prix'] : "";
$photo = isset($_POST['photo']) ? $_POST['photo'] : "";
$erreur="";
$sandwich = getSandwich($id);

if(isset($_POST["modifier"])){
  if(empty($nom)){
    $erreur.="manque nom";
  }
  if(empty($description)){
    $erreur.="manque description";
  }
  if(empty($prix)){
    $erreur.="manque prix";
  }
  if(empty($photo)){
    $erreur.="manque photo";
  }
  if(empty($erreur)){
   
    updateSandwich($id, $nom,$description, $prix, $photo);
    header('location:sandwichs.php');
  }
}


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
            <a href="burgers.php">burgers</a>
        </div>
<form action='formulaire_update_sandwich.php?id=<?=$id?>' method='post'>

  <ul>

    <li class="form">
        <div>
          <?php
          echo $erreur;
          ?>
        </div>
     <label for="">nom :</label>
      <input type="text" name="nom" value="<?= $sandwich['nom']?>"/>
     <label for="">description :</label>
      <input type="text" name="description" value="<?=$sandwich['description']?>"/>          
      <label for="">prix :</label>
      <input type="float" name="prix" value="<?=$sandwich['prix']?>"/>
      <label for="photo">photo</label>
      <input type="text" name="photo" value="<?=$sandwich['photo']?>"/>
      <input type="submit" name="modifier" value="modifier">
    </li>
  </ul>
</form>
</body>
</html>