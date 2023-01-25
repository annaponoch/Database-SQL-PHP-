<form action="userconnect.php">
  <input type="submit" value="Назад"><br><br>
</form>

<?php
include "config.php";
echo "<form action='21.php' method=GET>";

echo "Для всіх торговельних марок загальну кількість та загальну вартість реалізованих молочних продуктів ";
echo "<br><br>";

echo "Найменування продукції <br>";
echo " <input type='text' name='name' value=''/><br/>";
echo "<input type='submit' value='Виконати'><br><br>";
echo "</form>";

//if(!empty($_GET['name'])){
    $query = "call pr21('$_GET[name]')";
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
              <td> Сума(кількість) </td>
              <td> Сума з розрахунком </td>
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
// }
// else {
//     $_GET['name']='';
// }
?>