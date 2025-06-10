<?php

class PainelController {
    public function painel() {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header('Location: /protocolo-rural-ii/login');
            exit;
        }

        $pagina = 'painel'; 
        $style = ["./assets/styles/style.css"];

        include './views/headerLog.php';
        include './views/painel.php'; 
        include './views/footer.php';
    }
}