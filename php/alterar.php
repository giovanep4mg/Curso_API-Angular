<?php

// incluir a conexão
include("conexao.php");

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");

// extrair os dados do JSON
$extrair = json_decode($obterDados);

// separar os dados do JSON
$idCurso = $extrair->cursos->idCurso;
$nomeCurso = $extrair->cursos->nomeCurso;
$valorCurso = $extrair->cursos->valorCurso;

// sql
$sql = " UPDATE cursos SET nomeCursos = '$nomeCurso', valorCurso = $valorCurso WHERE idCurso = $idCurso";
mysqli_query($conexao, $sql);


// exporta os dados cadatrados
$curso = [
    'idCurso' => $idCurso,
    'nomeCurso' => $nomeCurso,
    'valorCurso' =>  $valorCurso,
];

// echo json_encode(["curso"] => $curso);

json_encode(" ['curso'] => $curso ");


?>