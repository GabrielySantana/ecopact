<?php
$con = mysqli_connect('localhost','root','','ecopact');
if (!$con) die("Erro na conexão: " . mysqli_connect_error());

$id = $_GET['id'] ?? 0;

$delete = mysqli_query($con, "DELETE FROM cliente WHERE id_cliente=$id");
if($delete){
    echo "<script>alert('Cliente excluído!'); window.location='listar_clientes.php';</script>";
} else {
    echo "<script>alert('Erro ao excluir!'); window.history.back();</script>";
}
?>
