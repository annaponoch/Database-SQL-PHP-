<?php
$dblocation="127.0.0.1";
// $dblocation="localhost";
$dbuser="root";
$dbpassword="";
$dbbase="data_base";

$dbcon=mysqli_connect($dblocation,$dbuser,$dbpassword);
if(!$dbcon)
  {
    exit("<P> Сервер не доступний </P>");
  }
else
  {
    //echo "<P>Зв'язок встановлено</P>";
  }

if(!mysqli_select_db($dbcon,$dbbase))
  {
    exit("<P> База не доступна </P>");
  }
else
  {
    //echo "<P>Зв'язок з базою 'data_base' встановлено</P>";
  }
?>
