<?php
session_start();
    // Подключение к БД
    include("bdconnect.php");
//проверяем, авторизован для пользователь, если ДА, отправляем его в личный кабинет
    if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="1")
        header("Location: profile.php");
//аутентификация (проверка логина и пароля)
    if(isset($_POST["auth"])){
        $login=$_POST["login"];
        $password=$_POST["password"];
        $dataSent=$_POST["dataSent"];
        $hasErrors=false;
        if($dataSent==1){
            $q=mysqli_query($link,"SELECT * FROM users WHERE login='".$login."'");
            $nq=mysqli_num_rows($q);
            if($nq==0){
                $hasErrors=true;
            }elseif($nq==1){
                $mfq=mysqli_fetch_array($q);
                $hash=$mfq["hash"];
                if(password_verify($password, $hash)){
                    $_SESSION["logged"] = 1;
                    $_SESSION["userid"] = $mfq[0];

if (isset($_SESSION["logged"]) && $_SESSION["logged"] == "1" && $_SESSION["userid"] == "3")
header("Location: profile_admin.php");
                    else header("Location: profile.php");
                }
            }
            else $hasErrors=true;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вход на сайт</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="login" placeholder="Логин"/>
        <input type="password" name="password" placeholder="Пароль"/>
        <input type="hidden" name="dataSent" value="1"/>
        <input type="submit" value="Войти" name="auth"/>
    </form>
    <?php
    if($hasErrors){
        echo "Вы ввели неправильный логин или пароль";
    }
    ?>
    <a href="registr.php">Регистрация</a><br>
    <a href="index.php">На главную</a>
</body></html>