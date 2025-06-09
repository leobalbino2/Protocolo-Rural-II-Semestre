<?php

class ErroController
{
    public function PaginaNaoEncontrada()
    {
        $pagina = 'pagina-nao-encontrada';
        $style = array("./assets/styles/style.css");

        require_once "./views/header.php";
        require_once "./views/footer.php";
    }
}
?>