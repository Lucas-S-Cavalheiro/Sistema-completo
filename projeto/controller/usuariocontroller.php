<?php
require_once '../model/usuario.php';

$acao = $_GET['acao'] ?? '';
$u = new Usuario();

if ($acao == 'editar') {
    $u->atualizar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']);
    header('Location: ../view/pages/usuarios.php');
    exit;
} elseif ($acao == 'excluir') {
    $u->excluir($_GET['id']);
    header('Location: ../view/pages/usuarios.php');
    exit;
}