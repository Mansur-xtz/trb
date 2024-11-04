<?php

ob_start(); // Inicia o buffer de saída
session_start(); // Inicia a sessão para armazenar o login
require __DIR__. "/app/model/Userbanco.php";
require __DIR__ . "/app/Controller/ValidarUsuario.php";
require __DIR__ . "/app/Controller/CadastrarUsuario.php";

require __DIR__ . "/header.php";



if (!isset($_POST['usuario']) || !isset($_POST['senha'])) {
    header("Location: ./inicio.php");
    exit();
}

if ($_POST['usuario'] == "") {
    $mensagem = '
        <div class="notification is-danger">
            <button class="delete"></button>
            Usuário vazio
        </div>';
    die($mensagem);
}

if ($_POST['senha'] == "") {
    $mensagem = '
        <div class="notification is-danger">
            <button class="delete"></button>
            Senha vazia
        </div>';
    die($mensagem);
}

if($_GET['acao']=='login'){
 (new ValidarUsuario())->retornar();

    exit();
}
if($_GET['acao']=='cadastra'){
    (new CadastrarUsuario())->retornar();
   
       exit();
   }

