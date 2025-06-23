<?php

class InicioController {
    public function inicio() {
        
        $pagina = 'inicio';
        $style = array("./assets/styles/style.css");

        include './views/header.php';
        include './views/inicio.php';
        include './views/footer.php';
    }
}
?>