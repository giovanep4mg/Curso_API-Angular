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

//$idCurso = $extrair['cursos']['idCurso'] ?? null;
// $nomeCurso = $extrair['cursos']['nomeCurso'] ?? null;
// $valorCurso = $extrair['cursos']['valorCurso'] ?? null;

// sql
$sql = " UPDATE cursos SET nomeCurso = '$nomeCurso', valorCurso = $valorCurso WHERE idCurso = $idCurso";
mysqli_query($conexao, $sql);


// exporta os dados cadatrados
$cursos = [
    'idCurso' => $idCurso,
    'nomeCurso' => $nomeCurso,
    'valorCurso' =>  $valorCurso,
];
// echo "exportando os dados cadastrados...";



// mostra mas detalhes do está sendo exportado
echo json_encode(['cursos' => $cursos]);

// exibi no front end
// json_encode(['curso' => $cursos]);
// echo "exibir os dados dados...";

/**
 * echo desativado para evitar dá erro quando for retorna um json.
 */

?>