function blockComm(job){
  if(job.value=="SALESMAN"){
    document.getElementById("commission").disabled =false;

  }else{
    document.getElementById("commission").disabled =true;
  }
}
function surligne(champ, erreur)
{
  if(erreur)
    champ.style.backgroundColor = "#fba";
  else
    champ.style.backgroundColor = "white";
}
function verifFrom(f){
  var nom = f.ename;
  var num = f.empno;
  var job = f.job;
  var mgr = f.mgr_choise;

  var hiredate = f.hiredate;
  var salaire = f.salaire;
  var depno = f.deptno;
  var regexNom = /^[A-Za-z]+$/;
  var regexNum = /^[0-9]+$/;
  console.log(commission.value);

if( !num.value.match(regexNum)   ||  parseInt(num.value)<7000  || parseInt(num.value)>8000){
      surligne(num,true);
      return false;
}else
{
    surligne(num,false);
    console.log(num.value);

}
if( nom.value.lenght>10 || !nom.value.match(regexNom) ){
    surligne(nom,true);
    return false;
}else
{
    surligne(nom,false);
    console.log(nom.value);
}
if(!job.value){
    surligne(job,true);
    return false;
}
else
{
    surligne(job,false);
    console.log(job.value);
}
if (!mgr.value) {
    surligne(mgr,true);
    return false;
}
else
{
    surligne(mgr,false);
    console.log(mgr.value);
}
return false;
}
