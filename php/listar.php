<?php
// exibir um JSon

// incluir a conexão
include("conexao.php");

// sql
$sql = " SELECT * FROM cursos "; 

// executar
$executar = mysqli_query($conexao, $sql);

// vetor
$curso = [] ;

// indice 'qual posição'
$indice = 0 ;

// laço
while($linha = mysqli_fetch_assoc($executar)) {
    $curso[$indice]['idCurso'] = $linha['idCurso'];
    $curso[$indice]['nomeCurso'] = $linha['nomeCurso'];
    $curso[$indice]['valorCurso'] = $linha['valorCurso'];

    $indice++;

}

//guarda no JSON
json_encode(['curso' => $curso]);

var_dump($curso)

?>