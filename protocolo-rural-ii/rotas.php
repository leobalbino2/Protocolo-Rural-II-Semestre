<?php

class Rotas
{
    public array $rotas = [];

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
            $controller = new $dados[0]();
            $metodo_controller = $dados[1];

            return $controller->$metodo_controller();
        } else {
            header("Location: /protocolo-rural-ii/pagina-nao-encontrada");
            exit;
        }
    }
}

$route = new Rotas();

//Sessão
$route->get("/login", array(LoginController::class, "login"));
$route->post("/login", array(LoginController::class, "login"));

$route->get("/cadastro", array(CadastroController::class, "cadastro"));
$route->post("/cadastro", array(CadastroController::class, "cadastro"));

// Logout
$route->get("/logout", [LogoutController::class, "logout"]);

//Painel
$route->get("/painel", [PainelController::class, "painel"]);

//Início
$route->get("/", [InicioController::class, "inicio"]);

//Sobre
$route->get("/sobre", [SobreController::class, "sobre"]);

//Quem Somos
$route->get("/quemsomos", [QuemSomosController::class, "quemsomos"]);

//Contato
$route->get("/contato", [ContatoController::class, "contato"]);

//Erro
$route->get("/pagina-nao-encontrada", [ErroController::class, "paginanaoencontrada"]);

return $route;
?>