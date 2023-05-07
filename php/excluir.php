
<?php
// incluir a conexão
include("conexao.php");
echo "Conectando ao banco de dados api... ","<br>";

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
echo "Obtendo dados digitados...","<br>";
var_dump($obterDados);

try {
  $extrair = json_decode($obterDados, true);
} catch (Exception $e) {
  echo "Erro ao decodificar dados: " . $e->getMessage();
  exit();
}

//$extrair= json_decode($obterDados, true);
//echo "Extraindo dados do banco de dados...","<br>";

$idCurso = $extrair['idCurso'] ?? null;
echo "pegando o id do curso selecionado ...","<br>";

if (isset($extrair['idCurso'])) {
  $idCurso = $extrair['idCurso'];
  echo "Pegando o id do curso ... ";
} else {
  echo "Erro: dados inválidos.";
  exit();
}

// selecionar qual é o curso que será apagado de acordo com o id
$sql = "DELETE FROM cursos WHERE idCurso = $idCurso";
if (mysqli_query($conexao, $sql)) {
  echo "Registro removido com sucesso","<br>";
} else {
  echo "Erro ao remover registro: " . mysqli_error($conexao),"<br>";
}

?>
