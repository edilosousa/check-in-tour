<?php
include 'utils/menu/menu.php';
?>
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
            <input type="text" class="form-control" maxlength="8" id="buscarVisitante" placeholder="Número de identificação" />
            <div class="mt-3" id="footerBuscarVisistante">

            </div>
         </div>
         <div class="modal-footer">

         </div>
      </div>
   </div>
</div>
<script src="../assets/js/dashboard.js"></script>
<?php
include 'utils/menu/rodape.php';
?>