<?php
require_once __DIR__ . '/../includes/verificarsessao.php';
require_once __DIR__ . '/../../model/produto.php';

$produtoModel = new Produto();
$listaProdutos = $produtoModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Estoque</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="../../controller/logoutcontroller.php">Sair</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-4">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h2>
        <?php if ($_SESSION['usuario_admin'] == 1): ?>
            <a href="usuarios.php" class="btn btn-warning">Gerenciar Usuários</a>
            <a href="produtos.php" class="btn btn-primary">Gerenciar Produtos</a>
        <?php endif; ?>
    </div>
    <table class="table">
        <thead>
            <tr><th>Nome</th><th>Categoria</th><th>Preço</th><th>Qtd</th><?php if($_SESSION['usuario_admin']==1) echo '<th>Ações</th>'; ?></tr>
        </thead>
        <tbody>
            <?php foreach ($listaProdutos as $prod): ?>
            <tr>
                <td><?php echo htmlspecialchars($prod['nome']); ?></td>
                <td><?php echo htmlspecialchars($prod['categoria_nome']); ?></td>
                <td>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
                <td><?php echo $prod['estoque']; ?></td>
                <?php if ($_SESSION['usuario_admin'] == 1): ?>
                <td>
                    <a href="editar_produto.php?id=<?php echo $prod['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                    <a href="../../controller/produtocontroller.php?acao=excluir&id=<?php echo $prod['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>