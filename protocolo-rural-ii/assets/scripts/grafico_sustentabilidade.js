if (typeof grauSustentabilidade !== "undefined" && document.getElementById('barSustentabilidadeChart')) {
  const ctx = document.getElementById('barSustentabilidadeChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Sustentabilidade'],
      datasets: [{
        label: 'Grau de Sustentabilidade (%)',
        data: [grauSustentabilidade],
        backgroundColor: 'rgba(112, 171, 105, 0.7)',
        borderColor: 'rgba(69, 104, 64, 1)',
        borderWidth: 2,
        borderRadius: 6,
        maxBarThickness: 60
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: ctx => ctx.raw + " %"
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          max: 100,
          ticks: {
            callback: val => val + '%'
          },
          title: {
            display: true,
            text: 'Porcentagem'
          }
        }
      }
    }
  });
}