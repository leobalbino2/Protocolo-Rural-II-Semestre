<?php

class QuemSomosController {
    public function quemsomos() {
        
        $pagina = 'sobre';
        $style = array("./assets/styles/styleHome.css");

        include './views/header.php';
        include './views/quemsomos.php';
        include './views/footer.php';
    }
}