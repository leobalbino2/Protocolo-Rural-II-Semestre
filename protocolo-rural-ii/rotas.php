<?php

class Rotas
{
    public array $rotas = array();

    public function get(string $nome_rota, array $dados)
    {
        $this->rotas["GET"][$nome_rota] = $dados;
    }

    public function post(string $nome_rota, array $dados)
    {
        $this->rotas["POST"][$nome_rota] = $dados;
    }

    public function verificar_rota($metodo, $nome_rota)
    {
        if (isset($this->rotas[$metodo][$nome_rota])) {
            $dados = $this->rotas[$metodo][$nome_rota];
            $method = $dados[1];
            $obj = new $dados[0]();
            return $obj->$method();
        } else {
            header("location:/protocolo-rural-ii/pagina-nao-encontrada");
            die();
        }
    }
}

$route = new Rotas();

$route->get("/", [InicioController::class, "inicio"]);
$route->get("/sobre", [SobreController::class, "sobre"]);
$route->get("/quemsomos", [QuemSomosController::class, "quemsomos"]);
$route->get("/contato", [ContatoController::class, "contato"]);

$route->get("/pagina-nao-encontrada", [ErroController::class, "PaginaNaoEncontrada"]);

return $route;