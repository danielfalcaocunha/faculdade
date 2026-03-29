<?php
require_once '28.conexao.php';

//Preparação e consulta no banco de dados
$instrucaoSQL = "SELECT * FROM cliente";

try {
    //Execução da consulta
    $resultset = $dsn->query($instrucaoSQL);
    echo "Consulta executada com sucesso!<br>";

    //Exibição dos resultados
    foreach ($resultset as $row) {
        $cpfFormatado = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $row['cpf_cliente']);
        echo "ID: {$row['id_cliente']} | Nome: {$row['nome_cliente']} | CPF: {$cpfFormatado} | email: {$row['email_cliente']}<br><br>";
    }
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}

?>