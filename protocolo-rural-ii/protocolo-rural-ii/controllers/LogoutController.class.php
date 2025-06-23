<?php

class LogoutController {
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /protocolo-rural-ii/login');
        exit;
    }
}
?>