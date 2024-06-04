<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Liste des Concours</h1>
    <a href="{{ route('concours.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i class="fa-solid fa-plus"></i> Ajouter Concour</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Nombres de Candidats</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Nombres de Concours</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $con }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-scroll"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>