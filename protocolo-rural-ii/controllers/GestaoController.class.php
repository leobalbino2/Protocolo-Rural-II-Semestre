<?php

class GestaoController
{
    public function gestao()
    {
        session_start();

        // Verificar se o usuário esta logado
        if (!isset($_SESSION['usuario']) || !is_array($_SESSION['usuario']) || !isset($_SESSION['usuario']['id_usuario'])) {
            header('Location: /protocolo-rural-ii/login');
            exit;
        }

        $pagina = 'gestao';
        $style = array("./assets/styles/style.css");
        $base = '/protocolo-rural-ii';

        require_once __DIR__ . '/../models/Conexao.class.php'; // Ajuste o caminho conforme seu projeto
        $conn = Conexao::conectar();

        // Busca os indicadores ativos/inativos
        $sql = "SELECT id_indicador, nome, descricao, estado FROM indicadores";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $indicadores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/headerLog.php';
        require_once __DIR__ . '/../views/gestao.php';
        require_once __DIR__ . '/../views/footer.php';
    }
}
