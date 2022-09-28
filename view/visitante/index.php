<?php
include 'utils/menu/menu.php';
?>
<div class="container">
  <div class="card mt-3">
    <div class="card-header">

      <form class="row g-3">
        <div class="col-auto">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Visitantes</li>
            </ol>
          </nav>
        </div>
        <div class="col-auto">
          <input type="type" class="form-control" id="inputNome" placeholder="Nome">
        </div>
        <div class="col-auto">
          <button type="button" class="btn btn-sm btn-primary mt-1 ml-2" id="btn-buscar-visitante">Buscar</button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <button class="btn btn-sm btn-success" data-bs-toggle='modal' data-bs-target='#novoVisitante' style="margin-left:87% ;">Novo visitante</button>
      <table class="table table-hover" id="table-visitante">
        <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Rg</th>
          <th>Data Cadastro</th>
          <th>Tipo</th>
          <th colspan="2"></th>
        </thead>
        <tbody id="dadosVisitante"></tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Excluir visitante-->
<div class="modal fade" id="excluirVisitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir esse visitante?
      </div>
      <div class="modal-footer">
        <input type="hidden" value="" id="id-visitante">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn-excluir-visitante">Excluir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Novo visitante-->
<div class="modal fade" id="novoVisitante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo visitante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="form-cad">
          <div class="col-sm-12">
            <label>Nome:</label>
            <input type="text" id="nomeCad" class="form-control" />
          </div>
          <div class="col-sm-6">
            <label>RG:</label>
            <input type="text" id="rgCad" class="form-control" />
          </div>
          <div class="col-sm-6">
            <label>Tipo de visitante</label>
            <select class="form-control" id="tipoCad">
              <option>Selecione</option>
              <option value="1">Brasileiro</option>
              <option value="2">Estrangeiro</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn-cad-visitante">Salvar</button>
      </div>
    </div>
  </div>
</div>
<script src="../assets/js/visitante.js"></script>
<?php
include 'utils/menu/rodape.php';
?>