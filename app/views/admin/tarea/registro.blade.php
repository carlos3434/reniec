@extends('layout.master')
@section('includes')
    @parent
    <!-- css -->
    @stop

@section('main')


    <div id="ribbon">

        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <ol class="breadcrumb">
            <li>Home</li>
            <li>Registro de Tareas</li>
        </ol>

    </div>

    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-table fa-fw "></i>Registro de Tareas
                </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                @if (Entrust::can('create-users'))
                <button type="button" @click.prevent="storeUser" class="btn btn-primary">Nuevo</button>
                @endif
            </div>
        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Export to PDF / Excel</h2>
                        </header>

                        <div>
                            <div class="jarviswidget-editbox">
                            </div>

                            <div class="widget-body no-padding">
                                <table id="tabla_registro_tarea" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Registro</th>
                                            <th>Vencimiento</th>
                                            <th>trabajador</th>
                                            <th>Observación</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                            <th>[]</th>
                                            <th>[]</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
    
                </article>
            </div>
        </section>

        @push('formulario')
            @include( 'admin.tarea.form.editar_tarea' )
        @endpush

    </div>

@stop



@push('scripts_custom')
    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

    <script src="/js/plugin/vue/vue-2.3.3.js"></script>
    <script src="/js/plugin/vue/axios.min.js"></script>
    {{ HTML::script('https://maps.googleapis.com/maps/api/js?key='.Config::get('constantes.map.key').'&libraries=places,geometry,drawing') }}
    {{ HTML::script("/js/plugin/markerclusterer/markerclusterer.js") }}
    {{ HTML::script("/js/plugin/markerclusterer/OverlappingMarkerSpiderfier-oms.js") }}
    {{HTML::script(mix('/admin/tarea/registro/app.js'))}}
    <!--<script src="/admin/mantenimiento/users_ajax.js"></script>
    <script src="/admin/mantenimiento/users.js"></script>-->
@endpush