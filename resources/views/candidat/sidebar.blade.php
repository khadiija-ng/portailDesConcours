
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ $user->prenom }}
            <br>
            {{ $user->name }}
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fa-solid fa-bars"></i>
            <span>Tableau de Bord</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('concours.index') }}">
                <i class="fa-solid fa-scroll"></i>
            <span>Concours</span></a>
    </li>
    <!-- Nav Item - Dashboard -->

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('candidat') }}">
            <i class="fa-solid fa-file"></i>
            <span>Documents</span></a>
    </li> 
  
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('folder') }}">
            <i class="fa-solid fa-folder"></i>
            <span>Mes Dossiers</span></a>
    </li> 

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('temoignage.create') }}">
            <i class="fa-sharp fa-solid fa-comment"></i>
            <span>Temoignages</span></a>
    </li> 
</ul>
<!-- End of Sidebar -->