<?php
require "requete.php";
$nom = $_POST["nom"] ?? 0;
$description=$_POST["description"] ?? 0;
$prix =$_POST["prix"] ?? 0;
$photo =$_POST["photo"] ?? 0;
$erreur="";

if(isset($_POST["ajout"])){
  if(empty($nom)){
    $erreur="manque nom";
  }
  if(empty($description)){
    $erreur="manque description";
  }
  if(empty($prix)){
    $erreur="manque prix";
  }
  if(empty($photo)){
    $erreur="manque photo";
  }
  if(empty($erreur)){
   
    addBurger($nom, $description, $prix, $photo);
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
            <a href="burgers.php">les burgers</a>
        </div>
<form action='formulaire_ajout_burger.php' method='post'>

  <ul>

    <li class="form">

      <input type="hidden" />
     <label for="">nom :</label>
      <input type="text" name="nom" /><br>
     <label for="">description :</label>
      <input type="text" name="description" /> <br>             
      <label for="">prix :</label>
      <input type="float" name="prix"/>  <br>
      <label for="photo">photo</label>
      <input type="text" name="photo"><br>
      <input type="submit" name="ajout"/>  <br>   
    </li>


  </ul>

</form>
</body>
</html>