<?php

class EsqueciSenhaController {
    public function esqueciSenha() {
        
        $pagina = 'esquecisenha';
        $style = array("./assets/styles/style.css");

        include './views/headerAlt.php';
        include './views/esqueciSenha.php';
        include './views/footer.php';
    }
}
?>