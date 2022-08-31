<?php

include('conexao.php');
$id = intval($_GET['id']);

function limpar_texto($str){
    return preg_replace("/[^0-9]/", "", $str);
}

if(count($_POST) > 0){

    $erro = false;
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



    if(!empty($telefone)){
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11){
            $erro = "O telefone deve ser preenchido no padrão (48) 91234-5678";
        }
    }

    if($erro == true){
        echo "<p><b>ERRO:$erro</b></p>";
    }else{

        $sql_code = " UPDATE clientes SET nome = '$nome', email = '$email', telefone = '$telefone', nascimento = '$nascimento' WHERE id = '$id'";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
    }

        if($deu_certo){
            echo "<div class= sucessoCadastro ;><span><b>Cliente atualizado com sucesso!</b></span></div>";
            unset($_POST);/*unset é uma função do php que limpa a variável post, e o post será zerado, dai os valores não serão mostrados mais no input quando a execução der certo.*/ 
        }

}

$id = intval($_GET['id']);
$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();
//Aqui em cima é pura lógica para pegar as informações do banco de dados: Basicamente a 4º linha chama a variável da 3º linha, a 3º linha chama a variável da 2º linha, e a 2º linha chama a variável da 1º linha. Uma chamando a outra para ficar mais simples de aplicar. A última variável ($cliente) vai ser usada logo abaixo no HTML para mostrar as informações desejadas através do ID, que é único para cara pessoa.

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Editar Cliente</title>
</head>
<body>
    <form method="POST" action="">
        <div class="content">
            <a href="clientes.php" style="font-size: 30px;">Voltar para a lista de clientes cadastrados.</a><br><br><br>
            <div>
                <p>
                    <label>Nome* </label>
                    <input class="w3-input" value = "<?php echo $cliente['nome']; ?>" name="nome" type="text" required><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Email* </label>
                    <input class="w3-input" value = "<?php  echo $cliente['email']; ?>" name="email" type="text" required><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Telefone </label>
                    <input class="w3-input" placeholder="(48) 91234-5678" value = "<?php if(!empty($cliente['telefone']))  echo formataTelefone($cliente['telefone']); ?>" name="telefone" type="text" maxlength="11" size="11"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Data de Nascimento* </label>
                    <input class="w3-input" value = "<?php if(!empty($cliente['nascimento'])) echo ($cliente['nascimento']); ?>" name="nascimento" type="date" required><br>
                </p>
            </div>

            <div>
                <p>
                    <button class="buttonSize" type="submit">Atualizar Cliente</button>
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