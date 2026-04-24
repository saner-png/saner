<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Список товаров</title>
<style>
  body {
    font-family: 'Helvetica Neue', sans-serif;
    background-color: #f0f4f8;
    margin: 0;
    padding: 40px 20px;
    color: #333;
  }

  h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #2c3e50;
    font-size: 2em;
  }

  /* Центрируем и стилизуем ссылки */
  a {
    display: inline-block;
    margin: 10px 0;
    padding: 15px 25px;
    background-color:rgb(227, 132, 240)
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-size: 1.2em;
    transition: background-color 0.3s, transform 0.2s;
  }

  a:hover {
    background-color:rgb(227, 132, 240);
    transform: scale(1.05);
  }



</style>
</head>
<body>
<h1>Список товаров</h1>
<?php
include "tovars.php";
?>
<div class="links">
  <a href="vvod_tovars.php">Добавить товар</a>
  <a href="ud_tovars.php">Удалить товар</a>
  <a href="table_tovars.php">Посмотреть в виде таблицы</a>
  <a href="karta_tovars.php">Посмотреть в виде карточки</a>
  <a href="registr.php">Регистрация</a>
  <a href="login.php">Войти</a>
</div>
</body>
</html>
