@section("aside")

  <!-- User info -->
  <div class="login-info">
    <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
      
      <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
        <img src="img/avatars/sunny.png" alt="me" class="online" /> 
        <span>
          john.doe 
        </span>
        <i class="fa fa-angle-down"></i>
      </a> 
      
    </span>
  </div>
  <!-- end user info -->

  <!-- NAVIGATION : This navigation is also responsive-->
  <nav>
    <!-- 
    NOTE: Notice the gaps after each icon usage <i></i>..
    Please note that these links work a bit different than
    traditional href="" links. See documentation for details.
    -->

    <ul>
    @if (Session::get('menu'))
      @foreach ( Session::get('menu') as $key => $modulo)
        <li class="active">
          <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">{{$key}}</span></a>
          <ul>
            @foreach ( $modulo as $submodulo)
            
            @if (Request::path()=='admin.'.$submodulo->url)
            <li class="active">
            @else
            <li class="">
            @endif
              <a href="admin.{{ $submodulo->url }}" title="Dashboard"><span class="menu-item-parent">{{ $submodulo->submodulo }}</span></a>
            </li>
            @endforeach
          </ul>
        </li>
      @endforeach
    @endif
    <!-- 
      <li>
        <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inventario</span></a>
        <ul>
          <li class="">
            <a href="admin.inventario.registro" title="Dashboard"><span class="menu-item-parent">Registro</span></a>
          </li>
          <li class="">
            <a href="admin.inventario.transferencia" title="Dashboard"><span class="menu-item-parent">Transferencia</span></a>
          </li>
          <li class="">
            <a href="admin.inventario.recepcion" title="Dashboard"><span class="menu-item-parent">Recepcion</span></a>
          </li>
        </ul> 
      </li>
      -->
      <!-- 
      <li>
        <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
        <ul>
          <li class="">
            <a href="index.html" title="Dashboard"><span class="menu-item-parent">Analytics Dashboard</span></a>
          </li>
          <li class="">
            <a href="dashboard-social.html" title="Dashboard"><span class="menu-item-parent">Social Wall</span></a>
          </li>
        </ul> 
      </li>-->
    </ul>
  </nav>

  <span class="minifyme" data-action="minifyMenu"> 
    <i class="fa fa-arrow-circle-left hit"></i> 
  </span>
@show