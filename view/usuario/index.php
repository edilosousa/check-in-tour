<?php
include 'utils/menu/menu.php';
?>
  <div class="container">
    <div class="card mt-3">
      <div class="card-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Usuários</li>
          </ol>
        </nav>
      </div>
      <div class="card-body">
        <button class="btn btn-sm btn-success" data-bs-toggle='modal' data-bs-target='#novoUsuario' style="margin-left:87% ;">Novo usuario</button>
        <table class="table table-hover" id="table-visitante">
          <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Tipo</th>
            <th>Status</th>
            <th colspan="2"></th>
          </thead>
          <tbody id="dadosUsuario"></tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Excluir usuario-->
  <div class="modal fade" id="excluirUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseja realmente excluir esse usuário?
        </div>
        <div class="modal-footer">
          <input type="hidden" value="" id="id-usuario">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="btn-excluir-usuario">Excluir</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Novo visitante-->
  <div class="modal fade" id="novoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" id="form-cad">
            <div class="col-sm-12">
              <label>Nome:</label>
              <input type="text" id="nomeCad" class="form-control" />
            </div>
            <div class="col-sm-6">
              <label>Login:</label>
              <input type="text" id="loginCad" class="form-control" />
            </div>
            <div class="col-sm-6">
              <label>Tipo de usuário</label>
              <select class="form-control" id="tipoCad">
                <option>Selecione</option>
                <option value="1">Administrador</option>
                <option value="2">Recepcionista</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="btn-cad-usuario">Salvar</button>
        </div>
      </div>
    </div>
  </div>
<script src="../assets/js/usuario.js"></script>
<?php
include 'utils/menu/rodape.php';
?>