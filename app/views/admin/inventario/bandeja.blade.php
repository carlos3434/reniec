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
  <div id="content">

    <div class="row">
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
          <i class="fa fa-table fa-fw "></i> 
            Table 
          <span>> 
            Data Tables
          </span>
        </h1>
      </div>
      <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
          @if (Entrust::can('create-users'))
            <button type="button" @click.prevent="storeUser" class="btn btn-primary">Nuevo</button>
          @endif
      </div>
    </div>
    
    <!-- widget grid -->
    <section id="widget-grid" class="">
    
      <!-- row -->
      <div class="row">
    
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
          <!-- Widget ID (each widget will need unique ID)-->
          <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
    
            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"
    
            -->
            <header>
              <span class="widget-icon"> <i class="fa fa-table"></i> </span>
              <h2>Export to PDF / Excel</h2>
    
            </header>
    
            <!-- widget div-->
            <div>
    
              <!-- widget edit box -->
              <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->
    
              </div>
              <!-- end widget edit box -->
    
              <!-- widget content -->
              <div class="widget-body no-padding">
    
                <table id="datatable_tabletools" class="table table-striped table-bordered table-hover" width="100%">
                  <thead>
                    <tr>
                      <th data-hide="phone">ID</th>
                      <th data-class="expand">Name</th>
                      <th>codigo</th>
                      <th data-hide="phone">proveedor</th>
                      <th data-hide="phone">cantidad</th>
                      <th data-hide="phone">categoria</th>
                      <th data-hide="phone,tablet">observacion</th>
                      <th data-hide="phone,tablet">[]</th>
                      <th data-hide="phone,tablet">Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
    
              </div>
              
            </div>
            <!-- end widget div -->
    
          </div>
          <!-- end widget -->
    
        </article>
        <!-- WIDGET END -->
    
      </div>
    
      <!-- end row -->
    
      <!-- end row -->
    
    </section>
    <!-- end widget grid -->
      @push('formulario')
         @include( 'admin.inventario.registro.form' )
      @endpush
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
    <script src="/admin/inventario/bandeja_ajax.js"></script>
    <script src="/admin/inventario/bandeja.js"></script>-->
@endpush