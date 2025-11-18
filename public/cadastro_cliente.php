<?php
require('conectar.php'); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

// Verifica se as senhas coincidem
if ($senha !== $confirmar_senha) {
    echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
     exit;
}

    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Insere na tabela cliente
$sql_cliente = "INSERT INTO cliente (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

if (mysqli_query($conexao, $sql_cliente)) {
// Pega o ID do cliente recém cadastrado
 $id_cliente = mysqli_insert_id($conexao);

 // Insere login vinculado
 $sql_login = "INSERT INTO login (id_cliente, email, senha) VALUES ('$id_cliente', '$email', '$senha_hash')";

if (mysqli_query($conexao, $sql_login)) {
    echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.html';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar login!'); window.history.back();</script>";
 }
 } else {
     echo "<script>alert('Erro ao cadastrar cliente!'); window.history.back();</script>";
}
}
?>
