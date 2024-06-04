
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ $etablissement->libelle }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="">
                <i class="fa-solid fa-bars"></i>
                <span>Tableau de Bord</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">
            <i class="fa-solid fa-house"></i>
            <span>Acceuil</span></a>
    </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('etablissement') }}">
                <i class="fa-solid fa-scroll"></i>
                <span>Concours</span></a>
        </li>       
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('centre.index') }}">
                <i class="fa-solid fa-school"></i>
                <span>Centre</span></a>
        </li>  
    </ul>
    <!-- End of Sidebar -->