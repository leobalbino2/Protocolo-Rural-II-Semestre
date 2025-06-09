<!----------------------------------- Main ----------------------------------->
<main>
  <?php $base = '/protocolo-rural-ii'; ?>
  <div class="container mt-5 pt-5">
    <div class="container col-12 col-lg-6 border">
      <form
        class="col-11 mx-auto d-flex flex-column justify-content-center"
        action="<?=$base?>/login"
        method="post"
      >
        <div class="d-flex mt-2">
          <img
            class="cursor-pointer"
            id="voltar"
            class="d-none d-lg-block pe-auto"
            src="<?=$base?>/uploads/seta.png"
            alt="voltar"
            width="29"
            onclick="window.history.back()"
          />

          <h5 class="fw-bold m-3 text-center">Bem-vindo de volta!</h5>
        </div>
        <div class="mb-3">
          <label for="exemploEmail" class="fw-bold my-3 txt-gray"
            >E-mail</label
          >
          <input
            type="email"
            class="form-control"
            id="exemploEmail"
            name="email"
            aria-describedby="email"
            placeholder="Insira seu e-mail"
            required
          />
        </div>
        <div class="mb-3">
          <label for="exemploSenha" class="fw-bold my-3 txt-gray"
            >Senha</label
          >
          <input
            type="password"
            class="form-control"
            id="exemploSenha"
            name="senha"
            aria-describedby="password"
            placeholder="Insira sua senha"
            required
          />
        </div>

        <button type="submit" class="btn btn-sbmt2 mb-2 mt-3 mb-3 d-block mx-auto col-6">Entrar</button>
        <p class="text-center txt-gray border-top mt-2 txt-gray2">ou</p>
        <button type="button" class="btn btn-sbmt my-2 txt-gray2">
          Continuar com Google
        </button>
        <a href="<?=$base?>/cadastro" class="btn btn-sbmt my-2 txt-gray2">
          Cadastrar-se
        </a>
        <a href="<?=$base?>/esqueciSenha" class="btn btn-sbmt mt-2 mb-4 txt-gray2">
          Esqueci minha senha
        </a>
      </form>
    </div>
  </div>
</main>