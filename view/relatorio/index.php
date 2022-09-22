<?php
include 'utils/menu/menu.php';
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Relatório
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <label>Nome</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="col-sm-4">
                    <label>Inicio</label>
                    <input type="date" class="form-control" />
                </div>
                <div class="col-sm-4">
                    <label>Fim</label>
                    <input type="date" class="form-control" />
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-info btn-sm">Buscar</button>
        </div>
    </div>
</div>