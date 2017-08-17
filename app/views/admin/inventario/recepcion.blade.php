@extends('layout.master')
@section('includes')
    @parent
    <!-- css -->
    @stop

@section('main')


  <!-- RIBBON -->
  <div id="ribbon">

    <span class="ribbon-button-alignment"> 
      <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
        <i class="fa fa-refresh"></i>
      </span> 
    </span>

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <li>Home</li><li>Dashboard</li>
    </ol>
    <!-- end breadcrumb -->

    <!-- You can also add more buttons to the
    ribbon for further usability

    Example below:

    <span class="ribbon-button-alignment pull-right">
    <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
    <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
    <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
    </span> -->

  </div>
  <!-- END RIBBON -->

  <!-- MAIN CONTENT -->
  <div class="tab-content">
    <div id="registro" class="tab-pane fade in active">
      <br>
      <form @submit.prevent="Enviar()" id="ficha_form">

      <div class="col-sm-12">
          <div class="panel panel-info">
              <div class="panel-heading">Registro de Inventario</div>
              <div class="panel-body form-horizontal">
              
                  <div class="form-group">
                      <label class="control-label col-sm-2" for="nombre">Codigo:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='inventario.codigo'>
                      </div>
                      <label class="control-label col-sm-2" for="nombre">Estado:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='inventario.estado_elemento_id'>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2" for="nombre">Denominacion:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='inventario.nombre'>
                      </div>
                      <label class="control-label col-sm-2" for="nombre">Subvcategoria:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='inventario.categoria_id'>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-2">Proveedor:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='inventario.proveedor'>
                      </div>

                      <label class="control-label col-sm-2" for="celular">Dependencia:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='elemento.dependencia_id'>
                      </div>
                  </div>
                  <div class="form-group" >
                      <label class="control-label col-sm-2">Cantidad:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='inventario.cantidad'>
                      </div>
                      <label class="control-label col-sm-2">Fecha de Ingreso:</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" v-model='elemento.fecha_ingreso'>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2" for="celular">Observacion:</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" v-model='inventario.observacion'>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class='col-sm-12 '>
                          <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                      </div>
                  </div>
              </div><!-- /body -->
          </div><!-- /panel -->
      </div>

     </form> 
    </div>
  </div>
  <!-- END MAIN CONTENT -->
@stop



@push('scripts_custom')
    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

    <script src="/js/plugin/vue/vue-2.3.3.js"></script>

    {{HTML::script(mix('/admin/inventario/bandeja/app.js'))}}
    <!--
    <script src="/admin/inventario/registro_ajax.js"></script>
    <script src="/admin/inventario/registro.js"></script>
@endpush