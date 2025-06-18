<?php

class SobreController {
    public function sobre() {

        $pagina = 'sobre';
        $style = array("./assets/styles/style.css");
        
        include './views/header.php';
        include './views/sobre.php';
        include './views/footer.php';
    }
}
?>