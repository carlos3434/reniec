var Tareas = {
    getAll: function getAll(data, callback) {
        data.per_page = data.length;
        data.page = (data.start + data.length) / data.length;
        data.filter = data.search.value;
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
        $.get(url, data, function (response) {
            callback(response);
            $(".overlay,.loading-img").remove();
        });
    },
    get: function get(id) {
        axios.get(url + '/' + id, headerAxios).then(function (response) {
            vm.tarea = response.data;
            vm.movimientos = response.data.movimientos;
            pintarMarkers();
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store: function store() {
        vm.tarea.DueDate = $('input[name=DueDate]').val();
        vm.tarea.estado_tarea_id = $('#estado_tarea_id').val();
        vm.tarea.tipo_tarea_id = $('#tipo_tarea_id').val();
        vm.tarea.EmployeeNumber = $('#EmployeeNumber').val();
        axios.post(url, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#modal-tarea").modal('hide');
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    /** guardar existente
    */
    update: function update(id) {
        vm.tarea.DueDate = $('input[name=DueDate]').val();
        axios.put(url + '/' + id, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#modal-tarea").modal('hide');
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    destroy: function destroy(id) {
        axios.delete(url + '/' + id, headerAxios).then(function (response) {
            user = response;
        }).catch(function (e) {
            vm.errors.push(e);
        });
    }
};
var Listas = {
    all: function all() {
        var _this = this;

        axios.all([axios.get('trabajadores/lista', headerAxios), axios.get('estadotarea/lista', headerAxios), axios.get('tipotarea/lista', headerAxios)]).then(axios.spread(function (trabajadores, estadotarea, tipotarea) {
            vm.trabajadores = trabajadores.data;
            vm.estadotarea = estadotarea.data;
            vm.tipotarea = tipotarea.data;
            /*$selectRoles = $('#roles').select2({
                dropdownParent: $('#userModal')
            });*/
        })).catch(function (e) {
            _this.errors.push(e);
        });
    }
};
var Formulario = {
    get: function get(id) {
        headerAxios.params = {
            movimiento_id: id
        };
        axios.get('formularios/lista', headerAxios).then(function (response) {
            //Tarea.detalleHtml(obj.datos,paso);
            //reccorrer imagenes
            for (var i = 0; i < response.data.imagenes.length; i++) {
                console.log(response.data.imagenes[i]);
            }
            /*
            html+='<a class="fancybox-button" rel="fancybox-button" href="data:image/jpg;base64,'+casa_img1+'" title="Img CASA 1">';
            html+="     <img src='data:image/jpg;base64,"+casa_img1+"' style='width:250px;height:250px;'  />";
            html+='</a>';*/
            console.log(response);
        }).catch(function (e) {
            vm.errors.push(e);
        });
        /*
                $.ajax({
                    url         : 'formularios/lista',
                    type        : 'POST',
                    cache       : false,
                    dataType    : 'json',
                    data        : variables,
                    beforeSend : function() {
                        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
                    },
                    success : function(obj) {
                        if(obj.rst==1){
                            Tarea.detalleHtml(obj.datos,paso);
                        }
                        $(".overlay,.loading-img").remove();
                    },
                    error: function(){
                        $(".overlay,.loading-img").remove();
                        Psi.mensaje('danger', 'Ocurrio una interrupción en el proceso, Favor de intentar nuevamente.', 6000);
                    }
                });*/
    }
};
var vm = new Vue({
    el: '#main',
    data: {
        errors: [],
        tarea: [],
        accion: '',
        trabajadores: [],
        estadotarea: [],
        tipotarea: [],
        movimientos: [],
        map: [],
        markers: [],
        bounds: [],
        line: [],
        nomarkers: []
    },
    methods: {
        /**boton de modal Guardar*/
        guardarTarea: function guardarTarea() {
            if (vm.accion == 'nuevo') {
                Tareas.store(vm.tarea);
            } else {
                Tareas.update(vm.tarea.id);
            }
        },
        /**boton llama a modal, nuevo user */
        storeUser: function storeUser() {
            $("#modal-tarea").modal();
            vm.accion = 'nuevo';
            vm.tarea = {};
            vm.movimientos = {};
            //$selectRoles.val([]).trigger("change");
        },
        roles: function roles() {
            Roles.all();
        },
        verFormulario: function verFormulario(id) {
            //var variables={movimiento_id:id};
            Formulario.get(id);
        }
    }
});
var gm = google.maps;

var config = {
    el: 'mapa_tarea',
    lat: -12.109129,
    lon: -77.016123,
    zoom: 15,
    minZoom: 15,
    type: gm.MapTypeId.ROADMAP
};

var spiderConfig = {
    keepSpiderfied: true,
    event: 'mouseover'
};

var mapOptions = {
    center: new gm.LatLng(config.lat, config.lon),
    zoom: config.zoom,
    mapTypeId: config.type
};
var markerSpiderfier;
var infoWindows = [];
removeMarkers = function removeMarkers() {
    for (var i = 0; i < vm.markers.length; i++) {
        vm.markers[i].setMap(null);
    }
    vm.markers = [];
};

addMarker = function addMarker(location, label, icon, drag) {
    //var location = new gm.LatLng(coordy, coordx);
    var marker = new gm.Marker({
        position: location,
        //icon: icon,
        draggable: drag,
        map: vm.map
    });
    vm.markers.push(marker);
    vm.bounds.extend(location);
    marker.infowindow = new gm.InfoWindow({ content: label });

    gm.event.addListener(marker, 'click', function () {
        if (infoWindows.length > 0) {
            for (var j = 0; j < infoWindows.length; j++) {
                infoWindows[j].close();
            }
        }
        this.infowindow.open(vm.map, this);
        infoWindows.push(this.infowindow);
    });
    markerSpiderfier.addMarker(marker);
};

////////////////////////////
var tabla = 'tabla_registro_tarea';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $selectRoles;

var breakpointDefinition = {
    tablet: 1024,
    phone: 480
};

var columns = [{
    data: "TaskNumber",
    name: "TaskNumber",
    searchable: false
}, {
    data: "created_at",
    name: "created_at",
    searchable: false
}, {
    data: "DueDate",
    name: "DueDate",
    searchable: false
}, {
    data: "trabajador",
    name: "trabajador",
    searchable: false
}, {
    data: "Description",
    name: "Description",
    searchable: false
}, {
    data: "tipo",
    name: "tipo",
    searchable: false
}, {
    data: "estado",
    name: "estado",
    searchable: false
}, {
    name: "created_at",
    searchable: false,
    data: function data(row, type, val, meta) {
        return '<td><button type="button" onClick="editar(' + row.id + ')" class="btn btn-primary">Editar</button></td>';
    },
    "defaultContent": ''
}, {
    name: "deleted_at",
    searchable: false,
    data: function data(row, type, val, meta) {
        estado = '<button type="button"  onClick="activar(' + row.id + ')" class="btn btn-success">Inactivo</button>';
        if (row.deleted_at === null) {
            estado = '<button type="button" onClick="desactivar(' + row.id + ')" class="btn btn-success">Activo</button>';
        }
        return estado;
    },
    defaultContent: ''
}];
var url = "api/tareas";
var tableTools = {
    "aButtons": ["copy", "csv", "xls", {
        "sExtends": "pdf",
        "sTitle": "SmartAdmin_PDF",
        "sPdfMessage": "SmartAdmin PDF Export",
        "sPdfSize": "letter"
    }, {
        "sExtends": "print",
        "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
    }],
    "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
};
var dataTable = {
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "searching": true,
    "ordering": true,
    "stateLoadCallback": function stateLoadCallback(settings) {
        //$("body").append('<div class="overlay"></div><div class="loading-img"></div>');
    },
    "stateSaveCallback": function stateSaveCallback(settings) {// Cuando finaliza el ajax
        //$(".overlay,.loading-img").remove();
    },
    ajax: function ajax(data, callback, settings) {
        Tareas.getAll(data, callback);
    },
    "columns": columns,
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" + "t" + "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oLanguage": {
        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
    },
    "oTableTools": tableTools,
    "autoWidth": true,
    "preDrawCallback": function preDrawCallback() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_tabletools) {
            responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#' + tabla), breakpointDefinition);
        }
    },
    "rowCallback": function rowCallback(nRow, data) {
        responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
    },
    "drawCallback": function drawCallback(oSettings) {
        responsiveHelper_datatable_tabletools.respond();
    }
};
var datatable;
$(document).ready(function () {
    pageSetUp();
    //Roles.all();
    datatable = $('#' + tabla).DataTable(dataTable);
    //$('#st-detalle a').on('shown.bs.tab', function(e){
    Listas.all();
    $('#modal-tarea').on('shown.bs.modal', function (event) {
        //if ($(this)[0].hash=='#mapa') {
        //pintarMapa();
        //}
        clearMapa();
        iniciarMapa();
        if (vm.accion == 'nuevo') {
            // addMarker( coordy, coordx, label, icon,true);
            /*
                        var myLatlng = new google.maps.LatLng(22,79);
                        var myOptions = {
                          zoom: 5,
                          center: myLatlng,
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
            
                        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            
                        addMarker(myLatlng, 'Default Marker', map);
            
                        map.addListener('click',function(event) {
                            addMarker(event.latLng, 'Click Generated Marker', map);
                        };*/

        } else {

            Tareas.get(vm.tarea.id);
        }
    });
    $('#nav_modal a').on('shown.bs.tab', function (e) {
        if ($(this)[0].hash == '#tab_datos') {
            $('#footer_datos').show();
            $('#footer_movimientos').hide();
            console.log("tab_datos");
        } else if ($(this)[0].hash == '#tab_movimientos') {
            $('#footer_datos').hide();
            $('#footer_movimientos').show();
            console.log("tab_movimientos");
        }
    });
});
/**
   
*/
editar = function editar(id) {
    vm.tarea.id = id;
    vm.accion = 'editar';
    $("#modal-tarea").modal();
    //Tareas.get(id);
};
desactivar = function desactivar(id) {
    reload();
};
activar = function activar(id) {
    reload();
};
reload = function reload() {
    datatable.ajax.reload(null, false);
};
clearMapa = function clearMapa() {
    try {
        markerSpiderfier.clearMarkers();
    } catch (c) {}
    removeMarkers();
};

iniciarMapa = function iniciarMapa() {
    vm.map = new gm.Map(document.getElementById("mapa_tarea"), mapOptions);

    vm.map.addListener('click', function (event) {
        icon = "/img/icons/tap.png";
        //var myLatLng = event.latLng;
        vm.tarea.coordy = event.latLng.lat();
        vm.tarea.coordx = event.latLng.lng();

        removeMarkers();
        addMarker(event.latLng, 'Click Generated Marker', icon, true);
    });
    vm.bounds = new gm.LatLngBounds();
    markerSpiderfier = new OverlappingMarkerSpiderfier(vm.map, spiderConfig);
};

pintarMarkers = function pintarMarkers() {
    //vm.bounds = new gm.LatLngBounds();
    //var icon = "img/icons/tec_0e8499.png";
    for (var i = vm.movimientos.length - 1; i >= 0; i--) {
        var coordx = parseFloat(vm.movimientos[i].coordx);
        var coordy = parseFloat(vm.movimientos[i].coordy);
        icon = "/img/icons/tap.png";
        label = "<label><b>TAP</b></label>";
        var location = new gm.LatLng(coordy, coordx);
        addMarker(location, label, icon, false);
    }
    var markerCluster = new MarkerClusterer(vm.map, vm.markers);
    markerCluster.setMaxZoom(config.minZoom);
    vm.map.fitBounds(vm.bounds);
};