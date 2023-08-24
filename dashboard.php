<?php
session_start();

if(!isset($_SESSION['nome'])){
    hearder("Location: index.php");
    exit();

}

$nome = $_SESSION['nome'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>painel de controle]</h1>
    <p>seja bem vindo<?php echo $nome; ?> </p>

    <a href="logout.php">sair</a>
    
</body>
</html>