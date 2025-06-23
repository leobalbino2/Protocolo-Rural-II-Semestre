<?php

class Usuario
{
    public function __construct(
        private PDO $conn,
        private int $id_usuario = 0,
        private string $nome = "",
        private string $email = "",
        private string $celular = "",
        private string $senha = ""
    ) {}

    // Getters
    public function getIdUsuario(): int 
    { 
        return $this->id_usuario; 
    }

    public function getNome(): string 
    { 
        return $this->nome; 
    }

    public function getEmail(): string 
    { 
        return $this->email; 
    }

    public function getCelular(): string 
    { 
        return $this->celular; 
    }

    public function getSenha(): string 
    { 
        return $this->senha; 
    }

    // Setters
    public function setNome(string $nome): void 
    {
         $this->nome = $nome; 
    }

    public function setEmail(string $email): void 
    { 
        $this->email = $email; 
    }
    public function setCelular(string $celular): void 
    { 
        $this->celular = $celular; 
    }

    public function setSenha(string $senha): void 
    { 
        $this->senha = $senha; 
    }

    // Buscar por ID
    public function buscarPorId(int $id): ?array {
        $sql = "SELECT id_usuario, nome, email, celular FROM usuarios WHERE id_usuario = :id AND ativo = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($dados) {
            $this->id_usuario = $dados['id_usuario'];
            $this->nome = $dados['nome'];
            $this->email = $dados['email'];
            $this->celular = $dados['celular'];
            return $dados;
        }
        return null;
    }

    // Alterar Email
    public function alterarEmail(int $usuario_id, string $emailAtual, string $novoEmail, string $confirmarEmail): string
    {
        if ($novoEmail !== $confirmarEmail) {
            return "Novo e-mail e confirmação não conferem!";
        }
        $stmt = $this->conn->prepare("SELECT email FROM usuarios WHERE id_usuario = :id");
        $stmt->bindParam(':id', $usuario_id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario || $usuario['email'] !== $emailAtual) {
            return "E-mail atual incorreto!";
        }
        $stmt = $this->conn->prepare("UPDATE usuarios SET email = :novo WHERE id_usuario = :id");
        $stmt->bindParam(':novo', $novoEmail);
        $stmt->bindParam(':id', $usuario_id);
        $stmt->execute();
        $_SESSION['usuario']['email'] = $novoEmail;
        return "E-mail alterado com sucesso!";
    }

    // Alterar Senha
    public function alterarSenha(int $usuario_id, string $senhaAtual, string $novaSenha, string $confirmarSenha): string
    {
        if ($novaSenha !== $confirmarSenha) {
            return "Nova senha e confirmação não conferem!";
        }
        $stmt = $this->conn->prepare("SELECT senha FROM usuarios WHERE id_usuario = :id");
        $stmt->bindParam(':id', $usuario_id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario || !password_verify($senhaAtual, $usuario['senha'])) {
            return "Senha atual incorreta!";
        }
        $novaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE usuarios SET senha = :nova WHERE id_usuario = :id");
        $stmt->bindParam(':nova', $novaHash);
        $stmt->bindParam(':id', $usuario_id);
        $stmt->execute();
        return "Senha alterada com sucesso!";
    }
}