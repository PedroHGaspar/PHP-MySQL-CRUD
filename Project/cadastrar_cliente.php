<?php

if(isset($_POST)){
    var_dump($_POST);
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