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

//Minha Conta
$route->get("/minhaconta", [MinhaContaController::class, "minhaConta"]);
$route->post("/minhaconta", [MinhaContaController::class, "minhaConta"]);

//Logout
$route->get("/logout", [LogoutController::class, "logout"]);

//Esqueci Senha
$route->get("/esqueciSenha", [EsqueciSenhaController::class, "esqueciSenha"]);

//Painel
$route->get("/painel", [PainelController::class, "painel"]);
$route->post("/painel", [PainelController::class, "painel"]);

//Avaliação
$route->get("/avaliacao", [AvaliacaoController::class, "avaliacao"]);
$route->post("/avaliacao", [AvaliacaoController::class, "avaliacao"]);

//Como Usar
$route->get("/comousar", [ComoUsarController::class, "comoUsar"]);

//Início
$route->get("/", [InicioController::class, "inicio"]);

//Sobre
$route->get("/sobre", [SobreController::class, "sobre"]);

//Quem Somos
$route->get("/quemsomos", [QuemSomosController::class, "quemSomos"]);

//Contato
$route->get("/contato", [ContatoController::class, "contato"]);

//Erro
$route->get("/pagina-nao-encontrada", [ErroController::class, "paginanaoencontrada"]);

return $route;
?>