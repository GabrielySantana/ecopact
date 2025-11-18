<?php
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar_senha'];

$con = mysqli_connect('localhost','root','','ecopact');
$verifica = mysqli_query($con,"SELECT * FROM login WHERE email='$email' AND senha='$senha' AND confirmar_senha='$confirmar'");

if(mysqli_num_rows($verifica) > 0){
    echo "<h1>Login realizado com sucesso!</h1><br>";
    echo "<a href='home.html'>Ir para a página inicial</a>";
}else{
    echo "<h1>Email ou senha incorretos!</h1><br>";
    echo "<a href='login.html'>Tentar novamente</a>";
}
?>

