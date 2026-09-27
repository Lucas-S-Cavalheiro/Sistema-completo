<?php
require_once 'conexao.php';

class Produto {
    public function listar() {
        $pdo = Conexao::conectar();
        $sql = "SELECT p.*, c.nome as categoria_nome FROM produtos p JOIN categorias c ON p.categoria_id = c.id";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

        public function cadastrar($nome, $preco, $estoque, $categoria_id) {
        $pdo = Conexao::conectar();
        $sql = "INSERT INTO produtos (nome, preco, estoque, categoria_id) 
                VALUES (:nome, :preco, :estoque, :categoria_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':categoria_id', $categoria_id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $pdo = Conexao::conectar();
        $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}