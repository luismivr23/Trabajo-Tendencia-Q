<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
      <img src="{{ asset('uploads/company/logo.png') }}" alt="El Mirador del Sabor Logo" class="brand-image img-circle elevation-3" style="opacity: .9; background-color: #fff;">
      <span class="brand-text font-weight-light" style="font-size: 13px;">El Mirador del Sabor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <!-- Opción Dashboard -->
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Opción Users -->
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <!-- Opción Dishes (Platos) -->
          <li class="nav-item">
            <a href="{{ route('dishes.index') }}" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Dishes
              </p>
            </a>
          </li>

          <!-- Opción Ingredients (Ingredientes) -->
          <li class="nav-item">
            <a href="{{ route('ingredients.index') }}" class="nav-link {{ request()->routeIs('ingredients*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-seedling"></i>
              <p>
                Ingredients
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>