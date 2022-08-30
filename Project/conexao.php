<?php

$host = "localhost";
$db = "clientes";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli -> connect_errno){
    die("Falha na conexão com o DB");
}

function formataData($data){
    return implode('/', array_reverse(explode('-', $data)));//explode serve dividir uma string em strings, o implode serve para adicionar a / e o array_reverse serve para retornar um array com os elementos na ordem inversa.
}

function formataTelefone($telefone){
    if(!empty($telefone)){
        $ddd = substr($telefone, 0 , 2);
        $parte1 = substr($telefone, 2, 5);
        $parte2 = substr($telefone, 7);
        return "($ddd) $parte1-$parte2";
    }//Tudo isso aqui em cima serve para fazer com que o telefone apareça direitinho na hora da pessoa olhar o relatório de clientes cadastrados.
}

