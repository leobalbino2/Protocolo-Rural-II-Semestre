document.getElementById('avaliacaoNomeForm').addEventListener('submit', function(e) {
  e.preventDefault(); 

  const form = this;
  let formData = new FormData(form);
  formData.append('ajax', '1'); 

  fetch('/protocolo-rural-ii/painel', {
    method: 'POST',
    body: formData
  })
  .then(resp => {
    if (!resp.ok) throw new Error('Erro na resposta do servidor');
    return resp.json();
  })
  .then(data => {
    document.getElementById('mensagem').innerHTML = data.msg; 
    document.querySelector('tbody.table-group-divider').innerHTML = data.tabela;
    form.reset();
    window.history.pushState({}, '', window.location.pathname);
  })
  .catch(err => {
    console.error('Erro ao enviar:', err);
    document.getElementById('mensagem').innerHTML = 'Erro ao enviar o formulário.';
  });
});
