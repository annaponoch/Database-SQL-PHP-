<?php

$dblocation="127.0.0.1";
// $dblocation="localhost";
$dbuser="root";
$dbpassword="";
$dbbase="data_base";

$dbcon=@mysqli_connect($dblocation,$dbuser,$dbpassword);
if(!$dbcon)
  {
    exit("<P> Сервер не доступний </P>");
  }

if(!mysqli_select_db($dbcon,$dbbase))
  {
    exit("<P> База не доступна </P>");
  }

$query = "select pass_hach from userlist where name_user='$_SESSION[username]'";

$ver=mysqli_query($dbcon,$query);
$rez=mysqli_fetch_row($ver);
$hash=$rez[0];
echo "<br>";

if(password_verify($_SESSION['password'], $hash))
{
  echo "Верифікація пройдена";
  echo "<br>";
} else
{
  exit("<P> Верифікація не пройдена </P>");
}
mysqli_close($dbcon);

$dbuser=$_SESSION['username'];
$dbpassword=$_SESSION['password'];

$dbcon=@mysqli_connect($dblocation,$dbuser,$dbpassword);
if(!$dbcon)
  {
    exit("<P> Сервер не доступний </P>");
  } else
  {
  echo "Зв'язок встановлено";
  echo "<br>";
  }

if(!mysqli_select_db($dbcon,$dbbase))
  {
    exit("<P> База не доступна </P>");
  } else
  {
    echo "Зв'язок з базою 'data_base' встановлено";
    echo "<br>";
  }
?>
