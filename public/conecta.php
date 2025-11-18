<?php
//conecta com o banco
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = ""; 

$conecta = mysqli_connect($servidor, $usuario, $senha, $ecopact);

if (!$conecta) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
