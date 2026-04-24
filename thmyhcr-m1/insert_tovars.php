<?php
include "bdconnect.php" ;
$name=$_POST["name"];
$id_cat=$_POST["category"];
$cena=$_POST["cena"];
$kol=$_POST["kol"];
$srok=$_POST["srok"];
$sql="INSERT INTO tovars (name, id_cat, cena, kol, srok) VALUES ('$name','$id_cat','$cena','$kol','$srok')";
echo $sql;
$result=mysqli_query($link, $sql) or die ("Query failed");
Header ("Location: uspex.php?i=1");
?>