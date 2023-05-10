<?php
header('Content-Type: application/json');

// Incluir a conexão com o banco de dados
include("conexao.php");

// Obter o ID do curso a ser removido da query string
$idCurso = $_GET['idCurso'];

// Verificar se o ID do curso está presente
if (!$idCurso) {
  $response = array(
    'success' => false,
    'message' => 'ID do curso não fornecido'
  );
  echo json_encode($response);
  exit;
}

// Preparar a declaração SQL para remover o curso
$sql = "DELETE FROM cursos WHERE idCurso = ?";

// Preparar a declaração
$stmt = $conexao->prepare($sql);

// Verificar se a preparação da declaração falhou
if (!$stmt) {
  $response = array(
    'success' => false,
    'message' => 'Erro na preparação da declaração SQL'
  );
  echo json_encode($response);
  exit;
}

// Vincular o parâmetro ID do curso à declaração
$stmt->bind_param('i', $idCurso);

// Executar a declaração
if ($stmt->execute()) {
  // Remoção bem-sucedida
  $response = array(
    'success' => true,
    'message' => 'Curso removido com sucesso'
  );
  echo json_encode($response);
} else {
  // Erro ao remover o curso
  $response = array(
    'success' => false,
    'message' => 'Erro ao remover o curso'
  );
  echo json_encode($response);
}

// Fechar a declaração e a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>
