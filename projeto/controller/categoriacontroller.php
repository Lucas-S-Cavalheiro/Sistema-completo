<?php
session_start();
require_once '../model/categoria.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../view/pages/login.php');
    exit;
}

$categoriaModel = new Categoria();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        $nome = trim($_POST['nome']);
        
        if (!empty($nome)) {
            $categoriaModel->cadastrar($nome);
        }

        header('Location: ../view/pages/categorias.php');
        exit;
    }
}

if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $categoriaModel->excluir($id);
    header('Location: ../view/pages/categorias.php');
    exit;
}
?>