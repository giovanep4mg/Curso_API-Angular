<?php

// incluir a conexão
include("conexao.php");
// echo "Conectando ao banco de dados api... ";

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
// echo "Obtendo dados do banco de dados api...";

/*
//verificaação se está recebendo algo ou não.
if($obterDados == null){
  echo "Obter dados está como null";
}
*/

// extrair os dados do JSON
$extrair = json_decode($obterDados, true);
// echo "Extraindo dados do banco de dados..","<br>";

// para saber o que está sendo recebido aqui
//echo +$extrair;

// fazer a verificação se foi extraido curso e nome, do banco de dados 
$idCurso = isset($extrair['curso']['idCurso']) ? $extrair ['curso']['idCurso'] : null;

// para saber o que está sendo recebido aqui
//echo +$idCurso;

// sql
$sql = " DELETE FROM cursos WHERE idCurso = $idCurso";
mysqli_query($conexao, $sql);



/**
 * echo desativado para evitar dá erro quando for retorna um json.
 */

?>