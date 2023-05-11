<?php
// Para ter acesso ao banco de dados, o "api".

// Variáveis
$url = "localhost";
$usuario = "root";
$senha = "" ;
$base = "api";

//conexão
$conexao = mysqli_connect($url, $usuario, $senha, $base );

// verificar se a conexão foi realizada ou não, se não foi será exibida essa mensagem.
if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
  }

// arrumar caracteres especiais
mysqli_set_charset($conexao, "utf8");

?>