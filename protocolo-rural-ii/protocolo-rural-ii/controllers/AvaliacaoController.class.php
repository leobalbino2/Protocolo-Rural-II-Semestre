<?php

class Avaliacao {
    public function avaliacao() {
        
        $pagina = 'avaliacao';
        $style = array("./assets/styles/style.css");

        include './views/header.php';
        include './views/avaliacao.php';
        include './views/footer.php';
    }
}