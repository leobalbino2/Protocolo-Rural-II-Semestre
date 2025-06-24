// Dados vindos do PHP - estes serão preenchidos dinamicamente no HTML
// Exemplo de estrutura esperada:
// const labels = ["Indicador 1", "Indicador 2"];
// const dataValores = [3, 5];

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
    layout: {
      padding: {
        top: 20,
        bottom: 20,
        left: 20,
        right: 20,
      }
    },
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