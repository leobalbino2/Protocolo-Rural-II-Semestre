<?php
class Resposta
{
    private int $id_resposta;
    private int $avaliacao_id;
    private int $indicador_id;
    private int $parametro_id;

    public function __construct(
        int $id_resposta = 0,
        int $avaliacao_id = 0,
        int $indicador_id = 0,
        int $parametro_id = 0
    ) {
        $this->id_resposta = $id_resposta;
        $this->avaliacao_id = $avaliacao_id;
        $this->indicador_id = $indicador_id;
        $this->parametro_id = $parametro_id;
    }

    // Getters
    public function getIdResposta(): int
    {
        return $this->id_resposta;
    }

    public function getAvaliacaoId(): int
    {
        return $this->avaliacao_id;
    }

    public function getIndicadorId(): int
    {
        return $this->indicador_id;
    }

    public function getParametroId(): int
    {
        return $this->parametro_id;
    }

    // Setters
    public function setAvaliacaoId(int $avaliacao_id): void
    {
        $this->avaliacao_id = $avaliacao_id;
    }

    public function setIndicadorId(int $indicador_id): void
    {
        $this->indicador_id = $indicador_id;
    }

    public function setParametroId(int $parametro_id): void
    {
        $this->parametro_id = $parametro_id;
    }

    // Buscar respostas por avaliação
    public static function listarPorAvaliacao(PDO $conn, int $avaliacao_id): array
    {
        $sql = "SELECT * FROM respostas WHERE avaliacao_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$avaliacao_id]);
        $respostas = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $respostas[] = new Resposta(
                $row['id_resposta'],
                $row['avaliacao_id'],
                $row['indicador_id'],
                $row['parametro_id']
            );
        }

        return $respostas;
    }

    // Salvar uma nova resposta
    public function salvar(PDO $conn): bool
    {
        $sql = "INSERT INTO respostas (avaliacao_id, indicador_id, parametro_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->avaliacao_id,
            $this->indicador_id,
            $this->parametro_id
        ]);
    }

    // Apagar respostas de uma avaliação 
    public static function removerPorAvaliacao(PDO $conn, int $avaliacao_id): bool
    {
        $sql = "DELETE FROM respostas WHERE avaliacao_id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$avaliacao_id]);
    }
}