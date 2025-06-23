<?php

require_once './models/Conexao.class.php';
require_once './models/Avaliacao.class.php';
require_once './models/Indicador.class.php';
require_once './models/Parametro.class.php';

class AvaliacaoController
{
    public function avaliacao()
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            header("Location: /pagina-nao-encontrada");
            exit;
        }

        try {
            $conn = Conexao::conectar();

            $avaliacao = Avaliacao::buscarPorId($conn, (int)$id);

            if (!$avaliacao) {
                header("Location: /pagina-nao-encontrada");
                exit;
            }

            $indicadores = Indicador::listarTodos($conn);

            $parametrosPorIndicador = [];
            foreach ($indicadores as $indicador) {
                $parametrosPorIndicador[$indicador->getIdIndicador()] =
                    Parametro::listarPorIndicador($conn, $indicador->getIdIndicador());
            }

            $pagina = 'avaliacao';
            $style = array("./assets/styles/style.css");

            include './views/headerAlt.php';
            include './views/avaliacao.php';
            include './views/footer.php';

        } catch (Exception $e) {
            header("Location: /pagina-nao-encontrada");
            exit;
        }
    }
}
