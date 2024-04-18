<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin_assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        a{
            margin-right: 10px;
        }
        
    </style>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
     @include('admin.sidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('admin.navigation')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Liste des Utilisateurs</h1>
                <a href="{{ route('utilisateur.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>Ajouter Un utilisateur</a>
                </div>

                </div>
                
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse e-mail</th>
                            <th>Role</th>
                            <th>Etablissement</th>
                            {{--  <th>id</th>  --}}
                            {{--  <th>Image</th>  --}}
                            {{--  <th>Description</th>  --}}
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($user as $val)
                            <tr>
                                <td>{{ $val->name }}</td>  
                                <td>{{ $val->prenom }}</td>  
                                <td>{{ $val->email }}</td>  
                                <td>{{ $val->role_id }}</td> 
                                <td>{{ $val->etablissement_id }}</td>
                                {{--  <td>{{ $val->id }}</td>    --}}

                                {{--  <td>{{ $val->image }}</td>  --}}
                                {{--  <td>{{ $val->description }}</td>   --}}
                             <td>
                                <div class="d-flex gap-2 w-100 justify-content-end">
                                    {{--  <a class="btn btn-warning btn-sm" href="">
                                        Details
                                    </a>  --}}
                                    <a class="btn btn-primary btn-sm" href="{{route('utilisateur.edit', $val->id)}}">
                                        Modifier
                                    </a>
                                    <form action="{{ route('utilisateur.destroy',$val->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                                <button onclick="return confirm('Êtes-vous sûr ?')"
                                                type="submit" class="btn btn-danger btn-sm">
                                                    Supprimer
                                                </button>
                                    </form>
                                </div>
                             </td>
                            </tr>
                        @endforeach
                    </tbody>         
                </table>
                   
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Plateforme 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


</body>
</html>