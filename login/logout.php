<?php
session_start();
session_destroy(); // Destroi a sessão atual
header("Location: inicio.php"); // Redireciona para o login
exit();
?>
