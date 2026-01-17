<div>
    <!-- [ Sidebar Menu ] start -->
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="{{ asset('template/dist') }}/dashboard/index.html" class="b-brand text-primary">
          <span>Employee Management App</span>
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <x-sudebar.links title="Home" icon="ti ti-dashboard" route="home"></x-sudebar>
          @if (Auth::user()->role->role_name == 'supervisor')
          <x-sudebar.links title="Data User" icon="ti ti-filter" route="users.index"></x-sudebar>
          @endif
          <x-sudebar.links title="Data Pegawai" icon="ti ti-user" route="pegawai.index"></x-sudebar>
          <x-sudebar.links title="Data Divisi" icon="ti ti-building" route="divisi.index"></x-sudebar>
        </ul>
      </div>
    </div>
  </nav>
  <!-- [ Pre-loader ] End -->
  <!-- [ Sidebar Menu ] end --> 
</div>