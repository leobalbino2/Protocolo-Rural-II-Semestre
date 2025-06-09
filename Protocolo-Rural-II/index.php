<?php

$pagina = $_GET['pagina'] ?? 'home';

switch ($pagina) {
    case 'home':
        require_once './controllers/HomeController.php';
        $controller = new HomeController();
        $controller->inicio();
        break;

    case 'sobre':
        require_once './controllers/SobreController.php';
        $controller = new SobreController();
        $controller->sobre();
        break;

    case 'quemsomos':
        require_once './controllers/QuemSomosController.php';
        $controller = new QuemSomosController();
        $controller->quemsomos();
        break;

    case 'contato':
        require_once './controllers/ContatoController.php';
        $controller = new ContatoController();
        $controller->contato();
        break;

    default:
        echo "Página não encontrada.";
        break;
}
