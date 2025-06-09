<?php

class CadastroController {
    public function cadastro() {
        
        $pagina = 'cadastro';
        $style = array("./assets/styles/style.css");

        include './views/headerAlt.php';
        include './views/cadastro.php';
        include './views/footer.php';
    }
}