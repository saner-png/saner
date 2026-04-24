<?php
session_start();
include "bdconnect.php";
if(isset($_POST["id"]))
{
$mass=$_POST["id"];
$name=$_POST["name"];
$cena=$_POST["cena"];
}
//получаем массив идентификаторов (номеров) $mass, записи которых были добавлены в корзины
if(isset ($_POST["zak"]) && isset($_POST["id"]))
{
$mass=$_POST["id"];
$name=$_POST["name"];
$kol=$_POST["kol"];
$cena=$_POST["cena"];
$i=0;
$id_user=$_SESSION["userid"];
$data=date("Y-m-d H:i:s");
$id_order=strtotime($data);
while($mass[$i])
{
//выполнение SQL-запроса к таблице заказы
$sql="INSERT INTO orders (id_order,id_user,id_tovar, quantity, cost, datatime) VALUES ('$id_order','$id_user','$mass[$i]', '$kol[$i]', '$cena[$i]', '$data' )";
echo $sql;
$result1 = mysqli_query($link, $sql) or die("Query failed");
$i++;
}
//Перенаправление пользователя на страницу uspex.php; при этом предаем параметр i=4 – добавление в корзину
Header("Location: uspex.php?i=4");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Склад товаров -> Корзина товаров</title>
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f0f9; /* мягкий бледно-розовый фон */
    margin: 20px;
    color: #4B0082; /* пурпурно-фиолетовый текст */
}
h1 {
    text-align: center;
    color: #D02090; /* розово-фиолетовый */
    text-shadow: 1px 1px 2px #b266b2; /* мягкая тень для заголовка */
}
table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #fff0f5; /* нежный розовый фон таблицы */
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}
th, td {
    padding: 12px;
    border: 1px solid #e6c1f7; /* лиловая рамка */
    text-align: center;
}
th {
    background-color: #e0b0ff; /* светло-фиолетовый заголовок */
    color: #4B0082;
    font-size: 1.1em;
}
input[type="text"], input[type="number"] {
    padding: 8px;
    border: 2px solid #ba55d3; /* розово-фиолетовая рамка */
    border-radius: 5px;
    font-size: 1em;
}
input[type="checkbox"] {
    transform: scale(1.2);
}
input[type="submit"] {
    background-color: #d02090; /* ярко-розовый цвет кнопки */
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 10px;
    font-size: 1.2em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
input[type="submit"]:hover {
    background-color: #a02057; /* чуть темнее при наведении */
}
a {
    display: block;
    width: fit-content;
    margin: 20px auto;
    text-decoration: none;
    color: #9b30ff; /* лиловый цвет */
    font-weight: bold;
    font-size: 1.1em;
}
a:hover {
    color: #8000ff;
}
</style>
</head>
<body>
<h1>Вы добавили в корзину</h1>
<form action="" method="post" name="frt" >
<table align="center" border="1">
<tr>
<th>Идентификатор товара</th>
<th>Наименование</th>
<th>Количество</th>
<th>Цена за 1 шт.</th>
<th>Общая стоимость</th>
<th>Добавить в корзину</th>
</tr>
<?
$i=0;
$quantity=0;
while($mass[$i])
{
$sql="SELECT * FROM tovars WHERE id=$mass[$i]";
$result = mysqli_query($link, $sql) or die("Query failed");
$row=mysqli_fetch_array($result);
?>
<tr>
<td> <?php echo $mass[$i] ?></td>
<td><input type="text" name="name[]" value=" <?php echo $row["name"] ?>"></td>
<td> <input type="number" name="kol[]" id="" value="1"></td>
<td> <input type="text" name="cena[]" value="<?php echo $row["cena"] ?>"> </td>
<td><span class="stoim"> <?php echo $stoim=1*$row["cena"] ?></span></td>
<td><input type="checkbox" name="id[]" value="<?php echo $mass[$i] ?>"></td></tr>
<?
$i++;
$quantity+=$stoim;
}
?>
</table>
<p style="text-align:center; font-size: 1.2em; font-weight: bold; color: #800080;">
Общая стоимость заказа: <? echo $quantity ?>
</p>
<input type="submit" name="zak" value="Оформить заказ" style="display:block; margin: 0 auto;">
</form>
<a href="index.php">На главную</a>
</body>
</html>