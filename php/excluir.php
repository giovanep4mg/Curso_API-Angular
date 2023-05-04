<?php

// incluir a conexão
include("conexao.php");

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");

// extrair os dados do JSON
$extrair = json_decode($obterDados);

// separar os dados do JSON
$idCurso = $extrair->cursos->idCurso;

// sql
$sql = " DELETE FROM cursos WHERE idCurso = $idCurso ";
 mysqli_query($conexao, $sql);

?>