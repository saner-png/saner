<?php
include "bdconnect.php";
if(isset($_POST["reg"])){
    $name=htmlspecialchars($_POST["name_users"]);
    $login=htmlspecialchars($_POST["login"]);
    $password=htmlspecialchars($_POST["password"]);
    $hash=password_hash($password,PASSWORD_BCRYPT);
    $q=mysqli_query($link, "SELECT * FROM users WHERE login='".$login."'");
    $nq=mysqli_num_rows($q);
    if($nq==0){
        $hasErrors=true;
        $sql="INSERT INTO users (login, hash, name_users) VALUES ('$login','$hash','$name_users')";
        echo $sql;
        $result=mysqli_query($link, $sql);
        $mfq=mysqli_fetch_array($q);
        $_SESSION["logged"] = 1;
        $sql="SELECT max(id) FROM users";
        $result=mysqli_query($link,$sql);
        $mfq=mysqli_fetch_array($q);
        $_SESSION["userid"] = $mfq[0];
        Header ("Location: login.php");

    }
    else{
        echo "Логин уже занят";
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Document</title>
<style>
    body {
        background-color: #f3e5f5;
        font-family: 'Arial', sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        width: 300px;
        margin-bottom: 20px;
    }

    h2 {
        text-align: center;
        color: #9c27b0; 
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
        color: #e91e63; 
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 2px solid #ce93d8;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.3s;
    }

    input[type="text"]:hover, input[type="password"]:hover {
        border-color: #ba68c8; 
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin-top: 25px;
        background-color: #ce93d8; 
        border: none;
        border-radius: 8px;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #ba68c8;
    }
    a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ce93d8;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.2s;
        margin-top: 10px; 
    }

    a:hover {
        background-color: #ba68c8; 
        transform: scale(1.05);
    }
</style>
</head>
<body>
    <form action="" method="post">
        <h2>Регистрация</h2>
        <label for="login">Логин</label>
        <input type="text" name="login" id="login" />
        <p></p>
        <label for="name_users">Имя</label>
        <input type="text" name="name_users" id="name_users" />
        <p></p>
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" />
        <p></p>
        <input type="submit" value="Зарегистрироваться" name="reg" />
    </form>
    <a href="index.php">На главную</a>
</body>
</html>