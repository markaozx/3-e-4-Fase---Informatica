<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('loja2');

if (isset($_POST['Logar']))
{
$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT login, senha FROM usuario
        WHERE login = '$login' and senha = '$senha'";

$resultado = mysql_query($sql);

if (mysql_num_rows($resultado) <= 0 )
{
   echo "<script language='javascript' type='text/javascript'>  
        alert('Login e/ou senha incorretos');
        window.location.href='menu.html';
        </script>";
    }
    else
    {
        setcookie('login',$login);
        header('Location:menu.html');
    }
}
?>