<?php
require_once '../includes/verificarsessao.php';
require_once '../../model/produto.php';
require_once '../../model/categoria.php';

$produtoModel = new Produto();
$categoriaModel = new Categoria();

$listaProdutos = $produtoModel->listar();
$listaCategorias = $categoriaModel->listar();
$categoriaSelecionada = $_GET['categoria_id'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Sistema de Estoque</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="categorias.php">Categorias</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../controller/logoutcontroller.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <a href="dashboard.php" class="btn btn-secondary mb-3">&larr; Voltar</a>
    <h2 class="mb-4">Produtos</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Novo Produto
                </div>
                <div class="card-body">
                    <?php if (empty($listaCategorias)): ?>
                        <p class="text-danger">Cadastre uma categoria antes de adicionar produtos.</p>
                    <?php else: ?>
                    <form action="../../controller/produtocontroller.php" method="POST">
                        <input type="hidden" name="acao" value="cadastrar">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="preco" class="form-label">Preço</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="preco" name="preco" required>
                        </div>
                        <div class="mb-3">
                            <label for="estoque" class="form-label">Quantidade em Estoque</label>
                            <input type="number" min="0" class="form-control" id="estoque" name="estoque" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Categoria</label>
                            <select class="form-select" id="categoria_id" name="categoria_id" required>
                                <option value="">Selecione...</option>
                                <?php foreach ($listaCategorias as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>" <?php if ($categoriaSelecionada == $cat['id']) echo 'selected'; ?>><?php echo htmlspecialchars($cat['nome']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Salvar</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaProdutos as $prod): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($prod['nome']); ?></td>
                                <td><?php echo htmlspecialchars($prod['categoria_nome']); ?></td>
                                <td>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
                                <td><?php echo $prod['estoque']; ?></td>
                                <td>
                                    <a href="../../controller/produtocontroller.php?acao=excluir&id=<?php echo $prod['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            <?php if (empty($listaProdutos)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Nenhum produto cadastrado.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>