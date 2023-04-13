<?php 
require "requete.php";
$email =htmlspecialchars( $_POST["email"]) ?? 0;
$mdp =password_hash(htmlspecialchars($_POST["mdp"]), PASSWORD_DEFAULT)  ?? 0;
$erreur="";
$bdd= getDatabases();
        $sql =  "INSERT INTO page_connexion(email, mdp)
        VALUES (?,?)";
        $pst = $bdd -> prepare($sql);
        $pst -> bindValue("email", $email);
        $pst-> bindValue("mdp", $mdp);
        $pst -> execute([$email,$mdp]);

if(isset($_POST["email"])){
  if(empty($email)){
    $erreur="manque email";
  }
  if(empty($mdp)){
    $erreur="manque mot de passe";
  }
  if(empty($erreur)){
   
  }
  var_dump($email,$mdp);
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
    <h1>Inscription</h1>
    <section class="form">
<form action='page_inscription.php' method='post'>

<ul>

  <li >

    <input type="hidden" />
   <label for="">email :</label>
    <input type="text" name="email" /><br>
   <label for="">mot de passe :</label>
    <input type="password" name="mot de passe" /> <br>             
    <input type="submit" name="ajout" value="ajouter"/>  <br>
    <input type="button" value="Connexion" onclick="window.location.href='page_connexion.php';" />   
  </li>
</section>

</ul>
</body>
</html>