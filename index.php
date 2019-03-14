<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="tableau.css">
    <title></title>
    <?php
include_once("sami.php");
     ?>
  </head>
  <body>
    <div class="listeEmp">
    <?php
    getEmp();
     ?>
   </div>
   <div class="addDept">
       <form action="#" method="post">
       <input type="text" name="deptno" placeholder="Numéro de département" required /></br></br>
       <input type="text" name="dname" placeholder="Nom de département" required /></br></br>
       <input type="text" name="loc" placeholder="Adresse de département" required/></br></br>
       <input type="submit" Value="Ajouter" name="ajouter">
     </form>
     <?php
     if(isset($_POST['ajouter'])){
     addDept();
     }
     getAllDept();
      ?>
     </div>

     <form action="#" method="post">
     <input type="text" name="deptno" placeholder="Numéro de département" required /></br></br>
     <input type="text" name="dname" placeholder="Nom de département" required /></br></br>
     <input type="text" name="loc" placeholder="Adresse de département" required/></br></br>
     <input type="submit" Value="Ajouter" name="ajouter">
   </form>
  </body>
</html>
