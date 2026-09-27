<?php
require_once '../includes/verificarsessao.php';
if ($_SESSION['usuario_admin'] != 1) { header('Location: dashboard.php'); exit; }
require_once '../../model/usuario.php';

$uModel = new Usuario();
$usuarios = $uModel->listarTodos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Usuários</h2>
    <table class="table">
        <thead><tr><th>Nome</th><th>Email</th><th>Ações</th></tr></thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?php echo htmlspecialchars($u['nome']); ?></td>
                <td><?php echo htmlspecialchars($u['email']); ?></td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="editar_usuario.php?id=<?php echo $u['id']; ?>" class="btn btn-primary" style="width: 100px;">Editar</a>
                        <a href="../../controller/usuariocontroller.php?acao=excluir&id=<?php echo $u['id']; ?>" class="btn btn-danger" style="width: 100px;">Remover</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn btn-secondary">Voltar</a>
</body>
</html>