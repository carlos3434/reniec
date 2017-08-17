@extends('layout.master')
@section('includes')

  
    @parent
        {{ HTML::style('js/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}
    <!-- css -->
    @stop

@section('main')
  <style type="text/css">
.listado-mesas{}
.listado-mesas a {text-align: center; display: block;  width: 100%; padding: 15px 15px;  border-radius: 10px; margin:5px 0px;}
.listado-mesas a i.fa-table { font-size: 40px; color: #fff; vertical-align: middle; margin-right: 10px; text-align: left;}
.listado-mesas a span{ display: inline-block; vertical-align: middle; color: #fff; font-weight: 700; font-size: 18px;}}
.listado-productos ul {list-style: none; padding: 10px 0px;}
.listado-productos ul li input[type=checkbox] { vertical-align: middle; margin-right: 10px;}
#modal-pedido h3{ margin-top: 0px;}
#modal-pedido .tab-content .tab-pane {box-shadow: 1px 1px 1px 1px rgba(167, 154, 154, 0.5); padding: 5px 10px;}
#modal-pedido .tab-content .tab-pane ul {  list-style: none; padding: 10px 0px; width: 100%;}
#modal-pedido .tab-content .tab-pane ul li{ border-bottom: solid 2px #3c8dbc; padding: 5px; width: 100%; margin-bottom: 5px;}
#modal-pedido .tab-content .tab-pane ul li input[type=checkbox] { vertical-align: middle; margin: 0px; margin-right: 10px;}
#modal-pedido .tab-content .tab-pane ul li span.descripcion {display: inline-block; vertical-align: middle; padding: 5px; width: calc(100% - 50px);  width: -moz-calc(100% - 50px); width: -webkit-calc(100% - 50px);}
#modal-pedido .tab-content .tab-pane ul li span.stock {display: inline-block; float: right; vertical-align: middle;  padding: 5px; background: #a59d9d; color: #fff;}
#modal-pedido .tab-content .tab-pane ul.resultado li span.descripcion{width: calc(100% - 100px); width: -moz-calc(100% - 100px); width: -webkit-calc(100% - 100px);}
#modal-pedido .tab-content .tab-pane ul.resultado li input.stock{display: inline-block; width: 60px; vertical-align: middle; text-align: center; padding: 5px; font-size: 20px; font-weight: 700;}
.opciones{padding: 0px;}
.listado-estados{margin-bottom: 15px;   border-bottom: solid 1px #969292; padding-bottom: 15px;}
.btn-agregar-producto{color: #3c8dbc; cursor: pointer; font-size: 40px; text-align: center;  display: block;  margin: 10px auto;}
.btn-remover-producto{ color: #dd4b39; font-size: 40px; display: block; margin: 10px auto; text-align: center;}
h2.titulo{    margin: 0px 0px 10px 0px; text-transform: uppercase; font-size: 20px;  font-weight: 700;}

@media screen and (min-width: 768px){
.modal-dialog {width: 750px;}
}
@media screen and (max-width:700px){
.listado-mesas .col-lg-2{width: 31.333333%; display: inline-block;}
}
@media screen and (max-width:600px){
.listado-mesas .col-lg-2{width: 45%; display: inline-block;}
}
@media screen and (max-width:450px){
.listado-mesas .col-lg-2{width: 100%; display: inline-block;}
}

  </style>

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
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12">

            <div class="row listado-mesas">
              @foreach ($mesas as $key => $value)
                @if($value->estado === 1)
                    <div class="col-lg-2">
                      <a href="javascript:void(0);" class="btn-mesa" data-id = "{{ $value->id}}" style='background-color: #77dd77'>
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span>{{$value->nombre}}</span>
                      </a>
                    </div>
                @else
                    <div class="col-lg-2">
                      <a href="javascript:void(0);" class="btn-mesa" data-id = "{{ $value->id}}" style='background-color: #FFA420'>
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span>{{$value->nombre}}</span>
                      </a>
                    </div>
                @endif
                
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT -->
@stop

@section('formulario')
  @include( 'admin.orders.form.pedido' )
    {{-- @include( 'admin.mantenimiento.form.persona' )  --}}
@stop

@push('scripts_custom')
    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
    <script src="js/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>


    <script src="/admin/slct_global_ajax.js"></script>
    <script src="/admin/slct_global.js"></script>
    <script src="/admin/order/order_ajax.js"></script>
    <script src="/admin/order/order.js"></script>
@endpush