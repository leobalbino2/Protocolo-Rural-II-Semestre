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

//Sessão
$route->get("/login", array(LoginController::class, "login"));
$route->post("/login", array(LoginController::class, "login"));

$route->get("/cadastro", array(CadastroController::class, "cadastro"));
$route->post("/cadastro", array(CadastroController::class, "cadastro"));

$route->get("/esqueciSenha", array(EsqueciSenhaController::class, "esqueciSenha"));
$route->post("/esqueciSenha", array(EsqueciSenhaController::class, "esqueciSenha"));

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