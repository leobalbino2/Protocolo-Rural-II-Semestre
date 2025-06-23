<?php

class LoginController {
    public function login() {
        $pagina = 'login';
        $style = array("./assets/styles/style.css");

        session_start();

        // redireciona usuário se já estiver logado
        if (isset($_SESSION['usuario']) && is_array($_SESSION['usuario']) && isset($_SESSION['usuario']['id_usuario'])) {
            header('Location: /protocolo-rural-ii/painel');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            require_once './models/Conexao.class.php';
            $conexao = Conexao::conectar();

            $sql = "SELECT * FROM usuarios WHERE email = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->execute([$email]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Salva o usuário na sessão como array associativo
                $_SESSION['usuario'] = [
                    'id_usuario' => $usuario['id_usuario'],
                    'nome' => $usuario['nome'] ?? '',
                    'email' => $usuario['email']
                ];
                header('Location: /protocolo-rural-ii/painel');
                exit;
            } else {
                $erro = "E-mail ou senha inválidos.";
            }
        }

        include './views/headerAlt.php';
        include './views/login.php';
        include './views/footer.php';
    }
}
?>