var Users = {
    getAll: function getAll(data, callback) {
        // make a regular ajax request using data.start and data.length
        data.per_page = data.length;
        data.page = (data.start + data.length) / data.length;
        data.filter = data.search.value;
        /*$.ajax({
            "url": url,
            "type": "GET",
            "data" : data,
            'beforeSend': function (request) {
                console.log("before");
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            "success":function(response){
                callback(response);
                $(".overlay,.loading-img").remove();
            },
            "error":function(data){
                $(".overlay,.loading-img").remove();
            }
        });*/
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
        $.get(url, data, function (response) {
            callback(response);
            $(".overlay,.loading-img").remove();
        });
    },
    get: function get(id) {
        var _this = this;

        axios.get(url + '/' + id, headerAxios).then(function (response) {
            vm.user = response.data;
            roles();
        }).catch(function (e) {
            _this.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store: function store() {
        var _this2 = this;

        vm.user.fecha_nacimiento = $('input[name=fecha_nacimiento]').val();
        vm.user.roles = $('#roles').val();

        axios.post(url, vm.user, headerAxios).then(function (response) {
            reload();
            $("#userModal").modal('hide');
        }).catch(function (e) {
            _this2.errors.push(e);
        });
    },
    /** guardar existente
    */
    update: function update(id) {
        var _this3 = this;

        vm.user.fecha_nacimiento = $('input[name=fecha_nacimiento]').val();
        vm.user.roles = $('#roles').val();
        axios.put(url + '/' + id, vm.user, headerAxios).then(function (response) {
            reload();
            $("#userModal").modal('hide');
        }).catch(function (e) {
            _this3.errors.push(e);
        });
    },
    destroy: function destroy(id) {
        var _this4 = this;

        axios.delete(url + '/' + id, headerAxios).then(function (response) {
            user = response;
        }).catch(function (e) {
            _this4.errors.push(e);
        });
    }
};
var Roles = {
    all: function all() {
        var _this5 = this;

        axios.all([axios.get('roles/lista', headerAxios)]).then(axios.spread(function (response) {
            vm.roles = response.data;
            $selectRoles = $('#roles').select2({
                dropdownParent: $('#userModal')
            });
        })).catch(function (e) {
            _this5.errors.push(e);
        });
    }
};
var vm = new Vue({
    el: '#main',
    data: {
        user: {},
        roles: [],
        accion: ''
    },
    methods: {
        /**boton de modal Guardar*/
        guardarUser: function guardarUser() {
            if (vm.accion == 'nuevo') {
                Users.store();
            } else {
                Users.update(vm.user.id);
            }
        },
        /**boton llama a modal, nuevo user */
        storeUser: function storeUser() {
            $("#userModal").modal();
            vm.accion = 'nuevo';
            vm.user = {};
            $selectRoles.val([]).trigger("change");
        },
        roles: function roles() {
            Roles.all();
        }
    }
});

var tabla = 'datatable_tabletools';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $selectRoles;

var breakpointDefinition = {
    tablet: 1024,
    phone: 480
};

var columns = [{
    data: "id",
    name: "id",
    searchable: false
}, {
    data: "nombres",
    name: "nombres"
}, {
    data: "apellidos",
    name: "apellidos"
}, {
    data: "numero_telefono",
    name: "numero_telefono",
    searchable: false
}, {
    data: "genero",
    name: "genero",
    searchable: false
}, {
    name: "verified",
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
var url = "api/users";
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
        Users.getAll(data, callback);
    },
    "columns": columns,
    //"order": [[ 1, 'asc' ], [ 2, 'asc' ]],
    //order: [[ 4, "desc" ]],
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
    Roles.all();
    datatable = $('#' + tabla).DataTable(dataTable);
});
/**
   
*/
editar = function editar(id) {
    vm.accion = 'editar';
    Users.get(id);
    $("#userModal").modal();
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
roles = function roles() {
    var rolesUser = [];
    for (i = vm.user.roles.length - 1; i >= 0; i--) {
        rolesUser.push(vm.user.roles[i].id);
    }
    $selectRoles.val(rolesUser).trigger("change");
};