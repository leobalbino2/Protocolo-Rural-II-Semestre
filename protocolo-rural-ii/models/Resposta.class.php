<?php
class Resposta
{
    private int $id_resposta;
    private int $avaliacao_id;
    private int $indicador_id;
    private int $parametro_id;

    // Campos extras para exibição
    private ?string $nome_indicador = null;
    private ?string $descricao_parametro = null;
    private $valor_parametro = null;

    public function __construct(
        int $id_resposta = 0,
        int $avaliacao_id = 0,
        int $indicador_id = 0,
        int $parametro_id = 0,
        ?string $nome_indicador = null,
        ?string $descricao_parametro = null,
        $valor_parametro = null
    ) {
        $this->id_resposta = $id_resposta;
        $this->avaliacao_id = $avaliacao_id;
        $this->indicador_id = $indicador_id;
        $this->parametro_id = $parametro_id;
        $this->nome_indicador = $nome_indicador;
        $this->descricao_parametro = $descricao_parametro;
        $this->valor_parametro = $valor_parametro;
    }

    // Getters
    public function getIdResposta(): int 
    {
        return $this->id_resposta; 
    }

    public function getAvaliacaoId(): int {
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

    public function getNomeIndicador(): ?string 
    { 
        return $this->nome_indicador; 
    }

    public function getDescricaoParametro(): ?string 
    { 
        return $this->descricao_parametro; 
    }

    public function getValorParametro() 
    { 
        return $this->valor_parametro; 
    }

    public static function removerPorAvaliacao(PDO $conn, int $avaliacao_id): bool
    {
        $sql = "DELETE FROM respostas WHERE avaliacao_id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$avaliacao_id]);
    }

    // Método para buscar respostas detalhadas
    public static function listarPorAvaliacao(PDO $conn, int $avaliacao_id): array
    {
        $sql = "SELECT 
                    r.*, 
                    i.nome AS nome_indicador, 
                    p.descricao AS descricao_parametro, 
                    p.valor AS valor_parametro
                FROM respostas r
                JOIN indicadores i ON r.indicador_id = i.id_indicador
                JOIN parametros p ON r.parametro_id = p.id_parametro
                WHERE r.avaliacao_id = ?
                ORDER BY i.id_indicador";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$avaliacao_id]);
        $respostas = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $respostas[] = new Resposta(
                $row['id_resposta'],
                $row['avaliacao_id'],
                $row['indicador_id'],
                $row['parametro_id'],
                $row['nome_indicador'] ?? null,
                $row['descricao_parametro'] ?? null,
                $row['valor_parametro'] ?? null
            );
        }

        return $respostas;
    }

    // Método salvar
    public function salvar(PDO $conn): bool
    {
        $sql = "INSERT INTO respostas (avaliacao_id, indicador_id, parametro_id)
                VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->avaliacao_id,
            $this->indicador_id,
            $this->parametro_id
        ]);
    }
}