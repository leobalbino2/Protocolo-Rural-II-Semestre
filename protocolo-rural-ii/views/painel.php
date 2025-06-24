<?php
// Página Painel de Avaliações - Página HTML estruturada com PHP
?>

<main>
  <div class="container mt-5 pt-5 pb-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="pb-2 mt-4">Painel de Avaliações</h3>
      <!-- Corrigido: href="#" só abre o modal -->
      <a class="btn btn-sbmt2" data-bs-toggle="modal" data-bs-target="#criarAvaliacao">Criar Nova Avaliação</a>
    </div>
    
    <div class="table-responsive ">
      <table class="table">
        <thead class="fundo-tabela">
          <tr>
            <th><h4 class="mb-0">Nome</h4></th>
            <th><h4 class="mb-0">Estado</h4></th>
            <th colspan="3">
              <h4 class="mb-0">Grau de Sustentabilidade</h4>
            </th>
          </tr>
        </thead>
          <tbody class="table-group-divider border-top-0">
            <?php if (!empty($avaliacoes)): ?>
              <?php foreach ($avaliacoes as $avaliacao): ?>
                <tr>
                  <td><p class="my-2"><?= htmlspecialchars($avaliacao->getNomePropriedade()) ?></p></td>
                  <td><p class="my-2"><?= $avaliacao->isFinalizado() ? 'Finalizado' : 'Em Andamento' ?></p></td>
                  <td><p class="my-2"><?= number_format($avaliacao->getGrauPorcentagem(), 2, ',', '.') ?>%</p></td>
                  <td class="text-end align-middle">
                    <?php if ($avaliacao->isFinalizado()): ?>
                      <a href="<?= $base ?>/resultado?id=<?= $avaliacao->getIdAvaliacao() ?>" class="btn btn-sbmt2">Ver Resultados</a>
                  <?php else: ?>
                    <a href="<?=$base?>/avaliacao?id=<?= $avaliacao->getIdAvaliacao() ?>" class="btn btn-sbmt4">Realizar Avaliação</a>
                  <?php endif; ?>
                    <form method="POST" action="" style="display:inline;" onsubmit="return confirm('Deseja realmente remover esta avaliação?');">
                      <input type="hidden" name="remover_avaliacao" value="1">
                      <input type="hidden" name="id_avaliacao" value="<?= $avaliacao->getIdAvaliacao() ?>">
                      <button type="submit" class="btn btn-sbmt3">Remover</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
          <?php else: ?>
              <tr>
                <td colspan="5"><p class="my-2 text-center">Nenhuma avaliação encontrada.</p></td>
              </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="height: 45vh"></div>
  </div>

  <!-- Modal de criar avaliação -->
  <div class="modal fade" id="criarAvaliacao" tabindex="-1" aria-labelledby="criarAvaliacaoLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable no-border-radius">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center justify-content-between">
          <h1 class="modal-title fs-5" id="criarAvaliacaoLabel">Dê um nome à Avaliação</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="avaliacaoNomeForm" class="mx-auto justify-content-center" method="post" action="">
            <p class="mt-2 mb-3">Digite o nome da propriedade rural que será avaliada.</p>
            <input type="text" class="form-control" id="nomeAvaliacao" name="nome_propriedade" placeholder="Informe o nome da avaliação" required/>
            <button type="submit" class="btn btn-sbmt2 my-3 mt-4 d-block mx-auto col-6">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>