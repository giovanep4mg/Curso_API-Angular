<?php

// incluir a conexão
include("conexao.php");

// obter dados "dados que serão digitados"
$obterDados = file_get_contents("php://input");
echo "Obtendo dados digitados","<br>";

$extrair = json_decode($obterDados, true);
echo "Extraindo dados do banco de dados..","<br>";

$nomeCurso = $extrair['curso']['nomeCurso'];
$valorCurso = $extrair['curso']['valorCurso'];
echo "pegando o nome e valor ..","<br>";

if (isset($extrair['curso']['nomeCurso'])) {    
        $nomeCurso = $extrair['curso']['nomeCurso'];
} else {  
        $nomeCurso = null;
}

    if (isset($extrair['curso']['valorCurso'])) {
        $valorCurso = $extrair['curso']['valorCurso'];
    } else {
        $valorCurso = null;
    }




// sql
$sql = "INSERT INTO cursos (nomeCurso, valorCurso) VALUES ('$nomeCurso', '$valorCurso')";
mysqli_query($conexao, $sql);



// exporta os dados cadatrados
$cursos = [
    'nomeCurso' => $nomeCurso,
    'valorCurso' =>  $valorCurso,
];

echo json_encode(['cursos' => $cursos]);
echo "guardando no json ";





?>