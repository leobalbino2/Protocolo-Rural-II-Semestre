<?php
// Página Painel de Avaliações - Página HTML estruturada com PHP
?>

<main>
  <!------------------------------------------- Início ------------------------------------------->
  <div class="container mt-5 pt-5 pb-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="fw-bold pb-2 mt-4">Painel de Avaliações</h3>
      <a href="./avaliacao/index.html" class="btn btn-sbmt2" data-bs-toggle="modal" data-bs-target="#criarAvaliacao">Criar Nova Avaliação</a>
    </div>
    <div class="table-responsive ">
      <table class="table">
        <thead class="fundo-tabela">
          <tr>
            <th><h4 class="mb-0">Nome</h4></th>
            <th><h4 class="mb-0">Data</h4></th>
            <th colspan="3">
              <h4 class="mb-0">Grau de Sustentabilidade</h4>
            </th>
          </tr>
        </thead>
        <tbody class="table-group-divider border-top-0">
          <tr>
            <td><p class="my-2">Exemplo Fazenda</p></td>
            <td><p class="my-2">19/11/2024</p></td>
            <td><p class="my-2">43,33%</p></td>
            <td class="text-end align-middle">
              <button class="btn btn-sbmt2 me-2">Ver Resultados</button>
              <button class="btn btn-sbmt3">Remover</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="height: 45vh"></div>
  </div>

  <!------------------------------------------- Modal ------------------------------------------->

  <div class="modal fade" id="criarAvaliacao" tabindex="-1" aria-labelledby="criarAvaliacaoLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable no-border-radius">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center justify-content-between">
          <h1 class="modal-title fs-5" id="criarAvaliacaoLabel">Dê um nome à Avaliação</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="avaliacaoNomeForm" class="mx-auto justify-content-center " >
            <p class="mt-2 mb-3">Digite o nome da propriedade rural que será avaliada.</p>
            <input type="text" class="form-control" id="nomeAvaliacao" aria-describedby="text" placeholder="Informe o nome da avaliação" required/>
            <button type="submit" class="btn btn-sbmt2 my-3 mt-4 d-block mx-auto col-6">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>