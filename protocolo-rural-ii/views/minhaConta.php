<?php
// Página Minha Conta - Página HTML estruturada com PHP
?>

<main>
      <!------------------------------------------- Início ------------------------------------------->
      <div class="container mt-5 pt-5 pb-5">
        <h3 class="fw-bold pb-2 mt-4">Minha conta</h3>
        <div class="borda-verde"> </div>

        <div class="d-flex flex-row">
          <div class="col-4">
            <h3 class="me-3 pe-5">Nome</h3>
            <p><?= htmlspecialchars($dados['nome']) ?></p>
          </div>

          <div class="col-4">
            <h3 class="me-3">Email</h3>
            <p><?= htmlspecialchars($dados['email']) ?></p>
          </div>

          <div class="col-4">
            <h3 class="me-3">Telefone</h3>
            <p><?= htmlspecialchars($dados['celular']) ?></p>
          </div>
        </div>

        <hr />

        <!------------------------------------------- Alterar Senha e Email ------------------------------------------->

        <div class="row">
          <div class="col-md-6 mb-3">
              <div class="accordion accordion-flush" id="accordionEmail">
                  <div class="accordion-item">
                      <h2 class="accordion-header w-100" id="headingEmail">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEmail" aria-expanded="false" aria-controls="flush-collapseEmail">
                              <h4>Alterar E-mail</h4>
                          </button>
                      </h2>
                      <div id="flush-collapseEmail" class="accordion-collapse collapse" data-bs-parent="#accordionEmail">
                          <div class="accordion-body">
                              <form action="#" method="POST">
                                  <div class="mb-3">
                                      <label for="emailAtual" class="form-label">E-mail Atual</label>
                                      <input type="email" class="form-control" id="emailAtual" name="emailAtual" required>
                                  </div>
  
                                  <div class="mb-3">
                                      <label for="novoEmail" class="form-label">Novo E-mail</label>
                                      <input type="email" class="form-control" id="novoEmail" name="novoEmail" required>
                                  </div>
  
                                  <div class="mb-3">
                                      <label for="confirmarEmail" class="form-label">Confirmar Novo E-mail</label>
                                      <input type="email" class="form-control" id="confirmarEmail" name="confirmarEmail" required>
                                  </div>
  
                                  <button type="submit" class="btn btn-sbmt2">Alterar E-mail</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-md-6 mb-3">
              <div class="accordion accordion-flush" id="accordionSenha">
                  <div class="accordion-item">
                      <h2 class="accordion-header w-100" id="headingSenha">
                          <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSenha" aria-expanded="false" aria-controls="flush-collapseSenha">
                              <h4>Alterar Senha</h4>
                          </button>
                      </h2>
                      <div id="flush-collapseSenha" class="accordion-collapse collapse" data-bs-parent="#accordionSenha">
                          <div class="accordion-body">
                              <form action="#" method="POST">
                                  <div class="mb-3">
                                      <label for="senhaAtual" class="form-label">Senha Atual</label>
                                      <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" required>
                                  </div>
  
                                  <div class="mb-3">
                                      <label for="novaSenha" class="form-label">Nova Senha</label>
                                      <input type="password" class="form-control" id="novaSenha" name="novaSenha" required>
                                  </div>
  
                                  <div class="mb-3">
                                      <label for="confirmarSenha" class="form-label">Confirmar Nova Senha</label>
                                      <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" required>
                                  </div>
  
                                  <button type="submit" class="btn btn-sbmt2">Alterar Senha</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        <hr />

        <!------------------------------------------- Apagar Conta ------------------------------------------->

        <h3 class="fw-bold pb-2 mt-4">Apagar Conta</h3>
        <p>
          Esta ação é irreversível. Ao prosseguir, todos os dados associados às
          suas avaliações e informações pessoais serão excluídos de forma
          permanente e não poderão ser recuperados. Recomendamos que revise sua
          decisão antes de confirmar.
        </p>
      </div>
    </main>