<?php
// Para ter acesso ao banco de dados, o "api".


// Variáveis
$url = "localhost";
$usuario = "root";
$senha = "" ;
$base = "api";


//conexão
$conexao = mysqli_connect($url, $usuario, $senha, $base );

// verificar se está conectado 
//echo "Conectado ao banco de dados api ";


// arrumar caracteres especiais
mysqli_set_charset($conexao, "utf8");


?>