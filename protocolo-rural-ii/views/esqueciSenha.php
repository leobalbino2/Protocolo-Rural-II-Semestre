<?php
// Esqueci Senha - Página HTML estruturada com PHP
?>

<main>
    <!----------------------------------- Esqueci Senha ----------------------------------->
    <div class="container mt-5 pt-5">
        <div class="container col-12 col-lg-6 border">
            <form class="col-11 mx-auto d-flex flex-column justify-content-center" action="<?=$base?>/esqueciSenha" method="post">
                <div class="d-flex mt-2">
                    <img class="cursor-pointer d-none d-lg-block pe-auto" id="voltar" src="<?=$base?>/uploads/seta.png" alt="voltar" width="29" onclick="window.history.back()" />
                    <h5 class="fw-bold m-3 text-center">Esqueci minha Senha</h5>
                </div>

                <p class="my-4 mb-2">Digite o e-mail associado à sua conta, e enviaremos um link para redefinir sua senha com segurança.</p>

                <div class="mb-3">
                    <label for="exemploEmail" class="fw-bold my-3 txt-gray">E-mail</label>
                    <input type="email" class="form-control" id="exemploEmail" name="email" placeholder="Insira seu e-mail" required />
                </div>

                <button type="submit" class="btn btn-sbmt2 mb-2 mt-3 mb-3 d-block mx-auto col-6">Enviar</button>
            </form>
        </div>
    </div>
</main>