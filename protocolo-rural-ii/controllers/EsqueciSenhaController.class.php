<?php

class EsqueciSenhaController {
    public function esqueciSenha() {
        
        $pagina = 'esquecisenha';
        $style = array("./assets/styles/style.css");

        include './views/header.php';
        include './views/esqueciSenha.php';
        include './views/footer.php';
    }
}
?>