<?php
include "bdconnect.php"; 
$sql = "SELECT*FROM tovars, categories WHERE tovars.id_cat=categories.id_cat;";
$result = mysqli_query ($link, $sql) or die("Query failed");
while ($row = mysqli_fetch_array($result))
{
printf ("Товар №  %s - %s - %s - %s - %s<br>", $row['id'], $row['name'], $row['cena'], $row['kol'], $row['category']);
}
mysqli_close($link);
?>