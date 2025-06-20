<?php

class MinhaContaController {
    public function minhaConta() {
        session_start();

        // Redireciona se o usuário não estiver logado
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: /protocolo-rural-ii/login');
            exit;
        }

        $pagina = 'minhaconta';
        $style = array("./assets/styles/style.css");

        $conexao = Conexao::conectar();
        $usuarioModel = new Usuario($conexao);

        $dados = $usuarioModel->buscarPorId($_SESSION['id_usuario']);

        include './views/headerLog.php';
        include './views/minhaConta.php';
        include './views/footer.php';
    }
}
?>