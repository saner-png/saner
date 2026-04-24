<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
h3 {
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
    background-color: #fff;
}

table tr:first-child td {
    background-color:rgb(158, 85, 192);
    color: white;
    font-weight: bold;
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

table td {
    padding: 10px;
    border: 1px solid #ddd;
    color: #555;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #e8f4fc;
    cursor: default;
}
a {
    display: inline-block;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    color:rgb(158, 85, 192);
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<h3 align="center">Список товаров</h3>
<form action="" method="post">
<lable for="category">Выбор по категории</lable>
<select name="category">
    <option value="Все">Все</option>
    <?php
    include "func.php";
    echo show_categories();
    ?>
    </select><input type="submit" value="Фильтр" name="filtr">


<lable for="cena">Сортировка</lable>
<select name="cena">
    <option value="0">Без сортировки</option>
    <option value="min">По убыванию цены</option>
    <option value="max">По возрастанию цены</option></select>
    <input type="submit" value="сортировка" name="sort">
    <lable form="name">Поиск по названию</lable>
    <input type="search" name="name" id="name">
    <input type="submit" value="поиск" name="search">
<table width="100%" border="2">
   </form>
<br> 
<form action="zakaz.php" method="post">  
<table width="100%" border="2">
    <tr>
    <td>Номер</td>
    <td>Наименование</td>
    
    <td>Категории</td>
    <td>Цена</td>
    <td>Количество</td>
  
    <td>Срок годности</td>
    <td>Подробнее</td>
    <td>Добавить в корзину</td>
</tr>

    <?php
    if (isset($_POST["filtr"]) OR isset($_POST["sort"]) OR isset($_POST["search"]))
    {
        echo show_tovars();
    }
    else show_tovars(); {
  
    }
    ?>
    </table>
    <br>
    <input type="submit" value="Добавить в корзину">
</form>
<br>
    <a href="index.php">На главную</a>
</body>
</html>