<?php

require_once './models/Conexao.class.php';
require_once './models/Avaliacao.class.php';
require_once './models/Indicador.class.php';
require_once './models/Parametro.class.php';

class AvaliacaoController
{
    // Cria a avaliação e redireciona para responder
    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_SESSION['usuario_id'] ?? null;
            $nome = $_POST['nome_propriedade'] ?? '';

            if (!$usuario_id || !$nome) {
                header("Location: /pagina-nao-encontrada");
                exit;
            }

            $conn = Conexao::conectar();
            $avaliacao = new Avaliacao(0, $usuario_id, $nome, date('Y-m-d'), 0, 0.0, false);
            $avaliacao->salvar($conn);
            $id = $conn->lastInsertId();

            header("Location: /avaliacao?id=$id");
            exit;
        }

        // Se GET, mostra formulário para nomear avaliação
        include './views/headerAlt.php';
        include './views/nomearAvaliacao.php';
        include './views/footer.php';
    }

    // Responde a avaliação
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
            if ($avaliacao->isFinalizado()) {
                // Se já finalizada, vai direto para painel
                header("Location: /painel");
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

    // Recebe POST (formulário tradicional) com respostas e finaliza avaliação
    public function salvarRespostas()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /pagina-nao-encontrada");
            exit;
        }

        $data = $_POST;
        if (empty($data['avaliacao_id'])) {
            header("Location: /pagina-nao-encontrada");
            exit;
        }

        $conn = Conexao::conectar();
        $avaliacao_id = intval($data['avaliacao_id']);

        // Array de respostas
        $respostas = [];
        foreach ($data as $k => $v) {
            if (strpos($k, 'indicador_') === 0) {
                $respostas[$k] = $v;
            }
        }

        // Remove respostas antigas
        require_once './models/Resposta.class.php';
        Resposta::removerPorAvaliacao($conn, $avaliacao_id);

        foreach ($respostas as $input_name => $parametro_id) {
            if ($parametro_id && preg_match('/indicador_(\d+)/', $input_name, $matches)) {
                $indicador_id = intval($matches[1]);
                $resposta = new Resposta(
                    0,
                    $avaliacao_id,
                    $indicador_id,
                    intval($parametro_id)
                );
                $resposta->salvar($conn);
            }
        }

        // Marcar avaliação como finalizada
        $avaliacao = Avaliacao::buscarPorId($conn, $avaliacao_id);
        if ($avaliacao) {
            $avaliacao->setFinalizado(true);
            $avaliacao->salvar($conn);
        }

        $_SESSION['mensagem_sucesso'] = 'Avaliação finalizada com sucesso!';
        $base = "/protocolo-rural-ii";
        header("Location: $base/painel");
        exit;
    }
}