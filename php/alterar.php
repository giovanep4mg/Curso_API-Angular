<?php

// incluir a conexão
include("conexao.php");
echo "Conectando ao banco de dados api... ";

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
echo "Obtendo dados do banco de dados api...";

// extrair os dados do JSON
$extrair = json_decode($obterDados);
echo "extrair dados...";

// separar os dados do JSON
 $idCurso = $extrair->cursos->idCurso ?? null;
 $nomeCurso = $extrair->cursos->nomeCurso ?? null;
 $valorCurso = $extrair->cursos->valorCurso ?? null;
 echo "Separando os dados...";

//$idCurso = $extrair['cursos']['idCurso'] ?? null;
// $nomeCurso = $extrair['cursos']['nomeCurso'] ?? null;
// $valorCurso = $extrair['cursos']['valorCurso'] ?? null;

// sql
$sql = " UPDATE cursos SET nomeCursos = '$nomeCurso', valorCurso = $valorCurso WHERE idCurso = $idCurso";
mysqli_query($conexao, $sql);


// exporta os dados cadatrados
$cursos = [
    'idCurso' => $idCurso,
    'nomeCurso' => $nomeCurso,
    'valorCurso' =>  $valorCurso,
];
echo "exportando os dados cadastrados...";



// mostra mas detalhes do está sendo exportado
// echo json_encode(["curso"] => $curso);

// exibi no front end
json_encode(['cursos' => $cursos]);
echo "exibir os dados dados...";


?>