<?php

class ComoUsarController {
    public function comoUsar() {
        
        $pagina = 'comousar';
        $style = array("./assets/styles/style.css");

        include './views/header.php';
        include './views/comoUsar.php';
        include './views/footer.php';
    }
}
?>