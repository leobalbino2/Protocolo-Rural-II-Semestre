<?php

spl_autoload_register(function ($nome_classe) {
    if (file_exists("controllers/" . $nome_classe . ".class.php")) {
        require_once "controllers/" . $nome_classe . ".class.php";
    } else if (file_exists("models/" . $nome_classe . ".class.php")) {
        require_once "models/" . $nome_classe . ".class.php";
    } else {
        echo "Classe não encontrada: " . htmlspecialchars($nome_classe);
    }
});

require_once "rotas.php";

$base = '/protocolo-rural-ii';

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$nome_rota = str_replace($base, '', $uri);

$nome_rota = rtrim($nome_rota, '/');
if ($nome_rota === '') {
    $nome_rota = '/';
}

$route->verificar_rota($_SERVER["REQUEST_METHOD"], $nome_rota);