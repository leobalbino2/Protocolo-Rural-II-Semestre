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
    </div>

    <!-- Bloco do gráfico de resultados -->
    <div class="my-5">
      <h4 class="mb-3">Visualização Gráfica dos Indicadores</h4>
      <div style="max-width: 600px; margin: auto;">
        <canvas id="polarChart"></canvas>
      </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      // Dados vindos do PHP
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

      // Cores para cada indicador
      const backgroundColors = [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 205, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)',
        'rgba(201, 203, 207, 0.5)'
      ];

      const ctx = document.getElementById('polarChart').getContext('2d');
      const polarChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          labels: labels,
          datasets: [{
            label: 'Pontuação do Indicador',
            data: dataValores,
            backgroundColor: backgroundColors.slice(0, labels.length),
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Pontuação dos Indicadores'
            }
          },
          scales: {
            r: {
              pointLabels: {
                display: true,
                centerPointLabels: true,
                font: { size: 16 }
              },
              min: 0,
              max: 5
            }
          }
        }
      });
    </script>
</main>