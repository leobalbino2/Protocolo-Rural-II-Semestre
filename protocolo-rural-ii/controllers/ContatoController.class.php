<?php

class ContatoController {
    public function contato() {
        
        $pagina = 'contato';
        $style = array("./assets/styles/style.css");

        include './views/header.php';
        include './views/contato.php';
        include './views/footer.php';
    }
}
?>