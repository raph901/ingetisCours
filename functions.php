<?php
session_start();
function getEmp()
{
    $link = connexion();
    if ($link) {
        $req="select * from emp";
        $res=mysqli_query($link, $req);
        if (!$res) {
            echo "probleme sur la requete";
        } else {
            echo "<table>";
            echo "<tr>"."<th>Nom</th>"."<th>Metier</th>"."<th>Mgr</th>"."<th>Date</th>"."<th>Salaire</th>"."<th>Commission</th>"."<th>Update</th>"."</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr style=\"border:2px solid black\">"
              ."<td>".$row[1]."</td>"
              ."<td>".$row[2]."</td>"
              ."<td>".$row[3]."</td>"
              ."<td>".$row[4]."</td>"
              ."<td>".$row[5]."</td>"
              ."<td>".$row[6]."</td>"
              ."<td>
              <form action='' method='post'>
              <input type ='hidden' name='idEmp' value='".$row[0]."'/>
              <input type ='submit' name='update' value='update'/>
              </from>
              </td>
              </tr>";
            }
            echo "</table>";
        }
    }
}
function addDept()
{
    $deptno = $_POST['deptno'];
    $dname = $_POST['dname'];
    $loc = $_POST['loc'];
    $link = connexion();
    if (preg_match('/^\d+$/', $deptno)) {
        $req="select * from dept where deptno =$deptno";
        $res =mysqli_query($link, $req);
        $row =mysqli_fetch_array($res);
        if (!$row) {
            $req1 ="insert into dept values($deptno,'$dname','$loc')";
            $res1 =mysqli_query($link, $req1);
            if ($res1) {
                echo "insertion reussite";
            }
        }
    } else {
        echo "-KO-";
    }
}

function getAllDept()
{
    $link = connexion();
    if ($link) {
        $req="select deptno,dname,loc from dept";
        $res=mysqli_query($link, $req);
        $tab = [];
        if (!$res) {
            echo "probleme sur la requete";
        } else {
            $i=0;
            while ($row = mysqli_fetch_array($res)) {
                $tab[$i][0] =$row[0];
                $tab[$i][1] =$row[1];
                $tab[$i][2] =$row[2];
                $i++;
            }
        }
    }
    return $tab;
}
  function getAllJob()
  {
      $link = connexion();
      if ($link) {
          $req="select distinct(job) from emp where job != 'PRESIDENT'";
          $res=mysqli_query($link, $req);
          $tab = [];
          if (!$res) {
              echo "probleme sur la requete";
          } else {
              $i=0;
              while ($row = mysqli_fetch_array($res)) {
                  $tab[$i] = $row[0];
                  $i++;
              }
          }
          return $tab;
      }
  }

function getAllMgr()
{
    $link = connexion();
    if ($link) {
        $req = "select empno,ename, job from emp";
        $res=mysqli_query($link, $req);
        $tab = [];
        if (!$res) {
            echo "probleme sur la requete";
        } else {
            $i=0;
            while ($row = mysqli_fetch_array($res)) {
                $tab[$i][0] = $row[0];
                $tab[$i][1] = $row[1];
                $tab[$i][2] = $row[2];
                $i++;
            }
        }
    }
    return $tab;
}

function addEmp()
{
    //Recuperation de tout les valeurs
    $empno = $_POST['empno'];
    $ename = $_POST['ename'];
    $job = $_POST['job'];
    $mgr = $_POST['mgr_choice'];
    $hiredate = $_POST['hiredate'];
    $salaire = $_POST['salaire'];
    $comm = $_POST['comm'];
    $deptno = $_POST['deptno'];
    //connextion a la base de donnee jj
    $link = connexion();
    if ($link) {

     //empno existe deja
        $req="select empno from emp where empno = $empno";
        if (!($empno == $req)) {
            // salaire >0
            if ($salaire > 0) {
                //new user deptno = mgr DEPTNO
                $reqmgr="select deptno from emp where $mgr";
                if ($deptno == $reqmgr) {
                    //que les salesman ont  des commissions
                    if ($comm != null && $job == "SALESMAN") {
                        // if date = null done hiredate = now ()
                        if ($hiredate == null) {
                            $req1 = "INSERT INTO `emp` (`empno`, `ename`, `job`, `mgr`, `hiredate`, `sal`,`comm`, `deptno`) VALUES ($empno,'$ename','$job',$mgr,now(),$salaire,$comm,$deptno)";
                            $res1 =mysqli_query($link, $req1);
                            if ($res1) {
                                echo "insertion reussite hiredate null";
                            } else {
                                //echo "INSERT INTO `emp` (`empno`, `ename`, `job`, `mgr`, `hiredate`, `sal`,`comm`, `deptno`) VALUES ($empno,'$ename','$job',$mgr,now(),$salaire,null,$deptno)";
                                echo "insert pas passé $empno,$ename,$job,$mgr,now(),$salaire,null,$deptno ";
                            }
                        } else {
                            $req1 ="INSERT INTO `emp` (`empno`, `ename`, `job`, `mgr`, `hiredate`, `sal`,`comm`, `deptno`) VALUES ($empno,'$ename','$job',$mgr,$hiredate,$salaire,$comm ,$deptno)";
                            $res1 =mysqli_query($link, $req1);
                            if ($res1) {
                                echo "insertion reussite";
                            }
                        }
                    } elseif ($job != "SALESMAN" && $comm == null) {
                        if ($hiredate == null) {
                            $req1 = "INSERT INTO `emp` (`empno`, `ename`, `job`, `mgr`, `hiredate`, `sal`,`comm`, `deptno`) VALUES ($empno,'$ename','$job',$mgr,now(),$salaire,null,$deptno)";
                            $res1 =mysqli_query($link, $req1);
                            if ($res1) {
                                echo "insertion reussite hiredate null";
                            } else {
                                //echo "INSERT INTO `emp` (`empno`, `ename`, `job`, `mgr`, `hiredate`, `sal`,`comm`, `deptno`) VALUES ($empno,'$ename','$job',$mgr,now(),$salaire,null,$deptno)";
                                echo "insert pas passé $empno,$ename,$job,$mgr,now(),$salaire,null,$deptno ";
                            }
                        } else {
                            $req1 ="INSERT INTO `emp` (`empno`, `ename`, `job`, `mgr`, `hiredate`, `sal`,`comm`, `deptno`) VALUES ($empno,'$ename','$job',$mgr,$hiredate,$salaire,null,$deptno)";
                            $res1 =mysqli_query($link, $req1);
                            if ($res1) {
                                echo "insertion reussite";
                            } else {
                                echo "insert pas passé ";
                            }
                        }
                    } else {
                        echo "ça marche pas ici";
                    }
                } else {
                    echo "Le manageur ne fait pas partie du même departement que l'employé ou inversement";
                }
            } else {
                echo "Le Salaire est de 0 ou moins";
            }
        } else {
            echo "Le Numero d'employée $empno est déja utilisé";
        }
    } else {
        echo "Link out";
    }
}
    function updateUserById()
    {
        $id =$_POST['idEmp'];
        // recuperer les information de la base de donnees
        $link = connexion();
        if ($link) {
            //partie externaliser
            $tab = getEmpById($link, $id);
            if ($tab) {
                $_SESSION['connectedUser'] = $tab;
            }
            if (isset($_SESSION['connectedUser'])) {
                header('location:updateemp.php');
            } else {
                echo "un probleme est survenu contacter l'administrateur  de votre site";
            }
        }
    }
      //rederiger vers la page de modification

      function getEmpById($link, $id)
      {
          $req="select * from emp where empno= $id";
          $res=mysqli_query($link, $req);
          $row =mysqli_fetch_array($res, MYSQLI_NUM);
          $tab = [];
          if (!$res) {
              echo "probleme sur la requete";
          } else {
              //changer les donnée dans la session_cache_expire
              $longueur = sizeof($row);
              for ($i=0;$i<$longueur;$i++) {
                  $tab[$i]=$row[$i];
              }
              $_SESSION['connectedUser'] = $tab;
          }
          return $tab;
      }
