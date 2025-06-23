<?php
class Avaliacao
{
    public function __construct(
        private int $id_avaliacao = 0,
        private int $usuario_id = 0,
        private string $nome_propriedade = "",
        private string $data_avaliacao = "",
        private int $grau_sustentabilidade = 0,
        private float $grau_porcentagem = 0.0,
        private bool $finalizado = false
    ) {}

    // Getters
    public function getIdAvaliacao(): int 
    { 
        return $this->id_avaliacao; 
    }

    public function getUsuarioId(): int 
    {
        return $this->usuario_id; 
    }

    public function getNomePropriedade(): string 
    {
         return $this->nome_propriedade; 
    }

    public function getDataAvaliacao(): string 
    { 
        return $this->data_avaliacao; 
    }

    public function getGrauSustentabilidade(): int 
    { 
        return $this->grau_sustentabilidade; 
    }

    public function getGrauPorcentagem(): float 
    { 
        return $this->grau_porcentagem; 
    }
    public function isFinalizado(): bool 
    { 
        return $this->finalizado; 
    }

    // Setters
    public function setUsuarioId(int $usuario_id): void 
    { 
        $this->usuario_id = $usuario_id; 
    }

    public function setNomePropriedade(string $nome): void 
    { 
        $this->nome_propriedade = $nome; 
    }

    public function setDataAvaliacao(string $data): void 
    { 
        $this->data_avaliacao = $data; 
    }

    public function setGrauSustentabilidade(int $grau): void 
    { 
        $this->grau_sustentabilidade = $grau; 
    }

    public function setGrauPorcentagem(float $porcentagem): void 
    { 
        $this->grau_porcentagem = $porcentagem; 
    }

    public function setFinalizado(bool $finalizado): void 
    { 
        $this->finalizado = $finalizado; 
    }

    // Buscar avaliações de um usuário 
    public static function buscarPorUsuario(PDO $conn, int $usuario_id): array {
        $sql = "SELECT * FROM avaliacoes WHERE usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario_id]);
        $avaliacoes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $avaliacoes[] = new Avaliacao(
                $row['id_avaliacao'],
                $row['usuario_id'],
                $row['nome_propriedade'],
                $row['data_avaliacao'],
                $row['grau_sustentabilidade'],
                $row['grau_porcentagem'],
                (bool)$row['finalizado']
            );
        }
        return $avaliacoes;
    }

    // Salvar nova avaliação 
    public function salvar(PDO $conn): bool {
        $sql = "INSERT INTO avaliacoes (usuario_id, nome_propriedade, data_avaliacao, grau_sustentabilidade, grau_porcentagem, finalizado)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->usuario_id,
            $this->nome_propriedade,
            $this->data_avaliacao,
            $this->grau_sustentabilidade,
            $this->grau_porcentagem,
            $this->finalizado ? 1 : 0
        ]);
    }

    // Remover avaliação 
    public static function remover(PDO $conn, int $id_avaliacao, int $usuario_id): bool {
        $sql = "DELETE FROM avaliacoes WHERE id_avaliacao = ? AND usuario_id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$id_avaliacao, $usuario_id]);
    }
}