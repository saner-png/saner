<?php
$i=0;
$i=$_GET["i"];
if($i==1) {$st="Данные успешно добавлены";}
if($i==2) {$st="Записи успешно удалены";}
if($i==3) {$st="Записи успешно обновлены";}
if($i==4) {$st="Заказ успешно добавлен";}
?>
<table border=0 width=100%>
    <tr align=center>
        <td><br><br><br><br><br><br><br><br>
<h4 class="big"><?php echo $st ?></h4></td></tr></table>
<a href="index.php">На главную</a>
