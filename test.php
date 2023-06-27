<?php
require "requete.php";
$bdd=getDatabases();
$email = $_POST['email'];
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$query = $bdd->prepare('
                            INSERT INTO `page_connexion`( `email`, `mdp`)
                            VALUES(?,?)
                            ');
$test = $query->execute(array($email, $mdp));
var_dump($test);
session_start();
// vérifier l'envoi des infos du form
if (isset($_POST['identifiant']) && !empty($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['mdp'])) {

    // récupérer les infos du form champs par champ
    $identifiant = htmlspecialchars($_POST['identifiant']);
    $mdp = htmlspecialchars($_POST['mdp']);

    // recupérer via la BDD

    $query = $connexion->prepare("
                                    SELECT
                                        `email`,
                                        `mdp`
                                    FROM
                                        `admin` 
                                    WHERE email = ?
                                    ");
    $query->execute([$identifiant]);

    $adminBDD = $query->fetch();

    // je test les deux infos (form et de la BDD)

    if ($adminBDD) {
        // tester le mot de passe
        if (password_verify($mdp, $adminBDD['mdp'])) {
            $_SESSION["admin"]['id_admin'] = $adminBDD['id_admin'];
            $_SESSION["admin"]['identifiant'] = $adminBDD['identifiant'];
            header("location:admin.php");
        } else {
            echo "le mot de passe est incorrect";
        }
    } else {
        echo " le client n'existe pas";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Inscription</h1>
    <section class="form">
<form action='' method='post'>

<ul>

  <li >

    <input type="hidden" />
   <label for="">email :</label>
    <input type="text" name="email" /><br>
   <label for="">mot de passe :</label>
    <input type="password" name="mot de passe" /> <br>             
    <input type="submit" name="ajout" value="ajouter"/>  <br>
    <input type="button" value="Connexion" />   
  </li>
</section>

</ul>
</body>
</html>