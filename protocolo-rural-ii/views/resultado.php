<!----------------------------------- Main ----------------------------------->
<main>
      <div class="container mt-5 pt-5 pb-5">
        <div>
          <div class="d-flex mt-2">
            <img
              class="cursor-pointer"
              id="voltar"
              class="d-none d-lg-block pe-auto"
              src="../../imgs/seta.png"
              alt="voltar"
              width="29"
              onclick="window.history.back()"
            />
            <h5 class="fw-bold m-3 text-center">Voltar</h5>
          </div>
        </div>
    
        <h3 class="fw-bold pb-2">
          Resultados <span id="nomeAvaliacao" class="m-5 txt-gray ">Exemplo Fazenda</span>
        </h3>
    
        <div class="table-responsive ">
            <table class="table">
              <thead class="fundo-tabela">
                <tr>
                  <th colspan="8"><h4 class="mb-0">Indicadores</h4></th>
                </tr>
              </thead>
              <tbody class="table-group-divider border-top-0">
                <tr>
                  <td><p class="my-2">Nome do Indicador</p></td>
                  <td><p class="w-10 my-2 text-center">Muito Baixo</p></td>
                  <td><p class="w-10 my-2 text-center">Baixo</p></td>
                  <td><p class="w-10 my-2 text-center">Insuficiente</p></td>
                  <td><p class="w-10 my-2 text-center">Limitado</p></td>
                  <td><p class="w-10 my-2 text-center">Parcial</p></td>
                  <td><p class="w-10 my-2 text-center">Pleno</p></td>
                  <td><p class="w-10 my-2 text-center">Avaliação</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Situação das Nascentes</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res1" class="my-2">-</p></td>
                </tr>
                
                <tr>
                    <td><p class="my-2">Situação das Nascentes</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res2" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Áreas de Preservação Permanente (APP) </p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res3" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Reserva Legal (RL) </p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res4" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Regularização Ambiental</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res5" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Áreas Degradadas</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res6" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Conservação de Solo, Carreadores e Estradas Rurais</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res7" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Diversidade do Agroecossistema</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res8" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Manejo Agronômico</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res9" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Ecotecnologias</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res10" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Infraestrutura do Imóvel Rural</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res11" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Produtividade e Rentabilidade</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res12" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Gerenciamento de Resíduos Sólidos</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res13" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Saneamento Rural</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res14" class="my-2">-</p></td>
                </tr>

                <tr>
                    <td><p class="my-2">Saúde e Segurança no Trabalho Rural</p></td>
                    <td class="w-10 text-center"><p class="my-2">0</p></td>
                    <td class="w-10 text-center"><p class="my-2">1</p></td>
                    <td class="w-10 text-center"><p class="my-2">2</p></td>
                    <td class="w-10 text-center"><p class="my-2">3</p></td>
                    <td class="w-10 text-center"><p class="my-2">4</p></td>
                    <td class="w-10 text-center"><p class="my-2">5</p></td>
                    <td class="w-10 text-center"><p id="res15" class="my-2">-</p></td>
                </tr>

              </tbody>
            </table>
          </div>
          <div style="height: 45vh"></div>
        </div>
  
    </main>