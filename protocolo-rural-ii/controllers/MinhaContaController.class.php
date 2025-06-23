<?php

class MinhaContaController {
    public function minhaConta() {
        session_start();

        // Redireciona se o usuário não estiver logado
        if (
            !isset($_SESSION['usuario']) ||
            !is_array($_SESSION['usuario']) ||
            !isset($_SESSION['usuario']['id_usuario'])
        ) {
            header('Location: /protocolo-rural-ii/login');
            exit;
        }

        $usuario_id = $_SESSION['usuario']['id_usuario'];
        $pagina = 'minhaconta';
        $style = array("./assets/styles/style.css");

        require_once './models/Conexao.class.php';
        require_once './models/Usuario.class.php';
        $conexao = Conexao::conectar();
        $usuarioModel = new Usuario($conexao);

        $msg = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Atualização de email
            if (isset($_POST['emailAtual'], $_POST['novoEmail'], $_POST['confirmarEmail'])) {
                $msg = $usuarioModel->alterarEmail($usuario_id, $_POST['emailAtual'], $_POST['novoEmail'], $_POST['confirmarEmail']);
            }
            // Atualização de senha
            if (isset($_POST['senhaAtual'], $_POST['novaSenha'], $_POST['confirmarSenha'])) {
                $msg = $usuarioModel->alterarSenha($usuario_id, $_POST['senhaAtual'], $_POST['novaSenha'], $_POST['confirmarSenha']);
            }
        }

        $dados = $usuarioModel->buscarPorId($usuario_id);

        include './views/headerLog.php';
        include './views/minhaConta.php';
        include './views/footer.php';
    }
}
?>