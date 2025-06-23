<?php
class Parametro
{
    public function __construct(
        private int $id_parametro = 0,
        private int $indicador_id = 0,
        private string $descricao = "",
        private int $valor = 0
    ) {}

    // Getters
    public function getIdParametro(): int 
    { 
        return $this->id_parametro; 
    }

    public function getIndicadorId(): int 
    {
         return $this->indicador_id; 
    }

    public function getDescricao(): string 
    {
         return $this->descricao; 
    }

    public function getValor(): int 
    { 
        return $this->valor; 
    }

    // Setters
    public function setIndicadorId(int $id): void 
    { 
        $this->indicador_id = $id; 
    }

    public function setDescricao(string $descricao): void 
    { 
        $this->descricao = $descricao; 
    }

    public function setValor(int $valor): void 
    { 
        $this->valor = $valor; 
    }

    // Buscar parâmetros de um indicador
    public static function listarPorIndicador(PDO $conn, int $indicador_id): array {
        $sql = "SELECT * FROM parametros WHERE indicador_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$indicador_id]);
        $parametros = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $parametros[] = new Parametro(
                $row['id_parametro'],
                $row['indicador_id'],
                $row['descricao'],
                $row['valor']
            );
        }

        return $parametros;
    }
}