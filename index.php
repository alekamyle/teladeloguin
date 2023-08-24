<!DOCTYPE html>
<?php
session_start();

require_once('classes/Usuarios.php');
require_once('conexao/conexao.php');

$database = new conexao();
$db = $database->getconnection();
$usuario = new Usuario($db);

if (isset ($_POST['logar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];


if ($usuario->logar($nome,$senha)){
    $_SESSION ['nome'] = $nome;

    header ("Location: dashboard.php");
    exit();
}else{
    print "<srcipt>alert('Login invalido')</script>";
}
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
    <form class="login"; method="POST">
    <h1>login</h1>
        <label for ="nome">nome</label>
        <input type="text" name="nome" placeholder="coloque seu nome">
        <label for="senha">senha</label>
         <input type="password" name="senha" placeholder="coloque sua senha">

         <button tupe="submit" name="logar">logar</button>
</form>
    <a href="cadastrar.php">clique aqui para criar uma conta</>


</body>
</html>