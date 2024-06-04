
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fa-solid fa-bars"></i>
            <span>Tableau de Bord</span></a>
        </li>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">
            <i class="fa-solid fa-house"></i>
            <span>Acceuil</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('etablissements') }}">
            <i class="fa-solid fa-school"></i>
            <span>Etablissements</span></a>
    </li>  
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fa-solid fa-scroll"></i>
            <span>Concours</span></a>
    </li>     
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('role') }}">
            <i class="fa-solid fa-user"></i>
            <span>Roles</span></a>
    </li>   
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('users') }}">
            <i class="fa-solid fa-users"></i>
            <span>Utilisateurs</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('temoignage.index') }}">
            <i class="fa-solid fa-users"></i>
            <span>Témoignages</span></a>
    </li>
</ul>
<!-- End of Sidebar -->