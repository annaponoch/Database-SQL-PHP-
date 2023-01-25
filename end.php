<table>
<form action="input.php" method="post" >
<p><input type='submit' value='На початок'></p>
</form>
</table>

<?php
if(isset($_SESSION['name']))
{
echo "<HTML><HEAD>
       <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
       </HEAD></HTML>";
//session_unset();
session_destroy();
}
?>
