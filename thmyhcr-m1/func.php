
<?php


function show_tovars (){
    include "bdconnect.php";
    $sql = "SELECT id, name, category, cena, kol, srok FROM tovars, categories WHERE tovars.id_cat=categories.id_cat";
    if(isset($_POST["filtr"])){
    $sql="SELECT id, name,category, cena, kol, srok FROM tovars, categories WHERE tovars.id_cat=categories.id_cat";
    $category=$_POST["category"];
    if ($category == "Все")
    $sql = "SELECT id, name, category, cena, kol, srok FROM tovars, categories WHERE tovars.id_cat=categories.id_cat";
    else
    $sql = "SELECT id, name, category, cena,kol, srok FROM tovars, categories WHERE tovars.id_cat=categories.id_cat AND categories.id_cat=$category";
    }
    if(isset($_POST["sort"])){
    $cena=$_POST["cena"];
    if($cena=="0")
    $sql="SELECT id, name,category, cena, kol, srok FROM tovars,categories
    WHERE tovars.id_cat=categories.id_cat";
    if($cena=="min")
    $sql="SELECT id, name,category, cena, kol, srok
    FROM tovars,categories WHERE tovars.id_cat=categories.id_cat
    ORDER BY cena DESC";
    if($cena=="max")
    $sql="SELECT id, name,category, cena, kol, srok
    FROM tovars,categories WHERE tovars.id_cat=categories.id_cat
    ORDER BY cena ";
    }


    $result=mysqli_query($link, $sql) or die ("Query failed");
    $str="";
    while ($row=mysqli_fetch_array($result)){
        $str=$str."<tr>
        <td>".$row["id"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["category"]."</td>
        <td>".$row["cena"]."</td>
        <td>".$row["kol"]."</td>
        <td>".$row["srok"]."</td>
        <td><a href='tovar.php?id=" .$row["id"]."'>Подробнее</a></td>
        <td><input type='checkbox' name='id[]' value='".$row["id"]."'></td> 
        </tr>";
    };
echo $str;
}





function show_categories (){
    include "bdconnect.php";
    $sql= "SELECT * FROM categories";
    $result=mysqli_query($link,$sql) or die("Query failed");
    while( $row=mysqli_fetch_array($result)){
        $array_category[$row["id_cat"]]=$row["category"];
    };
$str="";
foreach ($array_category as $key => $value){
    $str=$str. "<option value='".$key."'>".$value."</option>";
}
return $str;
}


if (isset($_POST["search"])){
    var_dump($_POST);
    $name=$_POST["name"];
    $sql="SELECT id, name, category, cena, kol, srok FROM tovars, categories WHERE tovars.id_cat=categories.id_cat AND tovars.id LIKE '%$name%'";
}

?>
