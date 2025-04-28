<?php  

// arquivo de conexao
require "conexao.php";

$dados_banco = $pdo->query("SELECT nome FROM tabela ");

echo json_encode($dados_banco->fetchAll(PDO::FETCH_ASSOC));


/**
 * Coloca dados da tabela da sua escolha.
 * 
 */
?>