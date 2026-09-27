<?php
session_start();
require_once '../model/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $usuarioModel = new Usuario();
        
        if ($usuarioModel->cadastrar($nome, $email, $senha)) {
            header('Location: ../view/pages/login.php?sucesso=1');
            exit;
        } else {
            header('Location: ../view/pages/registrar.php?erro=erro_salvar');
            exit;
        }
    } else {
        header('Location: ../view/pages/registrar.php?erro=campos_vazios');
        exit;
    }
}