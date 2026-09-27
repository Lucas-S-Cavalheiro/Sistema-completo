<?php
session_start();
require_once '../model/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuarioModel = new Usuario();
    $usuario = $usuarioModel->buscarPorEmail($email);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_admin'] = $usuario['admin']; 
        header('Location: ../view/pages/dashboard.php');
        exit;
    } else {
        echo "Email ou senha inválidos.";
    }
}