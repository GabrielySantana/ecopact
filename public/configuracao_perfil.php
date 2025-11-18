<?php
include("conecta.php");
$id = 1; 

$sql = "SELECT * FROM usuarios WHERE id=$id";
$resultado = mysqli_query($conectar, $sql);
$usuario = mysqli_fetch_assoc($resultado);

//Atualiza os dados se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cliente = $_POST['cliente'];
    $descricao = $_POST['descricao'];
     
    $atualizar = "UPDATE usuarios 
                  SET nome='$nome', email='$email', cliente='$cliente', descricao='$descricao'
                  WHERE id=$id";

    if (mysqli_query($conectar, $atualizar)) {
        echo "Informações atualizadas com sucesso!";
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conectar);
    }
}
?>

<!-- Formulário HTML -->
<form method="POST" action="editar_perfil.php">
    <label>Nome completo:</label><br>
    <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"><br><br>

    <label>E-mail cadastrado:</label><br>
    <input type="text" name="email" value="<?php echo $usuario['email']; ?>"><br><br>

    <label>Cliente:</label><br>
    <input type="text" name="cliente" value="<?php echo $usuario['cliente']; ?>"><br><br>

    <label>Descrição breve (opcional):</label><br>
    <input type="text" name="descricao" value="<?php echo $usuario['descricao']; ?>"><br><br>

    <input type="submit" value="Editar informações">
</form>
