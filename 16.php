<form action="userconnect.php">
  <input type="submit" value="Назад"><br><br>
</form>

<?php
include "config.php";
echo "<form action='16.php' method=GET>";

echo "Визначити дані про реалізацію молочної продукції за останні дні, за основу взяти  кінцеву дату реалізації";
echo "<br><br>";

echo "Кількість останніх днів: <br>";
echo " <input type='text' name='days' value=''/><br/>";
echo "<input type='submit' value='Виконати'><br><br>";
echo "</form>";

if(!empty($_GET['days'])){
    $query = "call pr16('$_GET[days]')";
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
              <td> Повна назва </td>
              <td> Кількість </td>
              <td> Дата реалізації </td>
              <td> Дата сплати </td>
           </tr>";
    while(list($name,$kil,$datar,$datas)=mysqli_fetch_row($ver))
    {
      echo "<tr>
              <td> $name </td>
              <td> $kil </td>
              <td> $datar </td>
              <td> $datas </td>
           </tr>";
    }
    
    echo "</table>";
    echo "<P>   </P>";
}
else {
    echo "Значення не задано!<br>";
}
?>