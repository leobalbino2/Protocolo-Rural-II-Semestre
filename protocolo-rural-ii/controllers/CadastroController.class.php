<?php

class CadastroController {
    public function cadastro() {
        $pagina = 'cadastro';
        $style = array("./assets/styles/style.css");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $celular = $_POST['celular'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $confirmar_senha = $_POST['confirmar_senha'] ?? '';

            // Verifica se há campos vazios
            if (!$nome || !$email || !$celular || !$senha || !$confirmar_senha) {
                $erro = "Por favor, preencha todos os campos.";
            }
            elseif ($senha !== $confirmar_senha) {
                $erro = "As senhas não coincidem.";
            } else {
                require_once './models/Conexao.class.php';
                $conexao = Conexao::conectar();

                $hash = password_hash($senha, PASSWORD_DEFAULT);

                try {
                    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, celular, senha) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$nome, $email, $celular, $hash]);
                
                    header('Location: /protocolo-rural-ii/login');
                    exit;
                } catch (PDOException $e) {
                    $erro = "Erro ao cadastrar: " . $e->getMessage();
                }
            }
        }

        include './views/headerAlt.php';
        include './views/cadastro.php';
        include './views/footer.php';
    }
}