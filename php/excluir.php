<?php

// incluir a conexão
include("conexao.php");
echo "Conectando ao banco de dados api... ";

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
echo "Obtendo dados do banco de dados api...";

// extrair os dados do JSON
//$extrair = json_decode($obterDados);

$extrair = json_decode($obterDados, true);
echo "extrair dados...";

// separar os dados do JSON
//$idCurso = $extrair->cursos->idCurso;
$idCurso = $extrair['cursos']['idCurso'] ?? null;
echo "Pegando o id do curso ... ";


// verificar se o id do curso foi fornecido
if ($idCurso == null) {
    echo "Não está pegando o id do curso";
  exit();
  }

  // selecionar qual é o curso que será apagado de acordo com o id
  $sql = " DELETE FROM cursos WHERE idCurso = $idCurso ";
  mysqli_query($conexao, $sql);

// executar a consulta se foi removido ou não
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