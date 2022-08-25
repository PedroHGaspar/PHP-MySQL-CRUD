<?php

$erro = false;

if(count($_POST) > 0){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];

    if(empty($nome)){
        $erro = "Preencha o nome";
    }
    if(empty($email)){
        $erro = "Preencha o e-mail";
    }
    if($erro == true){
        echo ("<p><b>$erro</b></p>");
    }else{
        if(!empty($nascimento)){
            $pedacos = implode('-' ,array_reverse(explode('/', $nascimento)));/*A função explode do php faz com que tudo seja "explode" e seja transformado em array, em seguida, a função array_reverse é uma function do php que faz com que tudo se inverta. O que era ano/mes/dia agora vai ser dia/mes/ano*/
            /*A função implode é uma função do php que faz com que uma matriz seja transformada em uma string.*/ 
            $nascimento = 
        }
    }

}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <a href="clientes.php">Voltar para a lista.</a>
    <form method="POST" action="">
        <div>
            <div>
                <p>
                    <label>Nome: </label>
                    <input name="nome" type="text"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Email: </label>
                    <input name="email" type="text"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Telefone: </label>
                    <input name="telefone" type="text"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Data de Nascimento: </label>
                    <input name="nascimento" type="text"><br>
                </p>
            </div>

            <div>
                <p>
                    <button type="submit">Salvar Cliente</button>
                </p>
            </div>
        </div>
    </form>
</body>
</html>