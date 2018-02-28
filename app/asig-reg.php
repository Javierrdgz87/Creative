<div class="form-group">
    <div class="col-lg-12 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h3>Asignar Tarea</h3>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <form action="return false;" id="Datos" class="form-horizontal" method="POST">
            <div id="divRespuesta" class="hidden"></div>
            <input type="hidden" id="eCodTarea" name="eCodTarea">
            <div class="form-group">
              <div class="col-md-12 col-lg-12">
                <button type="button" class="btn btn-default btn-shadow" id="btnGU"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                <button type="button" class="btn btn-default btn-shadow" id="btnCO"><i class="fa fa-list-alt"></i>&nbsp;Consulta</button>
              </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-md-4 col-lg-4">
                    <label class="blockquote-title">Nombre</label>
                    <p id="tNombre"></p>
                </div>
                <div class="col-md-4 col-lg-4">
                    <label class="blockquote-title">Estatus</label>
                    <p id="Estatus"></p>
                </div>
                <div class="col-md-4 col-lg-4">
                    <label class="blockquote-title">Fecha Creación</label>
                    <p id="fhFechaCreacion"></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-lg-4">
                    <label class="blockquote-title">Usuario</label>
                    <select class="form-control" id="eCodUsuario" name="eCodUsuario" title="Usuario">
                        <option value="">Seleccione..</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
<script type="text/javascript" src="../js/oper/tare-act.js"></script>