const indicadores = Array.from(document.querySelectorAll('.indicador'));
let indicadorAtualIndex = 0;

const btnAvancar = document.getElementById('avancarBtn');
const btnVoltar = document.getElementById('voltarBtn');

function mostrarIndicador(index) {
  indicadores.forEach((el, i) => {
    el.style.display = i === index ? '' : 'none';
  });

  // Controlar estado dos botões
  btnVoltar.disabled = index === 0;
  btnAvancar.textContent = (index === indicadores.length - 1) ? 'Finalizar' : 'Avançar';

  verificarResposta();
}

function verificarResposta() {
  const indicadorAtual = indicadores[indicadorAtualIndex];
  // Checa se algum radio está marcado neste indicador
  const radioChecked = indicadorAtual.querySelector('input[type=radio]:checked');
  btnAvancar.disabled = !radioChecked;
}

function avancarIndicador() {
  if (indicadorAtualIndex < indicadores.length - 1) {
    indicadorAtualIndex++;
    mostrarIndicador(indicadorAtualIndex);
  } else {
    // Finalizar: coletar respostas e enviar / mostrar resultado
    const respostas = {};

    indicadores.forEach(indicadorEl => {
      const inputName = indicadorEl.querySelector('input[type=radio]').name;
      const checkedInput = indicadorEl.querySelector(`input[name="${inputName}"]:checked`);
      respostas[inputName] = checkedInput ? checkedInput.value : null;
    });

    console.log('Respostas finais:', respostas);
    alert('Avaliação finalizada! Confira console para respostas.');

  }
}

function voltarIndicador() {
  if (indicadorAtualIndex > 0) {
    indicadorAtualIndex--;
    mostrarIndicador(indicadorAtualIndex);
  }
}

// Eventos
btnAvancar.addEventListener('click', avancarIndicador);
btnVoltar.addEventListener('click', voltarIndicador);

// Ativar/desativar botão avançar ao clicar em radio
document.querySelectorAll('.indicador input[type=radio]').forEach(input => {
  input.addEventListener('change', verificarResposta);
});

// Inicializa exibindo o primeiro indicador
mostrarIndicador(0);
