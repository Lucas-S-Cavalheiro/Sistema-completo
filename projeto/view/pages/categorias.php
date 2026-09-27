<?php
require_once '../includes/verificarsessao.php';
require_once '../../model/categoria.php';

$categoriaModel = new Categoria();
$listaCategorias = $categoriaModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Sistema de Estoque</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link active" href="categorias.php">Categorias</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../controller/logoutcontroller.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <h2 class="mb-4">Categorias</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Nova Categoria
                </div>
                <div class="card-body">
                    <form action="../../controller/categoriacontroller.php" method="POST">
                        <input type="hidden" name="acao" value="cadastrar">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Categoria</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Salvar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaCategorias as $cat): ?>
                            <tr>
                                <td><?php echo $cat['id']; ?></td>
                                <td><?php echo htmlspecialchars($cat['nome']); ?></td>
                                <td>
                                    <a href="produtos.php?categoria_id=<?php echo $cat['id']; ?>" class="btn btn-sm btn-success">+ Produto</a>
                                    <a href="../../controller/categoriacontroller.php?acao=excluir&id=<?php echo $cat['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            
                            <?php if(empty($listaCategorias)): ?>
                            <tr>
                                <td colspan="3" class="text-center">Nenhuma categoria cadastrada.</td>
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