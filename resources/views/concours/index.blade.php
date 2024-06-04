<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Concours</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{--  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">  --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <style>
      .card .img-fit{
        aspect-ratio: 16 / 9 ;
        object-fit: cover;
      }
      .card {
        height: 100%;
      }
      .card-body {
        display: flex;
        height: 100%;
        flex-direction: column;
      }
      .card-text {
        flex-grow: 1;
      }
      .card-header{
        padding: 30px 0;   
        background-color: #48484d; 
    }
    h5{
        color: lightcyan;
    }
      @media (max-width: 767.98px){
        .card .img-fit {
            aspect-ratio: 1.45 / 1;
        }
      }

    
    </style>
</head>

<body>
    <header>
        @include('partials.header')
    </header>
    <div>
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Concours</h1>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  <div class="card border-dark ml-1 mb-3" style="max-width: 20rem;">
            @foreach ($concours as $concour)
            <div class="card-header text-light bg-dark">{{ $concour->nom }}</div>
             <div class="card-body text-dark">
                <h5 class="card-title">{{ $concour->etablissement->sigle }}</h5>
                <p class="card-text">{{ $concour->description }}</p>
                    <div class="text-end">
                       @if ($concour->date_fin >= now())
                            <a class="btn btn-secondary" href="{{ route('candidater', $concour->id) }}">
                                Candidater
                            </a>
                        @endif   --}}
                        {{--  <a class="btn btn-warning" href="{{ route('details', $concour->id) }}">
                            Détails
                        </a>  --}}
                   {{--  </div>
         </div>
         @endforeach
    </div>  --}}
    {{--  <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
        <a class="btn btn-outline-warning me-md-2" href="{{ route('details', $concour->id) }}">
            Détails
        </a>
     </div>  --}}
        <br>
        <div class="container">
            <div class="row g-3">
                @foreach ($concours as $concour)
                <div class="col-md-4 col-6">
                    <div class="card">
                        {{--  <div class="card-header">
                            {{ $concour->nom }} 
                        </div>  --}}
                       <img src="{{ asset($concour->image)}}" alt="" class="card-img-top img-fit">
                      
                       <div class="card-body">
                           
                            <h5 class="card-title"> {{ $concour->nom }} <br>{{ $concour->etablissement->sigle }} | 2024</h5>
                            <div class="text-end">
                                <a class="btn btn-warning me-md-2" href="{{ route('details', $concour->id) }}">
                                    Détails
                                </a>
                            </div>
                        <p class="card-text">{{ $concour->description }}</p>
                        <div class="text-end">
                            <p class="text-start text-danger fs-6" >Les frais de candidature sont de {{ $concour->Frais }} FCFA non remboursables.</p>
                            @if($concour->date_fin >= now())
                              <p class="btn btn-outline-success">@if($concour->etat ===1) Ouvert
                              @else Fermé
                              @endif</p> 
                            @endif
                            @if ($concour->date_fin >= now())
                            <a href="{{ route('candidater', $concour->id) }}" class="btn btn-primary">Candidater</a>
                            @endif 
                        </div>
                       </div>
                    </div>
                </div>
               @endforeach
            </div>
            <div class="position-relative">
                <div class="position-absolute start-50">
                    {{ $concours->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <br>
        <br>
        <footer>
            @include('partials.footer')
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Main JS File -->
        <script src="../assets/js/main.js"></script>

</body>

</html>
