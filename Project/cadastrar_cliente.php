<?php

$erro = false;

function limpar_texto($str){
    return preg_replace("/[^0-9]/", "", $str);
}

if(count($_POST) > 0){

    include('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];

    if(empty($nome)){
        $erro = "Preencha o nome";
    }
    if(empty($email || filter_var($email, FILTER_VALIDATE_EMAIL))){
        $erro = "Preencha o e-mail";
    }

    if(!empty($nascimento)){
        $pedacos = explode('/', $nascimento);
        if(count($pedacos) == 3){
            $nascimento = implode('-', array_reverse($pedacos));/*A função explode do php faz com que tudo seja "explode" e seja transformado em array, em seguida, a função array_reverse é uma function do php que faz com que tudo se inverta. O que era ano/mes/dia agora vai ser dia/mes/ano*/
            /*A função implode é uma função do php que faz com que uma matriz seja transformada em uma string.*/ 
        }
            else{
                $erro = "A data de nascimento deve seguir o padrão D/M/A.";
            }
    }

    if(!empty($telefone)){
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11){
            $erro = "O telefone deve ser preenchido no padrão (48) 91234-5678";
        }
    }

    if($erro == true){
        echo "<p><b>ERRO:$erro</b></p>";
    }else{

        $sql_code = "INSERT INTO clientes (nome, email, telefone, nascimento, data_cadastro) VALUES ('$nome', '$email', '$telefone', '$nascimento', NOW())";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
    }

        if($deu_certo){
            echo "<p><b>Cliente cadastrado com sucesso!</b></p>";
            unset($_POST);/*unset é uma função do php que limpa a variáve post, e o post será zerado, dai os valores não serão mostrados mais no input quando a execução der certo.*/ 
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
                    <input value = "<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Email: </label>
                    <input value = "<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" type="text"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Telefone: </label>
                    <input placeholder="(48) 91234-5678" value = "<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" name="telefone" type="text"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Data de Nascimento: </label>
                    <input value = "<?php if(isset($_POST['nascimento'])) echo $_POST['nascimento']; ?>" name="nascimento" type="text"><br>
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