<?php
require_once('classes/Usuarios.php');
require_once('conexao/conexao.php');

$database = new conexao ();
$db = $database -> getConnection();
$usuario = new usuario($db);

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

    if($usuario->cadastrar($nome,$email,$senha,$confSenha)){
       echo "cadastro realizado com sucesso";
    }else{
        echo "erro ao cadastrar!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
    <form action="" method = "POST">
    <h1>faça seu cadastro</h1>
        <label for ="">nome de usuario</label>
        <input type="text" name="nome">

        <label for="">email</label>
         <input type="email" name="email">

         <label for ="senha">senha</label>
         <input type="password" name="senha" maxlength=8 >

         <label for ="">confirme senha</label>
         <input type="password" name="confSenha" maxlength=8 >

         <button tupe="submit" name="cadastrar">cadastrar</button>
</form>
<a href="index.php">voltar para tela de logar</a>

</body>
</html>