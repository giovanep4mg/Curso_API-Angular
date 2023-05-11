<?php
// incluir a conexão
include("conexao.php");
// echo "Conectando ao banco de dados api... ";

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
// echo "Obtendo dados do banco de dados api...";

// extrair os dados do JSON
$extrair = json_decode($obterDados, true);
// echo "Extraindo dados do banco de dados..","<br>";

// fazer a verificação se foi extraido curso e nome, do banco de dados 
$idCurso = isset($extrair['curso']['idCurso']) ? $extrair ['curso']['idCurso'] : null;
$nomeCurso = isset($extrair['curso']['nomeCurso']) ? $extrair['curso']['nomeCurso'] : null;
$valorCurso = isset($extrair['curso']['valorCurso']) ? $extrair['curso']['valorCurso'] : null;

// vai acessar o banco de dados e fazer as modificações nos dados selecionados.
$sql = " UPDATE cursos SET nomeCurso = '$nomeCurso', valorCurso = $valorCurso WHERE idCurso = $idCurso";
// faz a conexão e executa a ação de atualizar dados.
mysqli_query($conexao, $sql);

// cria um vetor, e salva os dados atualizados
$cursos = [
    'idCurso' => $idCurso,
    'nomeCurso' => $nomeCurso,
    'valorCurso' =>  $valorCurso,
];
// echo "exportando os dados cadastrados...";

// converte os dados em JSON e depois envia 
echo json_encode(['cursos' => $cursos]);

/**
 * echo => serve para mostrar o que está sendo feito no código.
 * echo desativado para evitar dá erro quando for retorna um json.
 */

?>