<?php

class ComoUsarController {
    public function comoUsar() {
        
        $pagina = 'comousar';
        $style = array("./assets/styles/style.css");

        include './views/headerLog.php';
        include './views/comoUsar.php';
        include './views/footer.php';
    }
}
?>