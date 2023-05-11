<?php
// cria um json com todos os cursos

// incluir a conexão
include("conexao.php");

// o que vai fazer no banco de dados "api"
$sql = " SELECT * FROM cursos "; 

// "mysqli_query()" vai executar os parâmetros passados dentro do parênteses.
$executar = mysqli_query($conexao, $sql);

// $cursos => vai guarda um vetor, uma lista de todos os cursos
$cursos = [] ;

// indice 'qual posição'
$indice = 0 ;

// laço repetir isso até o indice ser maior que o real.
while($linha = mysqli_fetch_assoc($executar)) {
    $cursos[$indice]['idCurso'] = $linha['idCurso'];
    $cursos[$indice]['nomeCurso'] = $linha['nomeCurso'];
    $cursos[$indice]['valorCurso'] = $linha['valorCurso'];

    $indice++;
}
// variável curso, vai seguir o indice , passando e pegando os dados e salvando na variável $cursos.

 // para ser exibido no "http://localhost/api/php/listar.php" 
 // mas deve ser desativado para não dá erro no código.
 // var_dump($curso) //nao está sendo listada

 // cria um json, que será transmitido para o front-end.
echo  json_encode($cursos)

?>