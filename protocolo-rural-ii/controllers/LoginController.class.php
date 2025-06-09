<?php

class LoginController {
    public function login() {
        
        $pagina = 'login';
        $style = array("./assets/styles/style.css");

        include './views/headerAlt.php';
        include './views/login.php';
        include './views/footer.php';
    }
}