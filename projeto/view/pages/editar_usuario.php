<?php
require_once '../includes/verificarsessao.php';
require_once '../../model/usuario.php';

$id = $_GET['id'] ?? null;
$uModel = new Usuario();
$usuario = $uModel->buscarPorId($id); // Você precisará criar este método no Model
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Editar Usuário</h2>
    <form action="../../controller/usuariocontroller.php?acao=editar" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $usuario['nome']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Nova Senha (deixe vazio para manter):</label>
            <input type="password" name="senha" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>