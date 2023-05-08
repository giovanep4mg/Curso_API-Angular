<?php
// incluir a conexão
include("conexao.php");
// echo "Conectando ao banco de dados api... ","<br>";

$obterDados = file_get_contents("php://input");


$extrair= json_decode($obterDados, true);

$idCurso = $extrair['curso']['idCurso'] ?? null;
// echo "pegando o id do curso selecionado ...","<br>";

if (isset($extrair['curso']['idCurso'])) {
  $idCurso = $extrair['idCurso'];
  // echo "Pegando o id do curso ... ";
} else {
  echo json_encode(array('error' => 'Dados inválidos.'));
  exit();
}

// selecionar qual é o curso que será apagado de acordo com o id
$sql = "DELETE FROM cursos WHERE idCurso = $idCurso";
if (mysqli_query($conexao, $sql)) {
  echo json_encode(array('success' => 'Registro removido com sucesso'));
} else {
  echo json_encode(array('error' => 'Erro ao remover registro: ' . mysqli_error($conexao)));
}
?>
