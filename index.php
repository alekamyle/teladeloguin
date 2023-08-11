<!DOCTYPE html>
<?php
session_start();

require_once('classes/Usuarios.php');
require_once('conexao/conexcao.php');

$database = new conexao();
$db = $database->getconnection();
$usuario = new Usuario($db);

if (isset ($_POST['logar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];


if ($usuario->logar($email,$senha)){
    $_SESSION ['email'] = $email;

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
</head>
<body>
    <form method="POST">
        <label for ="email">email</label>
        <input type="email" name="email" placeholder="coloque seu email">
        <label for="senha">senha</label>
         <input type="passowrd" name="senha" placeholder="coloque sua senha">

         <button tupe="submit" name="logar">logar</button>
</form>
    <a href="cadastrar.php">clique aqui para criar uma conta</>


</body>
</html>