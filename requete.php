<?php
require "connection.php";
/*lié base de donnée mysql et fichioer php*/
function getBurgers(){
    $bdd= getDatabases();
    $sql = 'SELECT * FROM burger';
    $reponse = $bdd -> query($sql);
    $burgers = $reponse-> fetchALL();
    $reponse -> closeCursor();
    return $burgers ;
}

function getSandwichs(){
    $bdd= getDatabases();
    $sql = 'SELECT * FROM sandwich2';
    $reponse = $bdd -> query($sql);
    $sandwichs = $reponse-> fetchALL();
    $reponse -> closeCursor();
    return $sandwichs ;
}

function getTexMexs(){
    $bdd= getDatabases();
    $sql = 'SELECT * FROM texmex';
    $reponse = $bdd -> query($sql);
    $texmexs = $reponse-> fetchALL();
    $reponse -> closeCursor();
    return $texmexs ;
  
}
/* Lié deux page ensemble php*/
function getBurger($id){
    $bdd= getDatabases();
    $sql = 'SELECT * FROM `burger` WHERE id = ? ';
    $pst = $bdd -> prepare ($sql);
    $pst -> execute([$id]);
    $membre = $pst -> fetch();
    $pst->closeCursor();
    return $membre;
}

function getSandwich($id){
    $bdd= getDatabases();
    $sql = 'SELECT * FROM `sandwich2` WHERE id = ? ';
    $pst = $bdd -> prepare ($sql);
    $pst -> execute([$id]);
    $sandwich = $pst -> fetch();
    $pst->closeCursor();
    return $sandwich;
}


function getTexMex($id){
    $bdd= getDatabases();
    $sql = 'SELECT * FROM `texmex` WHERE id = ? ';
    $pst = $bdd -> prepare ($sql);
    $pst -> execute([$id]);
    $texmex = $pst -> fetch();
    $pst->closeCursor();
    return $texmex;
}

//ajouter element base de donéé
function addBurger($nom, $description, $prix, $photo){
    $bdd= getDatabases();
    $sql =  "INSERT INTO burger(nom, description, prix, photo)
    VALUES (:nom, :description, :prix, :photo)";
    $pst = $bdd -> prepare($sql);
    $pst -> bindValue("nom", $nom);
    $pst-> bindValue("description", $description);
    $pst-> bindValue("prix", $prix);
    $pst-> bindValue("photo", $photo);
    $pst -> execute();
    $pst-> closeCursor();
}

function addSandwich($nom, $description, $prix, $photo){
    $bdd= getDatabases();
    $sql =  "INSERT INTO sandwich2(nom, description, prix, photo)
    VALUES (:nom, :description, :prix, :photo)";
    $pst = $bdd -> prepare($sql);
    $pst -> bindValue("nom", $nom);
    $pst-> bindValue("description", $description);
    $pst-> bindValue("prix", $prix);
    $pst-> bindValue("photo", $photo);
    $pst -> execute();
    $pst-> closeCursor();
}

function addTexMex($nom, $description, $prix, $photo){
    $bdd= getDatabases();
    $sql =  "INSERT INTO texmex(nom, description, prix, photo)
    VALUES (:nom, :description, :prix, :photo)";
    $pst = $bdd -> prepare($sql);
    $pst -> bindValue("nom", $nom);
    $pst-> bindValue("description", $description);
    $pst-> bindValue("prix", $prix);
    $pst-> bindValue("photo", $photo);
    $pst -> execute();
    $pst-> closeCursor();}

    function addUser($email, $mdp){
        $bdd= getDatabases();
        $sql =  "INSERT INTO page_connexion(email, mdp)
        VALUES (?,?)";
        $pst = $bdd -> prepare($sql);
        $pst -> bindValue("email", $email);
        $pst-> bindValue("mdp", $mdp);
        $pst -> execute(array(
            'email' => $email,
            'mdp'=> $mdp));
        $pst-> closeCursor();
    }






//modifier bdd

function updateBurger($id, $nom, $description, $prix, $photo){
    $bdd= getDatabases();
    $sql = "UPDATE burger SET nom =:nom, description = :description, prix = :prix, photo = :photo WHERE id = :id";
    /*$sql =  "UPDATE `burger` SET (:nom, :prix, :description, :photo) WHERE id = ?" ;*/
    $pst = $bdd -> prepare($sql);
    $pst-> bindValue("id", $id);
    $pst-> bindValue("nom", $nom);
    $pst-> bindValue("description", $description);
    $pst-> bindValue("prix", $prix);
    $pst-> bindValue("photo", $photo);
    $pst-> execute();
    $pst-> closeCursor();
}

function updateSandwich($id, $nom, $description, $prix, $photo){
    $bdd= getDatabases();
    $sql = "UPDATE sandwich2 SET nom =:nom, description = :description, prix = :prix, photo = :photo WHERE id = :id";
    /*$sql =  "UPDATE `burger` SET (:nom, :prix, :description, :photo) WHERE id = ?" ;*/
    $pst = $bdd -> prepare($sql);
    $pst-> bindValue("id", $id);
    $pst-> bindValue("nom", $nom);
    $pst-> bindValue("description", $description);
    $pst-> bindValue("prix", $prix);
    $pst-> bindValue("photo", $photo);
    $pst-> execute();
    $pst-> closeCursor();
}

function updateTexmex($id, $nom, $description, $prix, $photo){
    $bdd= getDatabases();
    $sql = "UPDATE texmex SET nom =:nom, description = :description, prix = :prix, photo = :photo WHERE id = :id";
    /*$sql =  "UPDATE `burger` SET (:nom, :prix, :description, :photo) WHERE id = ?" ;*/
    $pst = $bdd -> prepare($sql);
    $pst-> bindValue("id", $id);
    $pst-> bindValue("nom", $nom);
    $pst-> bindValue("description", $description);
    $pst-> bindValue("prix", $prix);
    $pst-> bindValue("photo", $photo);
    $pst-> execute();
    $pst-> closeCursor();
}



/*function show_burger($nom, $description, $prix, $photo){
    $bdd= getDatabases();
    $bdd->set_charset("utf8");
		$requete = "SELECT * FROM burger";
		$resultat = $bdd->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
			echo $ligne['nom'] . ' ' . $ligne['description'] . ' ' . $ligne['prix'] . ' ' . $ligne['photo'] . '<br>';
		}
		$bdd->close();
    };*/

//supprimer page 

function deleteBurger($id){
       $bdd= getDatabases();
       $sql= 'DELETE FROM `burger` WHERE id= :id';
       $pst = $bdd -> prepare($sql);
       $pst-> bindValue("id", $id);
       $pst -> execute();
       $pst -> closeCursor();
}

function deleteSandwich($id){
    $bdd= getDatabases();
    $sql= 'DELETE FROM `sandwich2` WHERE id= :id';
    $pst = $bdd -> prepare($sql);
    $pst-> bindValue("id", $id);
    $pst -> execute();
    $pst -> closeCursor();
}


function deleteTexmex($id){
    $bdd= getDatabases();
    $sql= 'DELETE FROM `texmex` WHERE id= :id';
    $pst = $bdd -> prepare($sql);
    $pst-> bindValue("id", $id);
    $pst -> execute();
    $pst -> closeCursor();
}


//page de connexion

function Sign($email){
        $email=$_POST['email'];
        $bdd= getDatabases();
        $sql = "SELECT * FROM page_connexion Where 'email'=$email";
        $pst = $bdd -> prepare($sql);
        $pst-> bindValue("email", $email);
        $pst -> execute([$email]);
        $res =  $pst ->fetch(); 
}
function getUser(){
    $bdd= getDatabases();
    $sql = 'SELECT * FROM page_connexion';
    $reponse = $bdd -> query($sql);
    $user = $reponse-> fetchALL();
    $reponse -> closeCursor();
    return $user;
}
