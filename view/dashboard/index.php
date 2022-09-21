<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
   <meta name="generator" content="Hugo 0.88.1">
   <title>Check-in Tour - Dashboard</title>

   <script src="../utils/jquery/jquery-3.6.1.min.js"></script>
   <script src="../utils/bootstrap5/js/bootstrap.min.js"></script>
   <!-- Bootstrap core CSS -->
   <link href="../utils/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
   <!-- Chart JS -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="text-center">
   <nav class="navbar navbar-expand-lg navbar-light bg-success">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">
            <img src="../assets/images/check-in.png" alt="" width="100" height="50">
         </a>
         <div class="collapse navbar-collapse mt-4" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active fw-bold" aria-current="page" href="#">Dashboard</a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link fw-bold" href="#">Usuário</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link fw-bold" href="../visitante/index">Visitante</a>
               </li>
            </ul>
            <form class="d-flex">
               <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
               <a class="btn btn-sm btn-danger" href="../">Sair</a>
            </form>
         </div>
      </div>
   </nav>
   <div class="container mt-5">
      <div class="row">
         <div class="col-sm-12" id="graph">
            <h5>Gráfico - Ano 2022</h5>
            <canvas id="myChart" width="1200" height="350"></canvas>
         </div>
      </div>
      <div class="row" id="mesVisita"></div>
      <div class="row mt-4">
         <div class="col-sm-4"></div>
         <div class="col-sm-4">
            <div class="d-grid gap-2 col-6 mx-auto">
               <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkinModal" type="button">Check In</button>
            </div>
         </div>
         <div class="col-sm-4"></div>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Check In de visitante</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <input type="text" class="form-control" id="buscarVisitante" placeholder="Número de identificação"/>
            </div>
            <div class="modal-footer text-start" id="footerBuscarVisistante">
            </div>
         </div>
      </div>
   </div>
   <script src="../assets/js/dashboard.js"></script>
</body>

</html>