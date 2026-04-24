<?php
include "func.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Добавление товара</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    form {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        max-width: 400px;
        width: 100%;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus,
    select:focus {
        border-color: #66afe9;
        outline: none;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #5cb85c;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
        background-color: #4cae4c;
    }
</style>
</head>
<body>

<form action="insert_tovars.php" method="post" name="form1">
    <label>Название товара</label>
    <input type="text" name="name" />

    <label>Категория товара</label>
    <select name="category">
        <?php echo show_categories(); ?>
    </select>

    <label>Цена товара</label>
    <input type="number" name="cena" />

    <label>Количество</label>
    <input type="text" name="kol" />

    <label>Срок годности</label>
    <input type="date" name="srok" />

    <input type="submit" name="insert" value="Добавить" />
</form>
</body>
</html>