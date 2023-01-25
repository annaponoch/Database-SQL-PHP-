<form action="userconnect.php">
  <input type="submit" name="back" value="Назад"><br><br>
</form>

<?php
include "config.php";
echo "<form action='14.php' method=GET>";

echo "Інформацію про реалізовану за певний період часу та сплачену продукцію торговельної марки Баланс.";
echo "<br><br>";

echo "Максимальна дата: <br>";
echo " <input type='date' name='dmax' value = '' /><br/>";
echo "Мінімальна дата: <br>";
echo " <input type='date' name='dmin' value = '' /><br/>";
echo "<input type='submit' value='Виконати'><br><br>";
echo "</form>";


if(isset($_GET['dmax'])&&isset($_GET['dmin'])){
    $query = "call pr14('$_GET[dmax]','$_GET[dmin]')";
    echo $query;
    $ver=mysqli_query($dbcon,$query);
    if(!$ver) 
    {
    echo "<P> Не вдалося виконати запит </P>";
    exit(mysqli_error($dbcon));
    }


    echo "<P><B> Результат запиту<br><br>";
    echo "<table border=1>";
      echo "<tr>
              <td> Назва торг марки </td>
              <td> Назва продукції </td>
              <td> Вартість </td>
              <td> Дата реалізації </td>
              <td> Дата сплати </td>
           </tr>";
    while(list($nametm,$name,$cina,$datar,$datas)=mysqli_fetch_row($ver))
    {
      echo "<tr>
              <td> $nametm </td>
              <td> $name </td>
              <td> $cina </td>
              <td> $datar </td>
              <td> $datas </td>
           </tr>";
    }
    
    echo "</table>";
    echo "<P>   </P>";
}
else {
    $_GET['dmax']='0000-00-00';
    $_GET['dmin']='0000-00-00';
}


?>