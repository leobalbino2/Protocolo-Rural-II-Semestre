<?php
// Avaliação - Página HTML estruturada com PHP
?>

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
          Avaliação <span id="nomeAvaliacao" class="m-5 txt-gray ">Exemplo Fazenda</span>
        </h3>
    
        <table class="table table-hover" id="perguntasTable">
          <thead>
            <tr>
              <th class="fundo-tabela">
                <h4 class="mb-0 me-auto" id="pergunta-titulo">Indicador 1 - Situação das Nascentes</h4>
              </th>
            </tr>
          </thead>
          <tbody class="table-group-divider border-top-0" id="perguntasContainer">
            <tr id="pergunta1">
              <td colspan="2">
                <label class="d-flex align-items-center" style="cursor: pointer">
                  <p class="my-2 me-auto">100% protegidas com mata ciliar de raio > 50m</p>
                  <input class="form-check-input ms-auto me-5" type="radio" name="nascentes" value="5"/>
                </label>
              </td>
            </tr>
    
            <tr id="pergunta2">
              <td colspan="2">
                <label class="d-flex align-items-center" style="cursor: pointer">
                  <p class="my-2 me-auto">100% protegidas com mata ciliar de raio < 50m e > 15m</p>
                  <input class="form-check-input ms-auto me-5" type="radio" name="nascentes" value="4"/>
                </label>
              </td>
            </tr>
    
            <tr id="pergunta3">
              <td colspan="2">
                <label class="d-flex align-items-center" style="cursor: pointer">
                  <p class="my-2 me-auto">+ 50% protegidas com mata ciliar de raio > 50m</p>
                  <input class="form-check-input ms-auto me-5" type="radio" name="nascentes" value="3"/>
                </label>
              </td>
            </tr>
    
            <tr id="pergunta4">
              <td colspan="2">
                <label class="d-flex align-items-center" style="cursor: pointer">
                  <p class="my-2 me-auto">+ 50% protegidas com mata ciliar de raio < 50m e > 15m</p>
                  <input class="form-check-input ms-auto me-5" type="radio" name="nascentes" value="2"/>
                </label>
              </td>
            </tr>
    
            <tr id="pergunta5">
              <td colspan="2">
                <label class="d-flex align-items-center" style="cursor: pointer">
                  <p class="my-2 me-auto">- 50% protegidas com mata ciliar independente do raio</p>
                  <input class="form-check-input ms-auto me-5" type="radio" name="nascentes" value="1"/>
                </label>
              </td>
            </tr>
    
            <tr id="pergunta6">
              <td colspan="2">
                <label class="d-flex align-items-center" style="cursor: pointer">
                  <p class="my-2 me-auto">Todas as nascentes desprotegidas</p>
                  <input class="form-check-input ms-auto me-5" type="radio" name="nascentes" value="0"/>
                </label>
              </td>
            </tr>
          </tbody>
        </table>
    
        <div class="container d-flex justify-content-center mt-5">  
          <button type="button" class="btn btn-sbmt txt-gray2 me-3 d-flex justify-content-center" id="voltarBtn">Anterior</button>
          <button type="button" class="btn btn-sbmt txt-gray2 ms-3 d-flex justify-content-center" id="avancarBtn">Avançar</button>
        </div>
      </div>
    </main>