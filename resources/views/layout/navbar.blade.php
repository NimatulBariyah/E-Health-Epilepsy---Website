<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    <div class="nav-item">
        <a class="nav-link" id="notif-btn" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if( count( Auth::user()->unreadNotifications ) > 0 )
        <span class="badge badge-warning navbar-badge">{{ count( Auth::user()->unreadNotifications ) }}</span>
        @endif
      </a>
      <!-- Notification content -->
      @if( count( Auth::user()->unreadNotifications ) > 0 )
        
        <div id="notif-dropdown" class="dropdown dropdown-menu dropdown-menu-lg dropdown-menu-right" style="right: 15px;">
          <span class="dropdown-item dropdown-header"> {{count( Auth::user()->unreadNotifications ) > 0}} Notifikasi</span>
          <div class="dropdown-divider"></div>

          @foreach( Auth::user()->unreadNotifications as $notif )
          <a href="{{ $notif->data['url'] }}" class="dropdown-item" style="overflow: auto;white-space: normal !important;">
          <div class="d-flex align-items-center">
            <i class="far fa-circle mr-2"></i>
            <span class="d-block" style="overflow-wrap: break-word;">{{ $notif->data['message'] }}</span>
          </div>
          </a>
          <div class="dropdown-divider"></div>
          @endforeach
          <a href="/mark-all-read" class="dropdown-item dropdown-footer">Tandai Sudah Dibaca</a>
        </div>
      @endif
      <!-- / -->
    </div>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      @if($role = auth()->user()->role)
      <li class="nav-item">
          <h6 class="text-dark nav-link">
          {{$role->level ? $role->level->name : ''}}
            </h6>
      </li>
      @endif
    </ul>
  </nav>
  <!-- /.navbar -->