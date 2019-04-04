<?php

session_start();
echo "votre login est ".$_SESSION['login']."</br>";
echo "votre motsde passe est ".$_SESSION['password']."</br>";
echo "votre nom est ".$_SESSION['nom']."</br>";
echo "votre prenom est ".$_SESSION['prenom']."</br>";

?>
