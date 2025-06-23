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

    // Buscar por id
    public static function buscarPorId(PDO $conn, int $id_avaliacao): ?Avaliacao {
    $sql = "SELECT * FROM avaliacoes WHERE id_avaliacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_avaliacao]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Avaliacao(
                $row['id_avaliacao'],
                $row['usuario_id'],
                $row['nome_propriedade'],
                $row['data_avaliacao'],
                $row['grau_sustentabilidade'],
                $row['grau_porcentagem'],
                (bool)$row['finalizado']
            );
        }
        return null;
    }

    private function calcularGraus(PDO $conn): void
    {
        // Busca todos os parametros (valor) associados a esta avaliação
        $sql = "SELECT p.valor
                FROM respostas r
                JOIN parametros p ON r.parametro_id = p.id_parametro
                WHERE r.avaliacao_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->id_avaliacao]);
        $valores = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $total_parametros = count($valores);
        $total_maximo = $total_parametros * 5;
        $total_obtido = array_sum($valores);

        $this->grau_sustentabilidade = $total_obtido;
        $this->grau_porcentagem = $total_maximo > 0 ? round(100 * $total_obtido / $total_maximo, 2) : 0.0;
    }

        // Salvar nova avaliação 
        public function salvar(PDO $conn): bool
    {
        // Só calcula se já tiver um id
        if ($this->id_avaliacao > 0) {
            $this->calcularGraus($conn);
        }

        if ($this->id_avaliacao === 0) {
            // Inserir nova avaliação (graus começam em 0)
            $sql = "INSERT INTO avaliacoes (usuario_id, nome_propriedade, data_avaliacao, grau_sustentabilidade, grau_porcentagem, finalizado)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $success = $stmt->execute([
                $this->usuario_id,
                $this->nome_propriedade,
                $this->data_avaliacao,
                $this->grau_sustentabilidade,
                $this->grau_porcentagem,
                $this->finalizado ? 1 : 0
            ]);
            if ($success) {
                $this->id_avaliacao = $conn->lastInsertId();
            }
            return $success;
        } else {
            // Atualizar avaliação existente (com os graus recalculados)
            $sql = "UPDATE avaliacoes 
                    SET usuario_id = ?, nome_propriedade = ?, data_avaliacao = ?, grau_sustentabilidade = ?, grau_porcentagem = ?, finalizado = ?
                    WHERE id_avaliacao = ?";
            $stmt = $conn->prepare($sql);
            return $stmt->execute([
                $this->usuario_id,
                $this->nome_propriedade,
                $this->data_avaliacao,
                $this->grau_sustentabilidade,
                $this->grau_porcentagem,
                $this->finalizado ? 1 : 0,
                $this->id_avaliacao
            ]);
        }
    }


    // Remover avaliação 
    public static function remover(PDO $conn, int $id_avaliacao, int $usuario_id): bool {
        $sql = "DELETE FROM avaliacoes WHERE id_avaliacao = ? AND usuario_id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$id_avaliacao, $usuario_id]);
    }
}