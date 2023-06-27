<?php

require "connection.php";
$bdd=getDatabases();
session_start();
// vérifier l'envoi des infos du form
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['mdp'])) {

    // récupérer les infos du form champs par champ
    $email =htmlspecialchars($_POST['email']) ;
    $mdp = htmlspecialchars($_POST["mdp"]);

    // recupérer via la BDD

    $query = $bdd->prepare("
                                    SELECT
                                      email,
                                      mdp
                                    FROM
                                        page_connexion 
                                    WHERE email = ?
                                                 ");
                                    
    
    $query->execute(array($email));

    $Hash = $query->fetch();
    var_dump($Hash['mdp']);
    $erreur="";
    // je test les deux infos (form et de la BDD)

    if ($Hash) {
        // tester le mot de passe
        if (password_verify($mdp, $Hash['mdp'])){
         $_SESSION['Hash']['email'] = $Hash['email'];
         $_SESSION['Hash']['mdp'] = $Hash['mdp'];
            header("location:bienvenu.php");
        } else {
           $erreur= $_SESSION['Hash']['email'] = $Hash['email'];
        $erreur= $_SESSION['Hash']['mdp'] = $Hash['mdp'];
     var_dump($mdp);

        }
    } else {
        $erreur = " le client n'existe pas";
    }

}
/*session_start();
if(isset ($_REQUEST["bouton-valider"])){
if(isset($_POST['email'])&& isset($_POST['mdp'])){
    $email = htmlspecialchars($_POST['email']);
    $mdp =htmlspecialchars( $_POST['mdp']) ;
    $erreur="";
    $bdd= getDatabases();
    $sql = "SELECT * FROM `page_connexion` WHERE `email`=?";
    $pst = $bdd -> prepare($sql);
    $pst -> execute([$email]);
    $res =  $pst ->fetch();
  if($res){
    if(password_verify($mdp,$res['mdp'])){
        $_SESSION['page_connexion']['email']=$res['email'];
        $_SESSION['page_connexion']['mdp']=$res['mdp'];
        header('location:bienvenu.php');
    } else{
    echo"identifiant incorrect";
    }
}
else{
    echo"identifiant incorrect";

  }
}
}*/
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
    <h1>Connexion</h1>
    <section class="form">
    <?php
     if(isset($erreur)){
        echo $erreur;
     };
        ?>
<form action='' method='POST'>

<ul>

  <li >
   <label for="">email :</label>
    <input type="text" name="email" value=""/>
    <label for="">mot de passe :</label>
    <input type="password" name="mdp" value=""/>          
    <label for=""></label>
    <input type="submit" name="bouton-valider" value="Connexion">
    <input type="button" value="Inscription" onclick="window.location.href='page_inscription.php';" />
     </li>
</ul>
</section>
</form>

</body>
</html>