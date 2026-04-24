
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробнее</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .tovar__image {
            display: block;
            margin-left: auto;
            margin-right: auto;      
        }
        td {
            padding: 10px 15px;
            border: 1px solid #ddd;
        }
        .t2 {
            font-weight: bold;
            background-color: #f2f2f2;
            width: 200px;
        }
        input[type="submit"] {
            background: #4a76a8;
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            margin: 5px;
        }
        input[type="submit"]:hover {
            background: #3a5f87;
        }
        .cart-form {
            text-align: center;
            margin-top: 20px;
        }
        .cart-form input[type="number"] {
            padding: 5px;
            width: 60px;
        }
        a.back-link {
            display: inline-block;
            margin-top: 30px;
            text-align: center;
            width: 100%;
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }?>
        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1 align="center">Информация о товаре</h1>
    <form action="" method="post" name="frt">
        <table align="center">
        <?php
        include "bdconnect.php"; 

if (isset($_GET["id"])){
   
    $id=$_GET["id"];
    $sql="SELECT tovars.id, name, category, cena, kol, srok from tovars, categories WHERE tovars.id_cat=categories.id_cat AND tovars.id=$id";
    $result=mysqli_query($link, $sql) or die ("товар не найден");

    $row = mysqli_fetch_array($result);

?>

<img class="tovar__image" 
                     src="<?= htmlspecialchars($row['image'] ?? 'placeholder.jpg') ?>" 
                     alt="<?= htmlspecialchars($row['name']) ?>"
                     onerror="this.src='data:image/jpeg;base64,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'">
            <tr>
                <td class="t2">Идентификатор товара</td>
                <td> <?php echo $row ["id"]?></td></tr>
                    <tr>
                    <td class="t2">Название продукта</td>
                    <td> <?php echo $row ["name"]?></td></tr>
                    <tr>
                    <td class="t2">Категория товара</td>
                    <td> <?php echo $row ["category"]?></td></tr>
                    <tr>
                    <td class="t2">Цена товара</td>
                    <td> <?php echo $row ["cena"]?></td></tr>
                    <tr>
                    <td class="t2">Количество на складе</td>
                    <td> <?php echo $row ["kol"]?></td></tr>
                        <tr>
                        <td class="t2">Срок годности</td>
                        <td> <?php echo $row ["srok"]?> </td></tr>

                        <?php 
                        
                    }
                        ?>
</table>
    </form>
    <a class="back-link" href="index.php">На главную</a>
</body>
</html>