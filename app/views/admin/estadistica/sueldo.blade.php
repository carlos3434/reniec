@extends('layout.master')
@section('includes')
    @parent
    <style type="text/css">
    body {
        font: 10px sans-serif;
    }
    .axis path,
    .axis line {
        fill: none;
        stroke: #000;
        shape-rendering: crispEdges;
    }
    /*.x.axis path {
        display: none;
    }*/
    .line {
        fill: none;
        stroke: steelblue;
        stroke-width: 1.5px;
    }

/*
    body {
        font-family: "Helvetica", sans-serif;
        font-size: 10px;
        margin: 8px;
    }*/

    svg {
        background-color: white;
        /*border: solid 1px rgba(208,199,198,1);*/
    }

    .axis {
        font: 10px sans-serif;
    }


    .x.axis path {
        display: none;
    }

    .bar {
        fill: rgba(189,54,19,1); 
        shape-rendering: crispEdges;
        opacity:0.9;
    }

    .bar text {
        fill: black;
        font: 8px sans-serif;
        text-anchor: middle;
    }
    </style>
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
            Estadisticas 
          <span>> 
            Sueldos
          </span>
        </h1>
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
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div id="Gaussian"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div id="Distribution"></div>
                        </div>
                    </div>
    
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
         @include( 'admin.mantenimiento.user.form' )
      @endpush
  </div>
      <!-- END MAIN CONTENT -->
@stop



@push('scripts_custom')
    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="/js/plugin/vue/vue-2.3.3.js"></script>
    <script src="/js/plugin/vue/axios.min.js"></script>
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

    {{HTML::script(mix('/admin/estadistica/sueldo/app.js'))}}
    <!--<script src="/admin/mantenimiento/users.js"></script>-->
@endpush