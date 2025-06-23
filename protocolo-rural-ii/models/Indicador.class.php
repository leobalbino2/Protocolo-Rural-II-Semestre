<?php
class Indicador
{
    public function __construct(
        private int $id_indicador = 0,
        private string $nome = "",
        private string $descricao = "",
        private bool $estado = true
    ) {}

    // Getters
    public function getIdIndicador(): int 
    { 
        return $this->id_indicador; 
    }

    public function getNome(): string 
    { 
        return $this->nome; 
    }

    public function getDescricao(): string 
    { 
        return $this->descricao; 
    }

    public function isAtivo(): bool 
    { 
        return $this->estado; 
    }

    // Setters
    public function setNome(string $nome): void 
    { 
        $this->nome = $nome; 
    }

    public function setDescricao(string $descricao): void 
    { 
        $this->descricao = $descricao; 
    }

    public function setEstado(bool $estado): void 
    { 
        $this->estado = $estado; 
    }

    // Buscar todos os indicadores ativos
    public static function listarTodos(PDO $conn): array {
        $sql = "SELECT * FROM indicadores WHERE estado = 1";
        $stmt = $conn->query($sql);
        $indicadores = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $indicadores[] = new Indicador(
                $row['id_indicador'],
                $row['nome'],
                $row['descricao'],
                (bool)$row['estado']
            );
        }

        return $indicadores;
    }

    // Buscar por ID
    public static function buscarPorId(PDO $conn, int $id_indicador): ?Indicador {
        $sql = "SELECT * FROM indicadores WHERE id_indicador = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_indicador]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Indicador(
                $row['id_indicador'],
                $row['nome'],
                $row['descricao'],
                (bool)$row['estado']
            );
        }

        return null;
    }
}