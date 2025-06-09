<?php

class HomeController {
    public function inicio() {
        
        $pagina = 'inicio';
        $style = array("./assets/styles/styleHome.css");

        include './views/header.php';
        include './views/home.php';
        include './views/footer.php';
    }
}