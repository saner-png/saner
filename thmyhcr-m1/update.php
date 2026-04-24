<?php
include "bdconnect.php";
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="SELECT tovars.id, name, category, cena, kol, srok from tovars, categories WHERE tovars.id_cat=categories.id_cat AND tovars.id=$id";
    $result=mysqli_query($link, $sql) or die ("товар не найден");
    $row = mysqli_fetch_array($result);
}
if (isset($_POST["red"]))
{
    $id=$_POST["id"];
    $cena=$_POST["cena"];
    $kol=$_POST["kol"];
    $sql="UPDATE tovars set cena=$cena, kol=$kol where id=$id";
    $result=mysqli_query($link, $sql) or die ("ошибка во время обновления информации");
    Header("Location: uspex.php?i=3");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<title>Склад товаров -> редактирование товара</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 40px;
  }
  h1 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 24px;
  }
  form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  .t2 {
    width: 50%;
    padding: 10px;
    font-weight: bold;
    background-color: #eef;
    text-align: right;
  }
  td {
    padding: 10px;
    vertical-align: middle;
  }
  input[type="text"],
  input[type="number"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
  }
  input[type="submit"] {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #4CAF50; /* зеленый */
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>
<h1>Информация о товаре</h1>
<form action="" method="post" name="frt">
    <table>
        <tr>
            <td class="t2">Идентификатор товара</td>
            <td> <?php echo $row["id"]?></td>
        </tr>
        <tr>
            <td class="t2">Название продукта</td>
            <td> <?php echo $row["name"]?></td>
        </tr>
        <tr>
            <td class="t2">Категория товара</td>
            <td> <?php echo $row["category"]?></td>
        </tr>
        <tr>
            <td class="t2">Цена товара</td>
            <td><input type="text" size="10" maxlength="10" name="cena" id="cena" value="<?php echo $row["cena"]?>"></td>
        </tr>
        <tr>
            <td class="t2">Количество на складе</td>
            <td><input type="number" size="11" maxlength="11" name="kol" id="kol" value="<?php echo $row["kol"]?>"></td>
        </tr>
        <tr>
            <td class="t2">Срок годности</td>
            <td> <?php echo $row["srok"]?></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:center;">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="red" value="Редактировать">
            </td>
        </tr>
    </table>
</form>
</body>
</html>