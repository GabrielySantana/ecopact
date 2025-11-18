<form action="busca_cliente.php" method="POST">
    Digite o nome do cliente:
    <input type="text" name="nomec"/>
    <input type="submit" value="Buscar Cliente"/>
</form>

<?php
$con = mysqli_connect('localhost','root','','ecopact');

if(!empty($_POST)){
    $parametro = $_POST['nomec'];
    $resultados = mysqli_query($con,"SELECT * FROM cliente WHERE cliente LIKE '%$parametro%'");
}else{
    $resultados = mysqli_query($con,"SELECT * FROM cliente");
}
?>

<table border="1">
<tr>
    <td>ID</td>
    <td>Nome</td>
    <td>Email</td>
    <td>Telefone</td>
    <td>RG</td>
    <td>CPF</td>
    <td>Excluir</td>
    <td>Editar</td>
</tr>

<?php
while($exibir = mysqli_fetch_array($resultados)){
?>
<tr>
    <td><?php echo $exibir['id_cliente'];?></td>
    <td><?php echo $exibir['cliente'];?></td>
    <td><?php echo $exibir['email'];?></td>
    <td><?php echo $exibir['tel'];?></td>
    <td><?php echo $exibir['rg'];?></td>
    <td><?php echo $exibir['cpf'];?></td>
    <td><a href="excluir_cliente.php?id=<?php echo $exibir['id_cliente'];?>">Excluir</a></td>
    <td><a href="editar_cliente.php?id=<?php echo $exibir['id_cliente'];?>">Editar</a></td>
</tr>
<?php
}
?>
</table>
