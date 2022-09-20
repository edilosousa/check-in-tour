<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.88.1" />
  <title>Check-in Tour - Dashboard</title>

  <script src="../utils/jquery/jquery-3.6.1.min.js"></script>
  <script src="../utils/bootstrap5/js/bootstrap.min.js"></script>
  <script src="../utils/DataTables/datatables.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="../utils/bootstrap5/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../utils/DataTables/datatables.min.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../assets/images/check-in.png" alt="" width="100" height="50" />
      </a>
      <div class="collapse navbar-collapse mt-4" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="../dashboard/index">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Usuário</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fw-bold" href="../visitante/index">Visitante</a>
          </li>
        </ul>
        <form class="d-flex">
          <a class="btn btn-sm btn-danger" href="../">Sair</a>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="card mt-3">
      <div class="card-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Visitantes</li>
          </ol>
        </nav>
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

</body>
<script src="../assets/js/visitante.js"></script>

</html>