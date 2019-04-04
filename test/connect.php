<?php
//demarage de la session 
session_start();
$login = $_POST['login'];
$mdp= $_POST['pw'];
$_SESSION['login']=$login;
$_SESSION['password']=$mdp;
$_SESSION['nom']="MARLEY";
$_SESSION['prenom']="BOB";
header('location:profil.php');

?>