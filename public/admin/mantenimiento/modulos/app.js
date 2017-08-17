var Modulos = {
    all: function all() {
        $.get("api/modulos", function (response) {
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
        $.get("api/modulos/" + id, function (response) {
            vm.modulo = response;
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
        //vm.rol.submodulos = vm.submodulos;
        $.post("api/modulos", vm.modulo, function (response) {
            reload();
            $("#moduloModal").modal('hide');
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
        //vm.rol.submodulos = vm.submodulos;
        $.put('api/modulos/' + id, vm.modulo, function (response) {
            reload();
            $("#moduloModal").modal('hide');
        }).done(function (response) {
            //alert( "second success" );
        }).fail(function (response) {
            //alert( "error" );
        }).always(function (response) {
            //alert( "finished" );
        });
    },
    destroy: function destroy(id) {
        $.delete("api/modulos/" + id, function (response) {
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
//Vue.component('v-select', VueSelect.VueSelect);
var vm = new Vue({
    el: '#main',
    data: {
        modulo: {},
        accion: ''
    },

    methods: {
        /**boton de modal Guardar*/
        guardarModulo: function guardarModulo() {
            if (vm.accion == 'nuevo') {
                vm.modulo.modulo_id = 0;
                Modulos.store();
            } else {
                Modulos.update(vm.modulo.id);
            }
        },
        /**boton llama a modal, nuevo rol */
        storeModulo: function storeModulo() {
            $("#moduloModal").modal();
            vm.accion = 'nuevo';
            vm.modulo = {};
        }
    }
});

var tabla = 'datatable_tabletools';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $selectModulos;
//var $selectRoles;

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
    "name": "updated_at",
    "searchable": false,
    "data": function data(row, type, val, meta) {
        return '<td><button type="button" onClick="editar(' + row.id + ')" class="btn btn-primary">Editar</button></td>';
    },
    "defaultContent": ''
}, {
    "targets": 5,
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
        "url": "api/modulos",
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
});
/**
   boton llama a modal, editar rol
*/
editar = function editar(id) {
    vm.accion = 'editar';
    Modulos.get(id);
    $("#moduloModal").modal();
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