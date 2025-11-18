<?php
session_start(); // inicia sessão
session_destroy(); // destrói todas as variáveis da sessão

echo "<h1>Logout realizado com sucesso!</h1><br>";
echo "<a href='login.html'>Voltar para o login</a>";
?>
