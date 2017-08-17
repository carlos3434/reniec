var Submodulos = {
    all: function all() {
        $.get("api/submodulos", function (response) {
            //dataUsers(response);
            //alert( "success" );
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    },
    get: function get(id) {
        $.get("api/submodulos/" + id, function (response) {
            vm.submodulo = response;
            vm.permisos = response.permisos;
            pintarPermisos();
            $selectModulos.val(vm.submodulo.modulo_id).trigger("change");
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    },
    /** guardar nuevo
    */
    store: function store() {
        vm.submodulo.modulo_id = $selectModulos.val();
        $.post("api/submodulos", vm.submodulo, function (response) {
            reload();
            $("#submoduloModal").modal('hide');
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    },
    /** guardar existente
    */
    update: function update(id) {
        vm.submodulo.modulo_id = $selectModulos.val();
        $.put('api/submodulos/' + id, vm.submodulo, function (response) {
            reload();
            $("#submoduloModal").modal('hide');
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    },
    destroy: function destroy(id) {
        $.delete("api/submodulos/" + id, function (response) {
            //user = response;
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    },
    CambiarEstadoAreas: function CambiarEstadoAreas(id, AD) {}
};
var Modulos = {
    all: function all() {
        $.get("modulos/lista", function (response) {
            vm.modulos = response;
            $selectModulos = $('#modulos').select2({
                dropdownParent: $('#submoduloModal')
            });
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    }
};
//Vue.component('v-select', VueSelect.VueSelect);
var vm = new Vue({
    el: '#main',
    data: {
        submodulo: {},
        modulos: {},
        permisos: {},
        accion: ''
    },

    methods: {
        setPermisosCRUD: function setPermisosCRUD() {
            vm.permisos = [];
            for (var i = 3; i >= 0; i--) {
                var permiso = {
                    orden: 1,
                    estado: false
                };
                vm.permisos.push(permiso);
            }
        },
        /**boton de modal Guardar*/
        guardarModulo: function guardarModulo() {
            if (vm.accion == 'nuevo') {
                Submodulos.store();
            } else {
                Submodulos.update(vm.submodulo.id);
            }
        },
        /**boton llama a modal, nuevo rol */
        storeModulo: function storeModulo() {
            vm.accion = 'nuevo';
            //vm.submodulo.icon = '';
            //vm.submodulo.url = '';
            //vm.submodulo.nombre = '';
            vm.submodulo = {};
            //this.setPermisosCRUD();
            $selectModulos.val([]).trigger("change");

            $("#submoduloModal").modal();
        }
    }
});

var tabla = 'datatable_tabletools';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $selectModulos;

var breakpointDefinition = {
    tablet: 1024,
    phone: 480
};

var columnDefs = [{
    "targets": 0,
    "data": "id",
    "name": "id",
    "searchable": false
}, {
    "targets": 1,
    "data": "nombre",
    "name": "nombre"
}, {
    "targets": 2,
    "data": "url",
    "name": "url"
}, {
    "targets": 3,
    "data": "icon",
    "name": "icon",
    "searchable": false
}, {
    "targets": 4,
    "data": "modulo",
    "name": "modulo",
    "searchable": false
}, {
    "targets": 5,
    "name": "updated_at",
    "searchable": false,
    "data": function data(row, type, val, meta) {
        return '<td><button type="button" onClick="editar(' + row.id + ')" class="btn btn-primary">Editar</button></td>';
    },
    "defaultContent": ''
}, {
    "targets": 6,
    "name": "deleted_at",
    "searchable": false,
    "data": function data(row, type, val, meta) {
        estado = '<button type="button"  onClick="activar(' + row.id + ')" class="btn btn-success">Inactivo</button>';
        if (row.deleted_at === null) {
            estado = '<button type="button" onClick="desactivar(' + row.id + ')" class="btn btn-success">Activo</button>';
        }
        return estado;
    },
    "defaultContent": ''
}];

var dataTable = {
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "searching": true,
    "ordering": true,
    "stateLoadCallback": function stateLoadCallback(settings) {
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
    },
    "stateSaveCallback": function stateSaveCallback(settings) {
        // Cuando finaliza el ajax
        $(".overlay,.loading-img").remove();
    },
    "ajax": {
        "url": "api/submodulos",
        "type": "GET",
        "data": function data(d) {
            d.per_page = d.length;
            d.page = (d.start + d.length) / d.length;
            d.filter = d.search.value;
        }
    },
    columnDefs: columnDefs,
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" + "t" + "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oLanguage": {
        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
    },
    "oTableTools": {
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
    },
    "autoWidth": true,
    "preDrawCallback": function preDrawCallback() {
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
    datatable = $('#' + tabla).DataTable(dataTable);
    Modulos.all();
    vm.setPermisosCRUD();
});
/**
   boton llama a modal, editar rol
*/
editar = function editar(id) {
    vm.accion = 'editar';
    Submodulos.get(id);
    $("#submoduloModal").modal();
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
pintarPermisos = function pintarPermisos(permisos) {
    if (vm.permisos) {
        //re correr los permisos y markar los que no esten con deleted_at null
        for (var i = vm.permisos.length - 1; i >= 0; i--) {
            if (vm.permisos[i].deleted_at) {
                vm.permisos[i].estado = false;
            } else {
                vm.permisos[i].estado = true;
            }
        }
    } else {
        vm.permisos = [];
        for (var i = 3; i >= 0; i--) {
            permiso = {
                orden: 1,
                estado: false
            };
            vm.permisos.push(permiso);
        }
    }
};