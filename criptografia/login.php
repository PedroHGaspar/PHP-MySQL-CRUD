<?php

if (isset($_POST['email'])) {

    include('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM senhas WHERE email = '$email' LIMIT 1";

    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_exec->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
        if(!isset($_SESSION))
            session_start();
            $_SESSION['usuario'] = $usuario['id'];
            header("Location: ../Project/clientes.php");//função header do php faz com que mande comando para o HTTP e que volte para o location, no caso, o index.php ou a página que eu quiser.  
        
    } else {
        echo "<div class= sucessoLogin ;><span><b>Falha ao logar. Senha ou e-mail incorretos.</b></span></div>";
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Project/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>
    <form method="POST" action="">
        <div class="content">

            <div class="loginHeader">
                <span>
                    <b>LOGIN</b>
                </span>
            </div>

            <div>
                <p>
                    <label>Email* </label>
                    <input class="w3-input" name="email" required><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Senha* </label>
                    <input class="w3-input" name="senha" required><br>
                </p>
            </div>
            <br>
            <div>
                <p>
                    <button class="buttonSize" type="submit">Login</button>
                </p>
            </div>
        </div>
    </form>
    <div class="msgBottom">
        <span>Desenvolvido com amor por <a class="msgBottom" href="https://github.com/PedroHGaspar" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i>PedroHGaspar</a></span>
    </div>
    <!-- O atributo target definido como _blank, o que diz ao navegador para abrir o link em uma nova aba/janela, dependendo das configurações do navegador
    
            O atributo rel definido como noreferrer noopener para evitar possíveis ataques maliciosos das páginas as quais você fizer um vínculo -->
</body>

</html>