<?php
require "requete.php";

if(isset($_POST['email'])&& isset($_POST['mdp'])){
    
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $nom_serveur = "localhost";
    $dbname="lagrilladerie";
    $login= "root";
    $password = "";
    $con = mysqli_connect($nom_serveur, $login, $password, $dbname);
    $req = mysqli_query($con, "SELECT * FROM page_connexion WHERE email= '$email'AND mdp= '$mdp' ");
    $num_ligne = mysqli_num_rows($req);
    if($num_ligne > 0){
        header("location:bienvenu.php");
    }
    else{
        echo " tromper";
    }
}
