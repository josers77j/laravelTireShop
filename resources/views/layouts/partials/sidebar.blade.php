 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
      <!-- SidebarSearch Form -->
      {{-- {{ route('admin/tires.index') }} --}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link menu-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link menu-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.tires.index')}}" class="nav-link menu-link">
                  <i class="nav-icon fas fa-ring"></i>
                  <p>Llantas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.inventories.index')}}" class="nav-link menu-link">
                  <i class="nav-icon fas fa-cubes"></i>
                  <p>Inventario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.clients.index')}}" class="nav-link menu-link">
                  <i class="nav-icon fas fa-users"></i>                  
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{route('admin.categories.index')}} " class="nav-link menu-link">
                  <i class="nav-icon fas fa-layer-group"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.brands.index')}}" class="nav-link menu-link">
                  <i class="nav-icon fas fa-project-diagram"></i>
                  <p>Marcas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link menu-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.sales.index') }}" class="nav-link menu-link">
                  <i class="nav-icon fas fa-credit-card"></i>
                  <p>Ventas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="#" class="nav-link menu-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                  <i class="fas fa-fw fa-sign-out-alt nav-icon"></i>
                  <p>Cerrar sesión</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>