var Tareas={
    getAll:function(data,callback){
        data.per_page=data.length;
        data.page=(data.start+data.length)/data.length;
        data.filter=data.search.value;
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
        $.get(url, data, function(response) {
            callback(response);
            $(".overlay,.loading-img").remove();
        });
    },
    get:function(id){
        axios.get(
            url+'/'+id,
            headerAxios
        )
        .then(response => {
            vm.tarea = response.data;
            vm.movimientos = response.data.movimientos;
            pintarMarkers();
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store:function(){
        vm.tarea.DueDate =  $('input[name=DueDate]').val();
        vm.tarea.estado_tarea_id = $('#estado_tarea_id').val();
        vm.tarea.tipo_tarea_id = $('#tipo_tarea_id').val();
        vm.tarea.EmployeeNumber = $('#EmployeeNumber').val();
        axios.post(
            url,
            vm.tarea,
            headerAxios
        )
        .then(response => {
            reload();
            $("#modal-tarea").modal('hide');
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    /** guardar existente
    */
    update:function(id){
        vm.tarea.DueDate =  $('input[name=DueDate]').val();
        axios.put(
            url+'/'+id,
            vm.tarea,
            headerAxios
        )
        .then(response => {
            reload();
            $("#modal-tarea").modal('hide');
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    destroy:function(id){
        axios.delete(
            url+'/'+id,
            headerAxios
        )
        .then(response => {
            user = response;
        })
        .catch(e => {
            vm.errors.push(e);
        });
    }
};
var Listas ={
    all:function(){
        axios.all([
            axios.get('trabajadores/lista',headerAxios),
            axios.get('estadotarea/lista',headerAxios),
            axios.get('tipotarea/lista',headerAxios)
        ])
        .then(axios.spread(function (trabajadores,estadotarea,tipotarea) {
            vm.trabajadores = trabajadores.data;
            vm.estadotarea = estadotarea.data;
            vm.tipotarea = tipotarea.data;
            /*$selectRoles = $('#roles').select2({
                dropdownParent: $('#userModal')
            });*/
        }))
        .catch(e => {
          this.errors.push(e);
        });
    }
};
var Formulario={
    get:function(id){
        headerAxios.params= {
            movimiento_id: id
        };
        axios.get(
            'formularios/lista',
            headerAxios
        )
        .then(response => {
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
        })
        .catch(e => {
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