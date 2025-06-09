     <main>
      <div class="container mt-5 pt-5">
        <div class="container col-12 col-lg-6 border">
          <form
            class="col-11 mx-auto d-flex flex-column justify-content-center"
          >

            <div class="d-flex mt-2">
              <img
                class="cursor-pointer"
                id="voltar"
                class="d-none d-lg-block pe-auto"
                src="./uploads/seta.png"
                alt="voltar"
                width="29"
                onclick="window.history.back()"
              />

              <h5 class="fw-bold m-3 text-center">Cadastre-se</h5>
            </div>

            <div class="mb-3">
              <label for="exemploNome" class="fw-bold my-3 txt-gray"
                >Nome</label
              >
              <input
                type="text"
                class="form-control"
                id="exemploNome"
                aria-describedby="text"
                placeholder="Insira seu nome"
              />
            </div>

            <div class="mb-3">
              <label for="exemploEmail" class="fw-bold my-3 txt-gray"
                >E-mail</label
              >
              <input
                type="email"
                class="form-control"
                id="exemploEmail"
                aria-describedby="email"
                placeholder="Insira seu e-mail"
              />
            </div>

            <div class="mb-3">
              <label for="exemploTel" class="fw-bold my-3 txt-gray"
                >Número de Telefone</label
              >
              <input
                type="number"
                class="form-control"
                id="exemploTelefone"
                aria-describedby="number"
                placeholder="__-_________"
              />
            </div>

            <div class="mb-3">
              <label for="exemploSenha" class="fw-bold my-3 txt-gray"
                >Crie uma senha</label
              >
              <input
                type="password"
                class="form-control"
                id="exemploSenha"
                aria-describedby="password"
                placeholder="Ex: sL780243@"
              />
            </div>

            <div class="mb-3">
              <label for="exemploSenha" class="fw-bold my-3 txt-gray"
                >Confirme sua senha</label
              >
              <input
                type="password"
                class="form-control"
                id="exemploSenha"
                aria-describedby="password"
                placeholder="Insira sua senha"
              />
            </div>

      
            <a href="../index.html" type="submit" class="btn btn-sbmt2 mb-2 mt-3 mb-3 d-block mx-auto col-6">Cadastrar-se</a>

            <p class="text-center txt-gray border-top mt-2 txt-gray2">ou</p>
            <button type="submit" class="btn btn-sbmt my-2 txt-gray2">
              Continuar com Google
            </button>
            <a href="../esqueciSenha/index.html" type="submit" class="btn btn-sbmt mt-2 mb-4 txt-gray2">
              Esqueci minha senha
            </a>
          </form>
        </div>
      </div>
    </main>