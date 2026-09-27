<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 400px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4 text-center">Login</h2>

            <?php if (isset($_GET['erro']) && $_GET['erro'] === 'invalido'): ?>
                <div class="alert alert-danger py-2 small text-center">
                    E-mail ou senha inválidos!
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'cadastrado'): ?>
                <div class="alert alert-success py-2 small text-center">
                    Conta criada com sucesso! Faça o seu login abaixo.
                </div>
            <?php endif; ?>

            <form action="../../controller/logincontroller.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
                
                <hr>
                
                <div class="text-center">
                    <a href="registrar.php" class="btn btn-outline-secondary btn-sm w-100">Criar novo usuário</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>