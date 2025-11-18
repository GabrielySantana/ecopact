<?php
$con = mysqli_connect('localhost','root','','ecopact');
if (!$con) die("Erro na conexão: " . mysqli_connect_error());

$parametro = $_POST['nome_cliente'] ?? '';

if($parametro != ''){
    $resultados = mysqli_query($con, "SELECT * FROM cliente WHERE cliente LIKE '%$parametro%'");
} else {
    $resultados = mysqli_query($con, "SELECT * FROM cliente");
}
?>

<form method="POST" action="">
    Buscar cliente: <input type="text" name="nome_cliente">
    <input type="submit" value="Buscar">
</form>

<table border="1">
<tr>
    <td>ID</td>
    <td>Nome</td>
    <td>Email</td>
    <td>Telefone</td>
    <td>CPF</td>
    <td>Editar</td>
    <td>Excluir</td>
</tr>

<?php
while($cliente = mysqli_fetch_array($resultados)){
?>
<tr>
    <td><?php echo $cliente['id_cliente']; ?></td>
    <td><?php echo $cliente['cliente']; ?></td>
    <td><?php echo $cliente['email']; ?></td>
    <td><?php echo $cliente['tel']; ?></td>
    <td><?php echo $cliente['cpf']; ?></td>
    <td><a href="editar_cliente.php?id=<?php echo $cliente['id_cliente']; ?>">Editar</a></td>
    <td><a href="excluir_cliente.php?id=<?php echo $cliente['id_cliente']; ?>">Excluir</a></td>
</tr>
<?php
}
?>
</table>
