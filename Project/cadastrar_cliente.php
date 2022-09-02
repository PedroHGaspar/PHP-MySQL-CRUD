<?php

$erro = false;

function limpar_texto($str){
    return preg_replace("/[^0-9]/", "", $str);
}

if(count($_POST) > 0){

    include('conexao.php');
    include ('email/send.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];
    $senha_descriptografada = $_POST['senha'];
    
    if(strlen($senha_descriptografada) < 6 && strlen($senha_descriptografada) > 16){
        $erro = "A senha deve ter entre 6 e 16 caracteres.";
    }

    
    if(empty($nome)){
        $erro = "Preencha o nome";
    }
    if(empty($email || filter_var($email, FILTER_VALIDATE_EMAIL))){
        $erro = "Preencha o e-mail";
    }



    if(!empty($telefone)){
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11){
            $erro = "<div class= sucessoLoginCadastrar ;><span><b>O telefone deve ser preenchido no padrão (48) 91234-5678</b></span></div>";
        }
    }

    if($erro == true){
        echo $erro;
    }else{
        $senha = password_hash($senha_descriptografada, PASSWORD_DEFAULT);//Aqui a senha vai ser enviada já criptografada, então antes dela ser enviada assim, precisa salvar ela antes, se não a senha irá ser criptografada e o cliente não terá acesso ao sistema.

        $sql_code = "INSERT INTO clientes (nome, email, senha, telefone, nascimento, data_cadastro) VALUES ('$nome', '$email', '$senha', '$telefone', '$nascimento', NOW())";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
    }

        if($deu_certo){
            enviar_email($email,"Sua conta no meu site foi criada.","<h1>Parabéns!</h1>
            <p>Sua conta no meu site foi criada!</p>
            <p>
                <b>Login: $email</b>
                <b>Senha: $senha_descriptografada</b>
            </p>
            <p>
            Para fazer login, acesse <a href=\"https://meusitedeteste.com/login.php\">este link!</a>
            </p>
            ");
            echo "<div class= sucessoCadastro ;><span><b>Cliente cadastrado.</b></span></div>";
            unset($_POST);/*unset é uma função do php que limpa a variáve post, e o post será zerado, dai os valores não serão mostrados mais no input quando a execução der certo.*/ 
        }

}

?>

<a href=""></a>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cadastrar Cliente</title>
</head>
<body>
    <form method="POST" action="">
        <div class="content">
            <a href="clientes.php" style="font-size: 30px;">Voltar para a lista de clientes cadastrados.</a><br><br><br>
            <div>
                <p>
                    <label>Nome* </label>
                    <input class="w3-input"  value = "<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text" required><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Email* </label>
                    <input class="w3-input"  value = "<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" type="text" required><br>
                </p>
            </div>
            <div>
            <p>
                    <label>Senha de Acesso do Cliente* </label>
                    <input class="w3-input"  value = "<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>" name="senha" type="text" required><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Telefone </label>
                    <input class="w3-input"  placeholder="(48) 91234-5678" value = "<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" name="telefone" type="text" maxlength="11" size="11"><br>
                </p>
            </div>
            <div>
                <p>
                    <label>Data de Nascimento* </label>
                    <input class="w3-input"  value = "<?php if(isset($_POST['nascimento'])) echo $_POST['nascimento']; ?>" name="nascimento" type="date" required><br>
                </p>
            </div>
            <br>
            <div>
                <p>
                    <button class="buttonSizeCadastrar" type="submit">Salvar Cliente</button>
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