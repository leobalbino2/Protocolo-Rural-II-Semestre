<main>
  <div class="container mt-5 pt-5 pb-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="pb-2 mt-4">Gestão de Indicadores</h3>
      <a class="btn btn-sbmt2" data-bs-toggle="modal" data-bs-target="#criarIndicador">Criar Novo Indicador</a>
    </div>

    <div class="table-responsive">
      <table class="table">
        <thead class="fundo-tabela">
          <tr>
            <th colspan="3"><h4 class="mb-0">Nome</h4></th>
            <th><h4 class="mb-0">Estado</h4></th>
            <th colspan="8"><h4 class="mb-0">Descrição</h4></th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-group-divider border-top-0">
          <?php if (!empty($indicadores)): ?>
            <?php foreach ($indicadores as $ind): ?>
              <?php
                $classe = ($ind['estado'] == 1) ? '' : 'text-muted';
              ?>
              <tr class="<?= $classe ?>">
                <td colspan="3"><p class="my-2"><?= htmlspecialchars($ind['nome']) ?></p></td>
                <td><p class="my-2"><?= ($ind['estado'] == 1) ? 'Ativo' : 'Inativo' ?></p></td>
                <td colspan="5"><p class="my-2"><?= htmlspecialchars($ind['descricao']) ?></p></td>
                <td class="text-end align-middle" colspan="1" style="white-space: normal;">
                    <div class="mb-1">
                    <a href="<?= $base ?>/indicador/ver?id=<?= $ind['id_indicador'] ?>" class="btn btn-sbmt2 w-100">Ver</a>
                    </div>
                    <div class="mb-1">
                    <a href="<?= $base ?>/indicador/alterar?id=<?= $ind['id_indicador'] ?>" class="btn btn-sbmt4 w-100">Alterar</a>
                    </div>
                    <div>
                    <form method="POST" action="<?= $base ?>/indicador/remover" onsubmit="return confirm('Deseja realmente remover este indicador?');">
                        <input type="hidden" name="id_indicador" value="<?= $ind['id_indicador'] ?>">
                        <button type="submit" class="btn btn-sbmt3 w-100">Remover</button>
                    </form>
                    </div>
                </td>
                </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="12" class="text-center"><p class="my-2">Nenhum indicador encontrado.</p></td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="height: 15vh"></div>
  </div>

</main>
