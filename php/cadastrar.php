<?php

// incluir a conexão
include("conexao.php");

// obter dados "dados que serão digitados"
$obterDados = file_get_contents("php://input");
// echo "Obtendo dados digitados","<br>";

$extrair = json_decode($obterDados, true);
// echo "Extraindo dados do banco de dados..","<br>";

// fazer a verificação se foi extraido curso e nome, do banco de dados   
  $nomeCurso = isset($extrair['curso']['nomeCurso']) ? $extrair['curso']['nomeCurso'] : null;
  $valorCurso = isset($extrair['curso']['valorCurso']) ? $extrair['curso']['valorCurso'] : null;


// sql para entrar no banco de dados e inserir os dados 
$sql = "INSERT INTO cursos (nomeCurso, valorCurso) VALUES ('$nomeCurso', '$valorCurso')";
mysqli_query($conexao, $sql);

// exporta os dados cadatrados
$cursos = [
    'nomeCurso' => $nomeCurso,
    'valorCurso' =>  $valorCurso,
];

//para ser exportado e exibido na tela
echo json_encode(['cursos' => $cursos]);
// echo "guardando no json ";

/**
 *  echo => são para mostrar o que está acontecendo com os comandos executados.
 * deixe somente o " echo json_encode(['cursos' => $cursos]);" que irá retorna o resultado do comando cadastrar.
 * 
 * os outros "echo" deixe desativados para não dá erro.
 */



?>