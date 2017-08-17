<div class="modal fade" id="modal-pedido">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 listado-productos">
              <ul  class="nav nav-pills">
            <li class="active"><a  href="#1a" data-toggle="tab">Menú</a></li>
            <li><a href="#2a" data-toggle="tab">Carta</a></li>
          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
              <ul>
                @foreach ($menu as $key => $value)
                  <li id="{{$value->id}}"><input type="checkbox" value="{{json_encode($value)}}" class="btn-producto" name="producto[]"/><span class="descripcion">{{$value->nombre}}</span><span class="stock">{{$value->stock}}</span></li>
                @endforeach
              </ul>
            </div>
            <div class="tab-pane" id="2a">
                <ul>
                @foreach ($carta as $key => $value)
                  <li id="{{$value->id}}"><input type="checkbox" value="{{json_encode($value)}}" class="btn-producto" name="producto[]"/><span class="descripcion">{{$value->nombre}}</span><span class="stock">{{$value->stock}}</span></li>
                @endforeach
              </ul>
            </div>
          </div>
            </div>
            <div class="col-md-1 opciones">
              <div class="contenedor-opciones">
                <i class="fa fa-arrow-circle-o-right btn-agregar-producto" aria-hidden="true"></i>
                <i class="fa fa-arrow-circle-o-left btn-remover-producto" aria-hidden="true"></i>
              </div>
            </div>
            <div class="col-md-6 listado-pedido">
              <ul class="nav nav-pills">
            <li class="active"><a  href="#1a" data-toggle="tab">Pedido</a></li>
          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
              <ul class="resultado">
              </ul>
            </div>
          </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary btn-registrar">Enviar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
