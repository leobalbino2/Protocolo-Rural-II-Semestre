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

    <?php foreach ($indicadores as $index => $indicador): ?>
      <div 
        class="mb-5 indicador" 
        id="indicador_<?= $indicador->getIdIndicador() ?>" 
        style="<?= $index === 0 ? '' : 'display:none;' ?>"
      >
        <table class="table table-hover" id="perguntasTable_<?= $indicador->getIdIndicador() ?>">
          <thead>
            <tr>
              <th class="fundo-tabela">
                <h3 class="mb-0">
                  <?= ($index + 1) ?> - <?= htmlspecialchars($indicador->getNome()) ?>
                </h4>
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
                      value="<?= $parametro->getValor() ?>"
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
        type="button"
        class="btn btn-sbmt txt-gray2 me-3 d-flex justify-content-center"
        id="voltarBtn"
      >
        Anterior
      </button>
      <button
        type="button"
        class="btn btn-sbmt txt-gray2 ms-3 d-flex justify-content-center"
        id="avancarBtn"
      >
        Avançar
      </button>
    </div>
  </div>
</main>

<script src="<?= $base ?>/assets/scripts/avaliacaoNav.js"></script>