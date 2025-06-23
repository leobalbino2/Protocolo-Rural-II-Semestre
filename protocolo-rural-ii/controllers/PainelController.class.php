<?php

class PainelController {
    public function painel() {
        session_start();

        if (!isset($_SESSION['usuario']) || !is_array($_SESSION['usuario']) || !isset($_SESSION['usuario']['id_usuario'])) {
            header('Location: /protocolo-rural-ii/login');
            exit;
        }
        $usuario_id = $_SESSION['usuario']['id_usuario'];
        require_once './models/Conexao.class.php';
        $conn = Conexao::conectar();
        require_once './models/Avaliacao.class.php';

        $msg = '';

        $isAjax = (
            (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
            || (isset($_POST['ajax']) && $_POST['ajax'] == '1')
        );

        // REMOVER avaliação
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover_avaliacao'], $_POST['id_avaliacao'])) {
            $id_avaliacao = (int)$_POST['id_avaliacao'];
            if (Avaliacao::remover($conn, $id_avaliacao, $usuario_id)) {
                $msg = "Avaliação removida com sucesso!";
            } else {
                $msg = "Erro ao remover a avaliação.";
            }
        }
        // CRIAR avaliação
        else if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nome_propriedade'])) {
            $nome_propriedade = trim($_POST['nome_propriedade']);
            $data_hoje = date('Y-m-d');
            $grau_sustentabilidade = 0;
            $grau_porcentagem = 0.0;
            $finalizado = 0;
            try {
                $stmt = $conn->prepare(
                    "INSERT INTO avaliacoes (nome_propriedade, usuario_id, data_avaliacao, grau_sustentabilidade, grau_porcentagem, finalizado) 
                     VALUES (:nome_propriedade, :usuario_id, :data_hoje, :grau_sustentabilidade, :grau_porcentagem, :finalizado)"
                );
                $stmt->bindParam(':nome_propriedade', $nome_propriedade, PDO::PARAM_STR);
                $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
                $stmt->bindParam(':data_hoje', $data_hoje, PDO::PARAM_STR);
                $stmt->bindParam(':grau_sustentabilidade', $grau_sustentabilidade, PDO::PARAM_INT);
                $stmt->bindParam(':grau_porcentagem', $grau_porcentagem);
                $stmt->bindParam(':finalizado', $finalizado, PDO::PARAM_INT);
                $stmt->execute();
                $msg = 'Avaliação criada com sucesso!';
            } catch (PDOException $e) {
                $msg = 'Erro ao salvar: ' . $e->getMessage();
            }
        }

        // Buscar avaliações do usuário
        $avaliacoes = Avaliacao::buscarPorUsuario($conn, $usuario_id);

        if ($isAjax) {
            ob_start();
            include './views/tabela_avaliacoes.php';
            $tabela = ob_get_clean();
            echo json_encode([
                'msg' => $msg,
                'tabela' => $tabela
            ]);
            exit;
        }

        $pagina = 'painel'; 
        $style = ["./assets/styles/style.css"];
        include './views/headerLog.php';
        include './views/painel.php'; 
        include './views/footer.php';
    }
}
?>