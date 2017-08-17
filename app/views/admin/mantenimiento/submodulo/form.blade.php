<!-- /.modal -->
<div class="modal fade" id="submoduloModal" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              ×
          </button>
        <h4 class="modal-title">New message</h4>
      </div>
      <div class="modal-body">
        <form id="form_modulo" name="form_modulo" action="" method="post" autocomplete="off" >
            <div class="row">

                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_nombre" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese nombre">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese nombre" v-model='submodulo.nombre'>
                </div>
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_url" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese url">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese url" v-model='submodulo.url'>
                </div>
              
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_icon" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese icon">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese icon" v-model='submodulo.icon'>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                          <label>
                            Modulos
                          </label>
                          <select id='modulos' style="width:100%" class="select2">
                              <template v-for="modulo in modulos">
                                  <option v-bind:value="modulo.id">
                                    @{{ modulo.nombre }}
                                  </option>
                              </template>
                        </select>

                    </div>
                </div>
            </div>
            <!-- /.permisos -->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="box-title">Permisos</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th class="col-md-4" style="text-align:center;">submodulo</th>
                      <th class="col-md-2" style="text-align:center;">crear</th>
                      <th class="col-md-2" style="text-align:center;">leer</th>
                      <th class="col-md-2" style="text-align:center;">editar</th>
                      <th class="col-md-2" style="text-align:center;">eliminar</th>
                    </tr>
                    </thead>
                    <tbody id="tr_academicos">
                      <tr>
                        <td>
                            <label>
                                @{{submodulo.nombre}}
                            </label>
                        </td>
                        <td v-for="permiso in permisos">
                            <input type="checkbox" v-model="permiso.estado">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" @click.prevent="guardarModulo" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
