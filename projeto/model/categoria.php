<?php
require_once 'conexao.php';

class Categoria {

    public function listar() {
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM categorias ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome) {
        $pdo = Conexao::conectar();
        $sql = "INSERT INTO categorias (nome) VALUES (:nome)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public function excluir($id) {
        $pdo = Conexao::conectar();
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>