<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="tableau.css">
    <title>Page d'accueil</title>
    <?php
    include_once("log.php");
    include_once("functions.php");
     ?>
  </head>
  <body>
      <header>
          <nav class="navbar navbar-dark bg-primary navbar-expand-md py-md-2">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item py-md-2"><a href="#" class="nav-link">page 1</a></li>
            <li class="nav-item py-md-2"><a href="#" class="nav-link">page 2</a></li>
            <li class="nav-item py-md-2"><a href="#" class="nav-link">page 3</a></li>
            <li class="nav-item py-md-2"><a href="#" class="nav-link">page 4</a></li>
            <li class="nav-item py-md-2"><a href="#" class="nav-link">page 5</a></li>
        </ul>
    </div>
</nav>
      </header>
    <div class="container-fluid" >
        <div class="row">
        <div class="col">
            <h2>Ajout d'un employé</h2>
            <form action="" method="post">
                <input type="text" name="empno" placeholder="Numéro d'employé" required /></br></br>
                <input type="text" name="ename" placeholder="Nom employé" required /></br></br>
                <select name="job">
                    <?php
                    $tab = getAllJob();
                    if ($tab) {
                        foreach ($tab as $key => $value) {
                            ?>
                            <option value"<?php echo $value; ?>"> <?php echo $value; ?> </option>
                            <?php
                        }
                    } else {
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
                    <?php
                    $tab = getAllDept();
                    if ($tab) {
                        foreach ($tab as $key => $value) {
                            ?>
                            <option value"<?php echo $value[0]; ?>"> <?php echo $value[1]." ".$value[2]; ?> </option>
                            <?php
                        }
                    } else {
                        ?>
                        <option value="null"> No Dept </option>
                        <?php
                    } ?>
                </select> <br> <br>
                <input type="submit" Value="Ajouter" name="ajouteremp">
                <input type="reset" Value="Vider" name="vider">
            </form>
        </div>
        <div class="col">
            <?php
            getEmp();
            ?>
        </div>
        <div class="col">
            <h2>Ajout d'un departement</h2>
            <form action="" method="post">
                <input type="text" name="deptno" placeholder="Numéro de département" required /></br></br>
                <input type="text" name="dname" placeholder="Nom de département" required /></br></br>
                <input type="text" name="loc" placeholder="Adresse de département" required/></br></br>
                <input type="submit" Value="Ajouter" name="ajouter">
            </form>
        </div>

        <div class="col">
        <?php
        $tab = getAllDept();
        if ($tab) {
            ?>
            <table>
                <tr><th>DEPTNO</th><th>DNAME</th><th>LOC</th></tr>
                <?php
                for ($i=0;$i< sizeof($tab);$i++) {
                    ?>
                    <tr>
                        <td> <?php echo $tab[$i][0][0]; ?></td>
                        <td> <?php echo $tab[$i][0][1]; ?></td>
                        <td> <?php echo $tab[$i][0][2]; ?></td>
                        <?php
                } ?>
                </table>
                <?php
        }
            ?>
        </div>
        </div>
    </div>
  </body>
</html>

<?php
if (isset($_POST['ajouteremp'])) {
                addEmp();
            }
if (isset($_POST['ajouter'])) {
    addDept();
}
