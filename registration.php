<form action="input.php">
  <input type="submit" value="Назад"><br>
</form>
<table>
<form method="post" >
<tr><td>Ім'я</td><td><input type="text" name='name'></td></tr>
<tr><td>Пароль</td><td><input type="password" name="pass"></td></tr>
<tr><td>Пароль</td><td><input type="password" name="pass_again"></td></tr>
<tr><td>e-mail</td><td><input type="text" name="email"></td></tr>
<tr><td>URL</td><td><input type="text" name="url"></td></tr>
<tr><td>Телефон</td><td><input type="text" name="tel"></td></tr>
<tr><td> </td><td><input type="submit" value="Реєстрація"></td></tr>
</form>
</table>



<?php
session_start();
// session.gc_maxlifetime=1440
if(empty ($_POST)) exit();
$_POST['name']=trim($_POST['name']);
$_POST['pass']=trim($_POST['pass']);
$_POST['pass_again']=trim($_POST['pass_again']);
if(empty ($_POST['name'])) exit('Поле "Ім\'я" не заповнено');
if(empty ($_POST['pass'])) exit('Одне з полів "Пароль" не заповнено');
if(empty ($_POST['pass_again'])) exit('Одне з полів "Пароль" не заповнено');
if($_POST['pass']!=$_POST['pass_again']) exit('Пароль та підтвердження не співпадають');
if(!empty ($_POST['email']))
{
  if(!preg_match("|^[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}$|i",$_POST['email']))
  exit('Поле "e-mail" повинно відповідати формату name@ukr.net');
}
if(!empty ($_POST['tel']))
{
  if(!preg_match("|^[0-9]{10}$|",$_POST['tel']))
  exit('Поле "Телефон" заповнено не правильно');
}

include ("config.php");

$_POST['name']=mysqli_escape_string($dbcon,$_POST['name']);
$_POST['pass']=mysqli_escape_string($dbcon,$_POST['pass']);
$_POST['email']=mysqli_escape_string($dbcon,$_POST['email']);
$_POST['url']=mysqli_escape_string($dbcon,$_POST['url']);

$_SESSION['name']=$_POST['name'];
$_SESSION['pass']=$_POST['pass'];
$_SESSION['email']=$_POST['email'];
$_SESSION['url']=$_POST['url'];
$_SESSION['tel']=$_POST['tel'];

include ("conn2.php");
?>
