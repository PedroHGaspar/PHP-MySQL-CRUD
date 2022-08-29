<?php
include('conexao.php');

$sql_clientes = "SELECT * FROM clientes";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
  <h1>Estes são os clientes cadastrados no seu sistema:</h1>
  <div class="tbl-header">
    <table>
      <thead>
        <tr>
          <th>ssss</th>
          <th>sddasasd</th>
          <th>dsasdadas</th>
          <th>dsasda</th>
          <th>asdsd</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table>
      <tbody>
        <tr>
          <td>asdds</td>
          <td>dasdas</td>
          <td>asdasd</td>
          <td>dasdas</td>
          <td>asdasd</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
</div>
</body>
</html>