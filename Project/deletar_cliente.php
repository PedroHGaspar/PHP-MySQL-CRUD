<?php 

include("conexao.php");

if(isset($_POST['confirmar'])){//Aqui o POST confirmar só vai existir se a pessoa clicar no botão de SIM lá embaixo no HTML onde o name do button é confirmar.
    $id = intval($_GET['id']);
    $sql_code= "DELETE FROM clientes WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query){ ?>

        <h1>Cliente deletado com sucesso.</h1>
        <p><a href="clientes.php">Clique aqui para voltar para a lista de clientes.</a></p>

        <?php
        die();
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>

    <form action="" method="post">
        <a style="margin-right: 25px;" href="clientes.php">Não</a>
        <button name="confirmar" value="1" type="submit">Sim</button>
    </form>
</head>
<body>
    
</body>
</html>