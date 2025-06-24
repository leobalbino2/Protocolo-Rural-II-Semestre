<?php
// Página de Resultado da Avaliação - Página HTML estruturada com PHP
?>

<!----------------------------------- Main ----------------------------------->
<main>
  <div class="container mt-5 pt-5 pb-5">
    <div mt-5>
      <h3 class="pb-2">
        Resultado: <span id="nomeAvaliacao" class="m-1 txt-gray"><?= htmlspecialchars($avaliacao->getNomePropriedade()); ?></span>
      </h3>

      <div class="table-responsive ">
        <table class="table">
          <thead class="fundo-tabela">
            <tr>
              <th colspan="1"><h4 class="mb-0">Indicador</h4></th>
              <th colspan="1"><h4 class="mb-0">Parâmetro Selecionado</h4></th>
              <th colspan="1"><h4 class="mb-0">Resultado</h4></th>
            </tr>
          </thead>
          <tbody class="table-group-divider border-top-0">
            <?php if (!empty($respostas)): ?>
              <?php foreach ($respostas as $resposta): ?>
                <tr>
                  <td><?= htmlspecialchars($resposta->getNomeIndicador()) ?></td>
                  <td><?= htmlspecialchars($resposta->getDescricaoParametro()) ?></td>
                  <td><?= htmlspecialchars($resposta->getValorParametro()) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3"><p class="my-2 text-center">Nenhuma resposta encontrada.</p></td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    

    <!-- Container das duas colunas -->
    <div style="display: flex; gap: 40px; justify-content: center; align-items: flex-start; margin: 40px 0; flex-wrap: wrap;">

      <!-- Gráfico de porcentagem sustentabilidade -->
      <div style="flex: 1 1 300px; max-width: 500px;">
        <h4 class="mb-3 text-center">Grau de Sustentabilidade da Propriedade</h4>
        <div>
          <canvas id="barSustentabilidadeChart" width="400" height="400"></canvas>
        </div>
      </div>

      <!-- Gráfico de indicadores -->
      <div style="flex: 1 1 300px; max-width: 600px;">
        <h4 class="mb-3 text-center">Visualização Gráfica dos Indicadores</h4>
        <div>
          <canvas id="polarChart" width="400" height="400"></canvas>
        </div>
      </div>
    </div>

    <!-- Variáveis JS vindas do PHP -->
    <script>
      const labels = [
        <?php foreach($respostas as $resposta): ?>
          "<?= htmlspecialchars($resposta->getNomeIndicador()) ?>",
        <?php endforeach; ?>
      ];
      const dataValores = [
        <?php foreach($respostas as $resposta): ?>
          <?= (int)$resposta->getValorParametro() ?>,
        <?php endforeach; ?>
      ];
      const backgroundColors = [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 205, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)',
        'rgba(201, 203, 207, 0.5)'
      ];
      // Adicione esta linha abaixo:
      const grauSustentabilidade = <?= (int)$avaliacao->getGrauPorcentagem() ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./assets/scripts/grafico_parametro.js"></script>
    <script src="./assets/scripts/grafico_sustentabilidade.js"></script>
    
  </div>
</main>