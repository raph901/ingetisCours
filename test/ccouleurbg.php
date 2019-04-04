<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php
    session_start();
    ?>
  </head>
  <body>
    <form action="" method="post">
      <input type="color" name="color" />
      <input type="submit" name="Valider" value="Choisir votre couleur" />
    </from>
    <?php
if (isset($_POST["Valider"])){
  $couleur = $_POST["color"];
  $_SESSION["color"]=$couleur;
  echo "<style>body{background-color:".$_SESSION['color'].";} </style>";
}

     ?>
  </body>
</html>
