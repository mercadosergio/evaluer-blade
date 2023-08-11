<aside id="sidemenu" class="Side hidden laptop:block">
    <!-- Header -->
    <div class="Side-header">
        <div class="btn-hamburguer"></div>
        <div class="btn-hamburguer"></div>
        <div class="btn-hamburguer"></div>
    </div>
    <!-- Perfil -->
    <div class="Side-profile">
        <div class="Side-avatar">
            <img class="perfil" src="{{ asset('avatar/' . auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}">
            <div class="name"><span></span></div>
        </div>
    </div>
    <!-- Items -->
    <ul class="Side-ul" id="sidebarNav">
        <li class="Side-li" title="Dashboard">
            <a class="Side-a collapsed" href="{{ route('admin') }}">
                <i class="Side-i--items bi bi-grid"></i>
                <span class="Side-span">Dashboard</span>
            </a>
        </li>
        <li class="Side-li" title="Usuarios">
            <a class="Side-a collapsed" data-bs-toggle="collapse" data-bs-target="#user-menu" role="button"
                aria-expanded="false" aria-controls="collapseExample" href="#user-menu">
                <i class="Side-i--items bi bi-person-gear"></i>
                <span class="Side-span">Usuarios</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="Submenu collapse" id="user-menu" data-bs-parent="#sidebarNav">
                <li><a class="Submenu-a" href="{{ route('show.users') }}"> <i class="Side-i--items bi bi-list-ul"></i>
                        <span>Lista de usuarios</span></a></li>
                <li><a class="Submenu-a" href="{{ route('register') }}"> <i class="Side-i--items bi bi-person-plus"></i>
                        <span>Nuevo usuario</span></a></li>
                <li><a class="Submenu-a" href=""><i class="Side-i--items bi bi-pencil-square"></i><span>Modificar
                            usuario</span></a></li>
            </ul>
        </li>
        <li class="Side-li" title="Notas">
            <a class="Side-a collapsed" data-bs-toggle="collapse" href="">
                <i class="Side-i--items bi bi-card-checklist"></i>
                <span class="Side-span">Notas</span>
            </a>
        </li>
        <li class="Side-li" title="Programas">
            <a class="Side-a collapsed" data-bs-toggle="collapse" href="">
                <i class="Side-i--items bi bi-mortarboard"></i>
                <span class="Side-span">Programas</span>
            </a>
        </li>
        <li class="Side-li" title="Peticiones">
            <a class="Side-a collapsed" data-bs-toggle="collapse" href="">
                <i class="Side-i--items bi-send-exclamation"></i>
                <span class="Side-span">Peticiones</span>
            </a>
        </li>
    </ul>
</aside>
