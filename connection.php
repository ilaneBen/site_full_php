<?php
//Connexion a la base de données
// serveur =  le nom du serveur utilisé
//user = l'utilisateur de mysql
//Mdp = mots de passe de l'utilisateur
// BDD = la base de donné à sélectionner

function getDatabases(){
    $bdd = null;
    $url = "mysql:host=localhost;dbname=lagrilladerie;charset=utf8";
    $login= "root";
    $password = "";
    try
    {
        $bdd = new PDO($url,$login,$password);
        return $bdd;
    }
    catch(Exception $message)
    {
        echo ' une erreur au moment de la connexion BDD : '.$message->getMessage();
    }


}