<?php

require_once './models/Conexao.class.php';
require_once './models/Avaliacao.class.php';
require_once './models/Resposta.class.php';

class ResultadoController {

    public function resultado() {
        $pagina = 'resultado';
        $style = array("./assets/styles/style.css");

        $id = $_GET['id'] ?? null;
        $avaliacao = null;
        $respostas = [];

        if ($id) {
            $conn = Conexao::conectar();
            $avaliacao = Avaliacao::buscarPorId($conn, (int)$id);

            if (!$avaliacao) {
                echo "<p class='text-danger text-center mt-4'>Avaliação não encontrada.</p>";
                return;
            }

            // Puxa as respostas relacionadas a essa avaliação
            $respostas = Resposta::listarPorAvaliacao($conn, (int)$id);
        } else {
            echo "<p class='text-danger text-center mt-4'>ID de avaliação não fornecido.</p>";
            return;
        }

        include './views/headerLog.php';
        include './views/resultado.php'; // aqui você terá acesso a $avaliacao e $respostas
        include './views/footer.php';
    }
}