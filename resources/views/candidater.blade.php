<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Inscription</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
        integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            margin-top: 60px;

        }
    </style>
    {{--  <script>
    $('#lang').selectpicker();
  </script>  --}}

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white-50" href="#">Concour 2024 </a>
        </div>
        <div>
            <a class="navbar-brand text-white-50" href="{{ route('home') }}">Acceuil</a>
        </div>
    </nav>

    {{--  <h3>Bienvenue {{ $user->prenom }}</h3>  --}}
    <div class="container">
        <h1 class="fw-semibold">Formulaire d&#039;Inscription</h1>
        @if (isset( $dejaInscrit))
            <div class="alert alert-danger" role="alert">
                {{ $dejaInscrit }}
            </div>
        @endif
        
        <form action="{{ route('inscription') }}" method="post">
            @csrf
            {{--  @if (session('message'))
                <div class="alert">{{ session('message') }}</div>
             @endif  --}}
            <input type="hidden" name="concour_id" value="{{ $concourId }}">
           
            <div class="form-floating" mb-3>
                <div class="container mb-3">
                    <label for="centre">Sélectionnez le centre qui vous convient :</label>
                    
                    <select class="selectpicker form-control" aria-label="size 3 select example" name="centre" id="centre" required>
                        <option selected> Selectionnez un centre :</option>
                        @foreach ($centres as $centre)
                            <option value="{{ $centre->id }}">{{ $centre->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="container mb-3">
                <label for="medias">Sélectionnez les documents :</label>
                
                <select class="selectpicker form-control" multiple aria-label="size 3 select example" name="medias[]" id="medias" required>
                    @foreach ($medias as $media)
                        <option value="{{ $media->id }}">{{ $media->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-success">
                    Candidater
                </button>
            </div>
        </form>
    </div>
    <footer id="footer" class="footer position-relative">
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1">&copy; 2024 Khadija Diaba</strong></p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"
                  >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
        integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
