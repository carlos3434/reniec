<!-- /.modal -->
<div class="modal fade" id="rolModal" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              ×
          </button>
        <h4 class="modal-title">New message</h4>
      </div>
      <div class="modal-body">
        <form id="form_rol" name="form_personas_modal" action="" method="post" autocomplete="off" >
            <div class="row">

                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_nombres" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombres">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre" v-model='rol.nombre'>
                </div>
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_apellidos" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Apellidos">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese Apellidos" v-model='rol.nombre_mostrar'>
                </div>
              
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_dni" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese DNI">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese DNI" v-model='rol.descripcion'>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                          <label>
                            
                          </label>
                          <select id='modulos' multiple style="width:100%" class="select2">
                              <template v-for="modulo in modulos">
                                  <optgroup :label="modulo.nombre">
                                      <option v-for="submodulo in modulo.children" v-bind:value="submodulo.id">
                                        @{{ submodulo.nombre }}
                                      </option>
                                  </optgroup>
                              </template>
                        </select>
                    </div>
                </div>
            </div>

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
                      <tr v-for="submodulo in submodulos">
                        <td>
                            <label>
                                @{{submodulo.nombre}}
                            </label>
                        </td>
                        <td v-for="permiso in submodulo.permisos">
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
        <button type="button" @click.prevent="guardarRole" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
