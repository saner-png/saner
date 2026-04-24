<?php
session_start();
include "bdconnect.php";
include "func.php";
include "validate_user.php";

if (isset($_SESSION["logged"]) && $_SESSION["logged"] == "1")
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Личный кабинет</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f0fc; /* нежный фиолетовый фон */
        color: #4B0082; /* индиго для текста */
        margin: 20px;
    }
    h2 {
   /* светло-фиолетовый */
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    p {
        font-size: 16px;
        margin: 10px 0;
    }
    a {
        display: inline-block;
        padding: 10px 15px;
        margin: 10px 5px 0 0;
        background-color: #FF69B4; /* розовый */
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s;
    }
    a:hover {
        background-color: #C71585; /* темно-розовый при наведении */
    }
    img {
        width: 200px;
        border-radius: 50%;
        display: block;
        margin: 0 auto 20px auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fffafc; /* очень светлый фиолетовый фон таблицы */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        margin-top: 20px;
    }
    th, td {
        padding: 12px 15px;
        border: 1px solid #ba55d3; /* сиренево-фиолетовая граница */
        text-align: center;
    }
    th {
        background-color: #E6C0E0; /* светлый фиолетово-розовый для шапки таблицы */
        color: #4B0082;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f0d4f7; /* светло-фиолетовая полоска */
    }
</style>
</head>
<body>
<?php
echo "<h2>Вы вошли под именем, " . htmlspecialchars($user["name_users"]) . "!</h2>";
?>
<img src='images/<?=$user["img"]?>' alt="Фото пользователя" />

<p>Возраст: 17 лет</p>
<p>Зарплата: 16 миллионов долларов</p>

<h2 style="text-align:center;">Список заказов</h2>
<table>
<tr>
    <th>Имя пользователя</th>
    <th>Артикул</th>
    <th>Наименование</th>
    <th>Цена</th>
    <th>Количество</th>
    <th>Дата</th>
</tr>
<?php
$user=$_SESSION["userid"];
$result = mysqli_query($link, "SELECT * FROM `orders`, tovars, users WHERE tovars.id=orders.id_tovar and users.id=orders.id_user;");
while($row = mysqli_fetch_array($result))
{
    echo "<tr><td>".$row["name_users"]."</td><td>".$row["id_order"]."</td><td>".$row["name"]."</td><td>".$row["cena"]."</td><td>".$row["quantity"]."</td><td>".$row["datatime"]."</td></tr>";
}
?>
</table>
<p>
<a href="logout.php">Выйти из аккаунта</a>
<a href="index.php">На главную</a>
</p>

</body>
</html>