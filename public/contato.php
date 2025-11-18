<?php
// Conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'ecopact');

// Verifica se o formulário foi enviado
if(!empty($_POST)){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

// Insere os dados na tabela contato
 $grava = mysqli_query($con, "INSERT INTO contato (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')");

if($grava){
     echo "<h1>Mensagem enviada com sucesso!</h1>";
     echo "<a href='contato.html'>Voltar</a>";
 }else{
     echo "<h1>Erro ao enviar mensagem!</h1>";
     echo "<a href='contato.html'>Tentar novamente</a>";
 }
}
?>
