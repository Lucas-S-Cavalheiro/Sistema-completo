<?php
require_once 'conexao.php';

class Usuario {
    public function listarTodos() {
        $pdo = Conexao::conectar();
        $stmt = $pdo->query("SELECT id, nome, email, admin FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluir($id) {
        $pdo = Conexao::conectar();
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id AND id != 1");
        $stmt->execute(['id' => $id]);
    }
    
    public function buscarPorEmail($email) {
        $pdo = Conexao::conectar();
        $stmt = $pdo->prepare("SELECT id, nome, senha, admin FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $pdo = Conexao::conectar();
        $stmt = $pdo->prepare("SELECT id, nome, email FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $email, $senha = null) {
        $pdo = Conexao::conectar();
        if (!empty($senha)) {
            $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            return $pdo->prepare($sql)->execute(['id' => $id, 'nome' => $nome, 'email' => $email, 'senha' => $senhaCripto]);
        } else {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
            return $pdo->prepare($sql)->execute(['id' => $id, 'nome' => $nome, 'email' => $email]);
        }
    }

    public function cadastrar($nome, $email, $senha) {
        $pdo = Conexao::conectar();
        $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $senhaCripto]);
    }
}