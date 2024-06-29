<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link elevation-4">
      <span class="brand-text font-weight-light">EEG Information System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/livewire.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name  }}</a>
        </div>
        <div class="info">
          <a href="{{ route('logout') }}" class="d-block text-danger">Logout</a>
        </div>
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if($menus = session()->get('menus'))
          @foreach($menus as $menu):
            <li class="nav-item">
                <a href="{{ url($menu->url) }}" class="nav-link {{ url()->current() == $menu->url ? 'active' : '' }}">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                    {{ $menu->name }}
                    </p>
                </a>
            </li>
          @endforeach
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>