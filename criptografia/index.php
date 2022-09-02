<?php


if (isset($_POST['email'])) {
    include('conexao.php');

    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO senhas (email, senha) VALUES ('$email', '$senha')");
}

if (isset($_POST['confirmar'])) //Aqui ele irá pegar o isset post do button lá embaixo, caso o button seja pressionado depois dos dados serem inseridos, irá redirecionar para a função header logo abaixo, que é a função que leva pra outra página, no caso, a página de login.
    header("Location: login.php")

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
    <title>Cadastrar Usuário</title>
</head>

<body>
    <form method="POST" action="">
        <div class="content">

            <div class="loginHeader">
                <span>
                    <b>CADASTRO</b>
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
                <button class="botaoNao" name="confirmar" value="1" type="submit">Cadastrar Usuário</button>
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