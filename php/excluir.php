
<?php
// incluir a conexão
include("conexao.php");
echo "Conectando ao banco de dados api... ","<br>";

$obterDados = $_POST['input'] ?? null;
echo "Obtendo dados digitados...","<br>";
var_dump($obterDados);

/*
// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
echo "Obtendo dados digitados...","<br>";
var_dump($obterDados);
var_dump($_POST);
*/


$extrair= json_decode($obterDados, true);
echo "Extraindo dados do banco de dados...","<br>";
var_dump($extrair);

$idCurso = $extrair['curso']['idCurso'] ?? null;
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
