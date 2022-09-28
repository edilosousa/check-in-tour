<?php
include 'utils/menu/menu.php';
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Relatório de visitas
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <label>Nome</label>
                    <input type="text" id="nome" class="form-control" />
                </div>
                <div class="col-sm-4">
                    <label>Inicio</label>
                    <input type="date" id="data-inicio" class="form-control" />
                </div>
                <div class="col-sm-4">
                    <label>Fim</label>
                    <input type="date" id="data-fim" class="form-control" />
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-info btn-sm" id="btn-buscar-registro">Buscar</button>
        </div>
    </div>
    <div class="card div-load-busca d-none">
        <div class="card-header">
            Resultado
        </div>
        <div class="card-body result-busca">

        </div>
    </div>
</div>
<script src="../assets/js/relatorio.js"></script>
<?php
include 'utils/menu/rodape.php';
?>