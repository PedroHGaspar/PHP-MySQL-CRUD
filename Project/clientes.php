<?php
include('conexao.php');

$sql_clientes = "SELECT * FROM clientes";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;

?>

<script>
    $(window).on("recalcula tamanho", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();

    /*Aqui, mesmo eu não entendendo muito(AINDA) de Jquery, eu usei essa lógica que achei no google para reformar o tamanho do scroll da table.*/
</script>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
  <h1>Estes são os clientes cadastrados no seu sistema:</h1>
  <div class="tbl-header">
    <table>
      <thead>
          <th>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Nascimento</th>
          <th>Data</th>
          <th>Ações</th>
      </thead>
    </table>

    <?php if($num_clientes == 0){ ?>
        <tr>
            <td>Nenhum cliente foi cadastrado.</td>
        </tr>
        <?php } else{

            while($cliente = $query_clientes->fetch_assoc()){/*Essa função fetch_assoc é do PHP, serve para retornar um array do row, link do manual: https://www.php.net/manual/pt_BR/mysqli-result.fetch-assoc.php*/

                //substr(string $string, int $start, int $length = ?): string
                $telefone = "Não Informado";
                if(!empty($cliente['telefone'])){
                    $ddd = substr($cliente['telefone'], 0 , 2);
                    $parte1 = substr($cliente['telefone'], 2, 5);
                    $parte2 = substr($cliente['telefone'], 7);
                    $telefone = "($ddd) $parte1-$parte2";
                }//Tudo isso aqui em cima serve para fazer com que o telefone apareça direitinho na hora da pessoa olhar o relatório de clientes cadastrados.

                if(!empty($cliente['nascimento'])){
                    $nascimento = implode('/', array_reverse(explode('-', $cliente['nascimento'])));//explode serve para inverter o A/M/D para D/M/A, o implode serve para adicionar a /.
                }

                $data_cadastro = date("d/m/Y H:i", strtotime($cliente['data_cadastro']));//essa função strtotime é do PHP e serve para calcular direitinho a data. A função date tem suas pecualiaridades e necessita abrir o manual dela. Exemplo é aquele d/m/Y H:i, ali estou dizendo que eu quero que apareço em dia/mes/ano e a hora e minutos. 

        ?>

  </div>
  <div class="tbl-content">
    <table>
      <tbody>
          <td> <?php echo $cliente['id']; ?></td>
          <td> <?php echo $cliente['nome']; ?></td>
          <td> <?php echo $cliente['email']; ?></td>
          <td> <?php echo $telefone; ?></td>
          <td> <?php echo $nascimento; ?></td>
          <td> <?php echo $data_cadastro; ?></td>
          <td>
          <a href="editar_cliente.php?id=<?php echo $cliente['id'];?>" title="EDITAR"><i class="fa-solid fa-pen"></i></a>
          <a href="deletar_cliente.php?id=<?php echo $cliente['id'];?>" title="DELETAR"><i class="fa-solid fa-circle-xmark"></i></a>
          </td>
      </tbody>
    </table>
  </div>
        <?php 
                }
            }
        ?>
</section>
</div>
</body>
</html>