<?php

// incluir a conexão
include("conexao.php");
echo "conectando ao banco de dados do banco  ";

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
echo "obtendo dados do banco  ";


// extrair os dados do JSON
//$extrair = json_decode($obterDados);

$extrair = json_decode($obterDados, true);
echo "extraindo dados do banco  ";


// separar os dados do JSON
//$idCurso = $extrair->cursos->idCurso;
$idCurso = $extrair['cursos']['idCurso'] ?? null;
echo "Pegando o id do curso  ";


// verificar se o id do curso foi fornecido
if ($idCurso === null) {
  
    echo "Não está pegando o id do curso";
    
   
  exit();
  }

  // conectar ao banco e fazer a veirificação
  $sql = " DELETE FROM cursos WHERE idCurso = $idCurso ";
  mysqli_query($conexao, $sql);

// executar a consulta
if (mysqli_query($conexao, $sql)) {
    echo "Registro removido com sucesso.";
} else {
    echo "Erro ao remover registro: " . mysqli_error($conexao);
}

     // sql
   //  $sql = " DELETE FROM cursos WHERE idCurso = $idCurso ";
     //   mysqli_query($conexao, $sql);
 //    echo " Está conectado ao banco de dados";

?>