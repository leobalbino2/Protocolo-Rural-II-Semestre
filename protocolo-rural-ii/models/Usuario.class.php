<?php

class Usuario {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    public function buscarPorId($id) {
        $sql = "SELECT nome, email, celular FROM usuarios WHERE id_usuario = :id AND ativo = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}