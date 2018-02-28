<div class="form-group">
    <div class="col-lg-12 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h3>Tareas</h3>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <form action="return false;" id="Datos" class="form-horizontal" method="POST">
            <div id="divRespuesta" class="hidden"></div>
            <div class="form-group">
              <div class="col-md-12 col-lg-12">
                <button type="button" class="btn btn-default btn-shadow" id="btnIN"><i class="fa fa-home"></i>&nbsp;Inicio</button>
                <button type="button" class="btn btn-default btn-shadow" id="btnNU"><i class="fa fa-pencil-alt"></i>&nbsp;Nuevo</button>
                <button type="button" class="btn btn-default btn-shadow" id="btnFI"><i class="fa fa-search"></i>&nbsp;Filtrar</button>
              </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-lg-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Filtros
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="blockquote-title">Código</label>
                                    <input type="text" class="form-control" id="eCodTarea" name="eCodTarea" autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <label class="blockquote-title">Nombre</label>
                                    <input type="text" class="form-control" id="tNombre" name="tNombre" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group col-md-4"><button class="btn btn-default" id="btnLI"><i class="fa fa-trash-alt"></i></button></div>
                          </div> <!-- body -->
                        </div> <!-- CollapseOne -->
                      </div> <!-- panel-default -->
                    </div> <!-- panel-group -->
                    <div style="overflow: auto; height: 450px;">
                      <table class="table table-sm table-hover" id="tbDatos">
                        <thead>
                          <tr class="active">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th style="white-space: nowrap">Fecha Creación</th>
                            <th>Tiempo</th>
                            <th style="white-space: nowrap">Fecha Finalización</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="../js/oper/tareas.js"></script>