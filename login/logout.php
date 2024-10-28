<?php
session_start();
session_destroy(); // Destroi a sessão atual
header("Location: login.php"); // Redireciona para o login
exit();
?>
