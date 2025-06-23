<?php
// Contato - Página HTML estruturada com PHP
?>

<main>
  <!----------------------------------- Contato ----------------------------------->
  <div class="container mt-5 pt-5">
    <h1 class="brdr-bottom3 py-3"> Quer <a class="txt-lgt-green text-decoration-none">entrar em contato</a> conosco ?</h1>
    <div class="row my-4">
      <div
        class="col-12 col-lg-6 d-flex flex-column justify-content-between"
      >
        <h3 class="pb-4">
          Envie sua mensagem no formulário e responderemos qualquer dúvida.
        </h3>
        <img class="d-none d-lg-block" src="./uploads/msgimg.png" alt="imagem-contato" width="300" />
      </div>
      <div class="col-12 col-lg-6">
        <form>
          <div class="mb-4">
            <label for="exemploInputNome1" class="fw-bold mb-2 txt-gray"
              >Nome Completo</label
            >
            <input
              type="text"
              class="form-control"
              id="exemploInputNome1"
              aria-describedby="nomeCompleto"
              placeholder="Informe seu nome completo"
            />
          </div>
          <div class="mb-4">
            <label for="exemploInputEmail1" class="fw-bold mb-2 txt-gray"
              >E-mail</label
            >
            <input
              type="email"
              class="form-control"
              id="exemploInputEmail1"
              aria-describedby="email"
              placeholder="Informe seu e-mail"
            />
          </div>
          <div class="mb-4">
            <label for="exemploInputAssunto1" class="fw-bold mb-2 txt-gray"
              >Assunto</label
            >
            <input
              type="text"
              class="form-control"
              id="exemploInputAssunto1"
              aria-describedby="assunto"
              placeholder="Informe o assunto"
            />
          </div>
          <div class="mb-4">
            <label
              for="exampleFormControlTextarea1"
              class="fw-bold mb-2 txt-gray"
              >Mensagem</label
            >
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="3"
              placeholder="Informe o conteúdo da mensagem"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-msg">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</main>