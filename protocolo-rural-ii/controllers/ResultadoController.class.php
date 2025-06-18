<?php

class Resultado {
    public function resultado() {
        
        $pagina = 'resultado';
        $style = array("./assets/styles/style.css");

        include './views/header.php';
        include './views/resultado.php';
        include './views/footer.php';
    }
}