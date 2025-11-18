<?php
$con = mysqli_connect('localhost','root','','ecopact');
if (!$con) die("Erro na conexão: " . mysqli_connect_error());

$id = $_GET['id'] ?? 0;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['cliente'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $cpf = $_POST['cpf'];

    $update = mysqli_query($con, "UPDATE cliente SET cliente='$nome', email='$email', tel='$tel', cpf='$cpf' WHERE id_cliente=$id");
    if($update){
        echo "<script>alert('Cliente atualizado!'); window.location='listar_clientes.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar!'); window.history.back();</script>";
    }
}

$result = mysqli_query($con, "SELECT * FROM cliente WHERE id_cliente=$id");
$cliente = mysqli_fetch_assoc($result);
?>

<form method="POST" action="">
    Nome: <input type="text" name="cliente" value="<?php echo $cliente['cliente']; ?>"><br>
    Email: <input type="email" name="email" value="<?php echo $cliente['email']; ?>"><br>
    Telefone: <input type="text" name="tel" value="<?php echo $cliente['tel']; ?>"><br>
    CPF: <input type="text" name="cpf" value="<?php echo $cliente['cpf']; ?>"><br>
    <input type="submit" value="Atualizar">
</form>
