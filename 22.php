<form action="userconnect.php">
  <input type="submit" value="Назад"><br><br>
</form>

<?php
include "config.php";
echo "<form action='22.php' method=GET>";

echo "Для всієї молочної продукції загальну кількість та загальну вартість реалізації за деякий місяць деякого року ";
echo "<br><br>";

echo "Місяць <br>";
echo " <input type='text' name='mon' value=''/><br/>";
echo "Рік <br>";
echo " <input type='text' name='yea' value=''/><br/>";

echo "<input type='submit' value='Виконати'><br><br>";
echo "</form>";

if(!empty($_GET['mon'])||!empty($_GET['yea'])){
    $query = "call pr22($_GET[mon],$_GET[yea])";
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
             
              <td> Сума(кількість) </td>
              <td> Сума з розрахунком </td>
           </tr>";
    while(list($datar,$datas)=mysqli_fetch_row($ver))
    {
      echo "<tr>
            
              <td> $datar </td>
              <td> $datas </td>
           </tr>";
    }
    
    echo "</table>";
    echo "<P>   </P>";
}
else {
    echo "Введіть значення!<br>";}
?>