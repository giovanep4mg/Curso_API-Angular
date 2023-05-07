<?php

// incluir a conexão
include("conexao.php");

// obter dados "dados que serão enviados"
$obterDados = file_get_contents("php://input");
echo "Obtendo dados digitados","<br>";

// extrair os dados do JSON
// $extrair = json_decode($obterDados);

$extrair = json_decode($obterDados, true);
echo "Extraindo dados do banco de dados..","<br>";

if (isset($extrair['cursos']['nomeCurso'])) {    
        $nomeCurso = $extrair['cursos']['nomeCurso'];
} else {  
        $nomeCurso = null;
}

    if (isset($extrair['cursos']['valorCurso'])) {
        $valorCurso = $extrair['cursos']['valorCurso'];
    } else {
        $valorCurso = null;
    }


//$nomeCurso = $extrair['curso']['nomeCurso'];
//$valorCurso = $extrair['curso']['valorCurso'];
//echo "pegando o nome e valor ..","<br>";

// separar os dados do JSON
 //$nomeCurso = $extrair->cursos->nomeCurso;
 //$valorCurso = $extrair->cursos->valorCurso;

//$nomeCurso = $extrair['cursos']['nomeCurso'] ?? null;
//$valorCurso= $extrair['cursos']['valorCurso'] ?? null;

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

//echo  json_encode($cursos)



?>