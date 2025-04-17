<?php
$conectar = mysql_connect("localhost","root","");
$banco = mysql_select_db("loja");

if (isset($_POST["entrar"])){
    $senha = $_POST['senha'];
    $login = $_POST['login'];

    $sql = "select login, senha from adm where login = '$login' and senha = '$senha'";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado)==0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');
        window.location.href='login.php';
        </script>";
    }
    else{
        setcookie('login',$login);
        header('Location:menu.html');
    }
}
?>


<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylessss.css" type="text/css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form name="formulario" method="post" action="login.php">
        Login: <input type="text"     name="login" id="login" size="20"> <br> <br>
        Senha: <input type="password" name="senha" id="senha" size="20"> <br><br>
        <input type="submit" name="entrar" value="entrar">
    </form>
</body>
</html>