<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors"
    />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>Check-in Tour</title>

    <script src="../../utils/jquery/jquery-3.6.1.min.js"></script>
    <script src="../../utils/bootstrap5/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link
      href="../../utils/bootstrap5/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="../../assets/images/check-in.png"
            alt=""
            width="100"
            height="50"
          />
        </a>
        <div class="collapse navbar-collapse mt-4" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link fw-bold"
                aria-current="page"
                href="../../dashboard/index"
                >Dashboard</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link active fw-bold" href="../../usuario/index">Usuário</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../../visitante/index"
                >Visitante</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../../relatorio/index"
                >Relatório</a
              >
            </li>
          </ul>
          <form class="d-flex">
            <a class="btn btn-sm btn-danger" href="../../">Sair</a>
          </form>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="card mt-3">
        <div class="card-header">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <a href="../../usuario/index" class="link-secondary">Usuários</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
          </nav>
        </div>
        <div class="card-body">
          <form class="row g-3" id="form-edit">
            <input type="hidden" value="" id="id">
            <div class="col-sm-12">
              <label>Nome:</label>
              <input type="text" id="nome" class="form-control" />
            </div>
            <div class="col-sm-6">
              <label>Login:</label>
              <input type="text" id="login" class="form-control" />
            </div>
            <div class="col-sm-6">
              <label>Password:</label>
              <input type="password" id="password" class="form-control" />
            </div>
            <div class="col-sm-4">
              <label>Tipo de usuário</label>
              <select class="form-control" id="tipo">
                <option>Selecione</option>
                <option value="1">Administrador</option>
                <option value="2">Recepcionista</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label>Data de Cadastro:</label>
              <input type="text" disabled="true" id="data-cad" class="form-control" />
            </div>
            <div class="col-sm-4">
              <label>Status:</label>
              <select class="form-control" id="status">
                <option>Selecione</option>
                <option value="1">Ativo</option>
                <option value="2">Inativo</option>
              </select>
            </div>
          </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-info" id="button-edit">Salvar</button>
      </div>
    </div>
  </body>
  <script src="../../assets/js/editarUsuario.js"></script>
</html>
