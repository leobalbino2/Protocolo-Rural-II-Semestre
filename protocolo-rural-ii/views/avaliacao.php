<?php
// views/avaliacao.php
?>
<main>
  <div class="container mt-5 pt-5 pb-5">
    <div class="d-flex mt-2">
      <img
        class="cursor-pointer d-none d-lg-block pe-auto"
        src="<?= $base ?>/uploads/seta.png"
        alt="voltar"
        width="29"
        onclick="window.history.back()"
      />
      <h5 class="fw-bold m-3 text-center">Voltar</h5>
    </div>

    <h3 class="fw-bold pb-2">
      Avaliação: <span id="nomeAvaliacao" class="m-5 txt-gray"><?= htmlspecialchars($avaliacao->getNomePropriedade()); ?></span>
    </h3>

    <form id="formAvaliacao" method="post" action="<?= $base ?>/salvar-respostas">
      <input type="hidden" name="avaliacao_id" value="<?= (int)$avaliacao->getIdAvaliacao() ?>" />

      <?php foreach ($indicadores as $index => $indicador): ?>
        <div class="mb-5">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="fundo-tabela">
                  <h3 class="mb-0">
                    <?= ($index + 1) ?> - <?= htmlspecialchars($indicador->getNome()) ?>
                  </h3>
                  <?php if ($indicador->getDescricao()): ?>
                    <small class="fs-5 txt-gray"><?= htmlspecialchars($indicador->getDescricao()) ?></small>
                  <?php endif; ?>
                </th>
              </tr>
            </thead>
            <tbody class="table-group-divider border-top-0">
              <?php foreach ($parametrosPorIndicador[$indicador->getIdIndicador()] as $parametro): ?>
                <tr id="parametro_<?= $parametro->getIdParametro() ?>">
                  <td colspan="2">
                    <label class="d-flex align-items-center" style="cursor: pointer">
                      <p class="my-2 me-auto fs-10"><?= htmlspecialchars($parametro->getDescricao()) ?></p>
                      <input
                        class="form-check-input ms-auto me-5"
                        type="radio"
                        name="indicador_<?= $indicador->getIdIndicador() ?>"
                        value="<?= $parametro->getIdParametro() ?>"
                        required
                      />
                    </label>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endforeach; ?>

      <div class="container d-flex justify-content-center mt-5">
        <button
          type="submit"
          class="btn btn-sbmt txt-gray2 ms-3 d-flex justify-content-center"
          id="finalizarBtn"
        >
          Finalizar
        </button>
      </div>
    </form>
  </div>
</main>