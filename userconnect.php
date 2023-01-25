<?php
session_start();

if(isset($_POST['username']))
{
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];
}

require_once("conn.php");

include ("4lab.php");
//echo "<a href= 'userconnect.php'name ='back'>Повернутися</a><br>";

?>
<form  method="get">
<!-- Оберіть запит:<br><br>
<table border=0>
        <td><input type="submit" formaction="14.php" value="запит 1.4"> </td>
        <td><input type="submit" formaction="16.php" value="запит 1.6"> </td></tr>
        <td><input type="submit" formaction="21.php" value="запит 2.1"> </td>
        <td><input type="submit" formaction="22.php" value="запит 2.2"> </td>
</table> -->
<a href= 'input.php'name ='back1'>Повернутися</a><br>
</form>

<?php
if(isset($_GET['back1'])){
    session_destroy();
}
?>