<?php
require "requete.php";
$id = $_GET['id'];
deleteBurger($id);
header('location:burgers.php');


$id = $_GET['id'];
deleteSandwich($id);
header('location:sandwichs.php');

$id = $_GET['id'];
deleteTexmex($id);
header('location:texmexs.php');
?>