<?php
session_start();
if (!isset($_SESSION['usuario_admin']) || $_SESSION['usuario_admin'] != 1) {
    header('Location: ../view/pages/dashboard.php');
    exit;
}

require_once '../model/produto.php';
$p = new Produto();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        $nome = trim($_POST['nome']);
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];
        $categoria_id = $_POST['categoria_id'];

        if (!empty($nome) && !empty($categoria_id)) {
            $p->cadastrar($nome, $preco, $estoque, $categoria_id);
        }

        header('Location: ../view/pages/produtos.php');
        exit;
    }
}
$acao = $_GET['acao'] ?? '';
$id = $_GET['id'] ?? '';

if ($acao == 'excluir' && $id) {
    $p = new Produto();
    $p->excluir($id);
    header('Location: ../view/pages/dashboard.php');
    exit;
}