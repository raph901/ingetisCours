<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="tableau.css">
    <title></title>
    <?php
    include_once("log.php");
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
    <h2>Ajout d'un departement</h2>
    <form action="#" method="post">
    <input type="text" name="deptno" placeholder="Numéro de département" required /></br></br>
    <input type="text" name="dname" placeholder="Nom de département" required /></br></br>
    <input type="text" name="loc" placeholder="Adresse de département" required/></br></br>
    <input type="submit" Value="Ajouter" name="ajouter">
    </form>

    <h2>Ajout d'un employé</h2>
    <form action="#" method="post">
    <input type="text" name="empno" placeholder="Numéro d'employé" required /></br></br>
    <input type="text" name="ename" placeholder="Nom employé" required /></br></br>
    <select name="job">
    <?php
    $tab = getAllJob();
    if($tab){
      foreach ($tab as $key => $value) {
        ?>
        <option value"<?php echo $value; ?>"> <?php echo $value; ?> </option>
        <?php
      }
    }
    else{
      ?>
      <option value="null"> No JOB </option>
      <?php
    } ?>
  </select> <br> <br>
    <input type="search" name="mgr" placeholder="Manageur" required/></br></br>
    <input type="date" name="hiredate" placeholder="Date de recrutement" required/></br></br>
    <input type="text" name="salaire" placeholder="Salaire de l'employée" required/></br></br>
    <input type="text" name="comm" placeholder="Commission" required/></br></br>
    <select name="deptno">
    </select><br><br>
    <input type="submit" Value="Ajouter" name="ajouteremp">
    <input type="reset" Value="Vider" name="vider">
    </form>

</div>
     <?php
     if(isset($_POST['ajouter'])){
     addDept();
     }
     getAllDept();
      ?>
  </body>
</html>
