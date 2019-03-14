<?php
function getEmp() {
  $link = connexion();
  if($link){
    $req="select * from emp";
    $res=mysqli_query($link,$req);
    if(!$res){
      echo "probleme sur la requete";
    }
    else {
      echo "<table>";
          echo "<tr>"."<th>nom</th>"."<th>metier</th>"."<th>mgr</th>"."<th>date</th>"."<th>salaire</th>"."<th>commission</th>"."</tr>";
          while ($row = mysqli_fetch_array($res)) {
              echo "<tr style=\"border:2px solid black\">"
              ."<td>".$row[1]."</td>"
              ."<td>".$row[2]."</td>"
              ."<td>".$row[3]."</td>"
              ."<td>".$row[4]."</td>"
              ."<td>".$row[5]."</td>"
              ."<td>".$row[6]."</td>"
              ."</tr>";
          }
          echo "</table>";
      }
    }
  }
function addDept(){
  $deptno = $_POST['deptno'];
  $dname = $_POST['dname'];
  $loc = $_POST['loc'];
  $link = connexion();
  if(preg_match('/^\d+$/',$deptno)){
    $req="select * from dept where deptno =$deptno";
    $res =mysqli_query($link,$req);
    $row =mysqli_fetch_array($res);

    if(!$row){
      $req1 ="insert into dept values($deptno,'$dname','$loc')";
      $res1 =mysqli_query($link,$req1);
      if($res1)
      {
        echo "insertion reussite";
      }
    }
  }
  else {
    echo "-KO-";
  }
}

function getAllDept(){
    $link = connexion();
    if($link){
      $req="select * from dept";
      $res=mysqli_query($link,$req);
      $tab = [];
      if(!$res){
        echo "probleme sur la requete";
      }
      else {
            $i=0;
            while ($row = mysqli_fetch_array($res)) {
                $tab[$i][0][0] =$row[0];
                $tab[$i][0][1] =$row[1];
                $tab[$i][0][2] =$row[2];
                $i++;
            }
          }
        }
        return $tab;
      }
  function getAllJob(){
    $link = connexion();
    if($link){
      $req="select distinct(job) from emp";
      $res=mysqli_query($link,$req);
      $tab = [];
      if(!$res){
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
