<?php
function connexion(){
$login ="root";
$mdp="root";
$host="localhost";
$dbname="empdept";
$link=mysqli_connect($host,$login,$mdp,$dbname);
if (!$link){
  echo "erreur de connexion";
}
else{
   echo "";
}
return $link;
}