<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 400px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4 text-center">Criar Conta</h2>

            <?php if (isset($_GET['erro'])): ?>
                <div class="alert alert-danger py-2 small">
                    <?php
                    if ($_GET['erro'] === 'email_existe') echo "Este e-mail já está cadastrado!";
                    if ($_GET['erro'] === 'campos_vazios') echo "Por favor, preencha todos os campos.";
                    if ($_GET['erro'] === 'erro_salvar') echo "Erro técnico ao salvar no banco de dados.";
                    ?>
                </div>
            <?php endif; ?>

            <form action="../../controller/registrarcontroller.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-success w-100 mb-3">Cadastrar e Criar Conta</button>
                <div class="text-center">
                    <a href="login.php" class="text-decoration-none small">Voltar para o Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>