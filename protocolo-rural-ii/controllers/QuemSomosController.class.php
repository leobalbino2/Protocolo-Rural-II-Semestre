<?php

class QuemSomosController {
    public function quemsomos() {
        
        $pagina = 'quemsomos';
        $style = array("./assets/styles/style.css");

        include './views/header.php';
        include './views/quemsomos.php';
        include './views/footer.php';
    }
}