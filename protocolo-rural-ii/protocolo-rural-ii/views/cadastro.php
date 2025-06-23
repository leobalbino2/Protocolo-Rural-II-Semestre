<?php
// Cadastro - Página HTML estruturada com PHP
?>

<main>
  <!----------------------------------- Cadastro ----------------------------------->
  <div class="container mt-5 pt-5">
    <div class="container col-12 col-lg-6 border">

      <?php if (isset($erro)) : ?>
        <div class="alert alert-danger text-center mt-3"><?= $erro ?></div>
      <?php endif; ?>

    <form class="col-11 mx-auto d-flex flex-column justify-content-center" action="/protocolo-rural-ii/cadastro" method="post" style="background-color: #ffffff">
        <div class="d-flex mt-2">
          <img
            class="cursor-pointer d-none d-lg-block pe-auto"
            id="voltar"
            src="<?= $base ?>/uploads/seta.png"
            alt="voltar"
            width="29"
            onclick="window.location.href='<?= $base ?>/login'"
          />

          <h5 class="fw-bold m-3 text-center">Cadastre-se</h5>
        </div>

        <div class="mb-3">
          <label for="exemploNome" class="fw-bold my-3 txt-gray"
            >Nome</label>
          <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" placeholder="Informe seu nome"  />
        </div>

        <div class="mb-3">
          <label for="exemploEmail" class="fw-bold my-3 txt-gray">E-mail</label>
          <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="Informe seu email"  />
        </div>

        <div class="mb-3">
          <label for="exemploTel" class="fw-bold my-3 txt-gray">Número de Celular</label>
          <input type="number" class="form-control" name="celular" value="<?= htmlspecialchars($_POST['celular'] ?? '') ?>" placeholder="Informe seu número de celular"  />
        </div>

        <div class="mb-3">
          <label for="exemploSenha" class="fw-bold my-3 txt-gray">Crie uma senha</label>
          <input type="password" class="form-control" id="exemploSenha" name="senha" placeholder="Ex: sL780243@" />
        </div>

        <div class="mb-3">
          <label for="exemploSenha" class="fw-bold my-3 txt-gray">Confirme sua senha</label>
          <input type="password" class="form-control" id="confirmarSenha" name="confirmar_senha" placeholder="Confirme sua senha" />
        </div>

        <button type="submit" class="btn btn-sbmt2 mb-2 mt-3 mb-3 d-block mx-auto col-6">Cadastrar-se</button>

        <p class="text-center txt-gray border-top mt-2 txt-gray2">ou</p>
        <button type="submit" class="btn btn-sbmt my-2 txt-gray2">
          Continuar com Google
        </button>
        <a href="<?=$base?>/esqueciSenha" type="submit" class="btn btn-sbmt mt-2 mb-4 txt-gray2">
          Esqueci minha senha
        </a>
      </form>
    </div>
  </div>
</main>