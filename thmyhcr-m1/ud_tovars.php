<?php 
include "bdconnect.php";
if (isset($_POST["ud_id"]) && $_POST["ud_id"] != "")
{
    $mass=$_POST["ud_id"];
    $i=0;
    while ($mass[$i])
    {
        $sql="DELETE FROM tovars WHERE id=$mass[$i]";
        $result1=mysqli_query($link, $sql) or die ("Query failed");
        $i++;
    }
    Header("Location: uspex.php?i=2");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<title>Список товаров</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 20px;
  }
  h3 {
    text-align: center;
    color: #333;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    background-color: #fff;
  }
  th, td {
    padding: 12px;
    border: 2px solid #ddd;
    text-align: center;
  }
  th {
    background-color: #f8f8f8;
    font-weight: bold;
  }
  tr:nth-child(even) {
    background-color: #fafafa;
  }
  tr:hover {
    background-color: #f1f1f1;
  }
  input[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50; /* зелёный */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  a {
    display: inline-block;
    margin: 20px 0;
    padding: 10px 20px;
    background-color: #008CBA; /* синий */
    color: white;
    text-decoration: none;
    border-radius: 4px;
  }
  a:hover {
    background-color: #007bb5;
  }
  center {
    margin-bottom: 20px;
  }
</style>
</head>
<body>

<h3 align="center">Список товаров</h3>

<form method="post" action="ud_tovars.php">
    <table>
        <tr>
            <th>Номер</th>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Срок</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        <?php
        $result = mysqli_query($link,"select * from tovars");
        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["cena"]."</td>
                <td>".$row["kol"]."</td>
                <td>".$row["srok"]."</td>
                <td><a href='update.php?id=".$id."'>Редактировать</a></td>
                <td><input type='checkbox' name='ud_id[]' value='".$id."'></td>
            </tr>";
        }
        ?>
    </table>
    <center><input type="submit" name="ud" value="Удалить"></center>
    <a href="index.php">На главную</a>
</form>

</body>
</html>