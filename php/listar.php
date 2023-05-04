<?php
// exibir um JSon

// incluir a conexão
include("conexao.php");

// sql
$sql = " SELECT * FROM cursos "; 

// executar
$executar = mysqli_query($conexao, $sql);

// vetor
$cursos = [] ;

// indice 'qual posição'
$indice = 0 ;

// laço
while($linha = mysqli_fetch_assoc($executar)) {
    $cursos[$indice]['idCurso'] = $linha['idCurso'];
    $cursos[$indice]['nomeCurso'] = $linha['nomeCurso'];
    $cursos[$indice]['valorCurso'] = $linha['valorCurso'];

    $indice++;

}

//guarda no JSON
json_encode(['cursos' => $cursos]);

 // var_dump($curso) //nao está sendo listada

echo  json_encode($cursos)

?>