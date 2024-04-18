
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    .container{ 
    margin-top: 60px;

    }
</style>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Concour 2024</a>
        </div>
        <div >
            <a class="navbar-brand" href="{{ route('home') }}">Acceuil</a>
          </div>
    </nav>

    {{--  <h3>Bienvenue {{ $user->prenom }}</h3>  --}}
  <div class="container">
    <h1>Formulaire d&#039;Inscription</h1>
    <form action="{{ route('inscription') }}" method="post">
    @csrf
    <input type="hidden" name="concour_id" value="{{ $concourId }}">
        <div class="form-floating" mb-3>
            <input type="text" class="form-control" name="centre" id="centre">
            <label for="description">Centre du concours</label>
            @error('centre'){{ $message }} @enderror
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-success">
            Candidater
            </button>
        </div>
      </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<footer id="footer" class="footer position-relative">
    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1">&copy; 2024 Khadija Diaba</strong></p>
      </div>
</footer>
</body>
</html>  
    