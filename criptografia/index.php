<?php

if(isset($_POST['email'])){
    include('conexao.php');

    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO senhas (email, senha) VALUES ('$email', '$senha')");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Cadastrar Senha</h1>
        <form action="" method="post">
            <input type="text" name="email" id="">
            <input type="text" name="senha">
            <button type="submit">Cadastrar senha</button>
        </form>
</body>
</html>