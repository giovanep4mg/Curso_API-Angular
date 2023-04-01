<?php


// incluir a conexão
include("conexao.php");

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php:// input");

// extrair os dados do JSON
$extrair = json_decode($obterDados);

// separar os dados do JSON
$nomeCurso = $extrair->cursos->nomeCurso;
$valorCurso = $extrair->cursos->valorCurso;

// sql
$sql = "INSERT INTO cursos (nomeCurso, valorCurso) VALUES ('nomeCurso', $valorCurso)";
mysqli_query($conexao, $sql);



// exporta os dados cadatrados
$curso = [
    'nomeCurso' => $nomeCurso,
    'valorCurso' =>  $valorCurso
]

json_encode(["curso"] => $curso);



?>