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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="asset('assets/css/bootstrap.min.css')" rel="stylesheet" >

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  {{--  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">  --}}
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" >
  <!-- Main CSS File -->
  {{--  <link href="../assets/css/main.css" rel="stylesheet">  --}}
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet"/>
</head>
<body>
    {{--  <header>
        @include('partials.header')
    </header>  --}}
    <main class="main">
  @if (isset($inscriptions))
   <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Candidat(e) {{ $inscriptions->users->prenom }} {{ $inscriptions->users->name }} </h1>
              <p class="mb-0"></p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
          <div class="container">
              <ol>
                  <li><a href="{{ route('listeCandidat',$inscriptions->concour_id) }}">Liste des candidats</a></li>
              </ol>
            </div>
        </nav>
    </div>
    {{--  <div class="modal fade" id="editStatutModal" tabindex="1" role="dialog" aria-labelledby="exempleModalCenterTitle">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exempleModalLongTitle">Modifier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span arial-hidden="true">&times;</span>
            </button>
          </div>
          <form id="updateStatut">
            @csrf
            <div class="modal-body">
              <select name="statut" id="statut">
                <option value="En attente">En attente</option>
                <option value="Acceptée">Acceptée</option>
                <option value="Rejetée">Rejetée</option>
            </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button>
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>  --}}
   <section id="courses-course-details" class="courses-course-details section">
   
    {{--  <div class="container" >
        <form action="{{ route('modifierStatut',$inscriptions->id) }}" >
            @csrf
            @method('PUT')
            <label for="statut">Statut :</label>
            <select name="statut" id="statut">
                <option value="En attente">En attente</option>
                <option value="Acceptée">Acceptée</option>
                <option value="Rejetée">Rejetée</option>
            </select>
              <input type="submit">
          </form>
    </div>  --}}




    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" id="openModal">
      Modifier Statut Candidat
    </button>
    
    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Statut</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="modalForm" action="{{ route('modifierStatut',$inscriptions->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <label for="statut">Statut :</label>
              <select name="statut" id="statut">
                <option value="En attente">En attente</option>
                <option value="Acceptée">Acceptée</option>
                <option value="Rejetée">Rejetée</option>
              </select>
            </div>     
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <script>
      document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('exampleModal').style.display = 'block';
      });
    
      document.getElementById('modalForm').addEventListener('submit', function() {
        document.getElementById('exampleModal').style.display = 'none';
      });
    </script>
    
    
    <div class="container" data-aos="fade-up">
    {{--  <button class="editButton" data-id="{{ $inscriptions->id }}" data-toggle="modal" data-target="#editStatutModal">Modifier</button>  --}}
      <div class="row">
        <div class="col-lg-8">
          {{--  <img src="{{ asset($inscriptions->) }}" class="img-fluid" alt="">  --}}
          <h3>Documents</h3>
          <table class="table table-striped ">
            <thead>
              <tr>
                <th>Libelle</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead> 
            <tbody>
              @if (isset($docs))
              @foreach ($docs as $doc )
                    <tr>
                        <td>{{ $doc->medias->libelle }}</td>  
                     <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a class="btn btn-warning btn-sm" href="{{asset($doc->medias->document)}}">
                              <i class="fa-solid fa-eye"></i>
                               voir
                            </a>
                             {{--  afficher le fichier sur le même page  --}}
                            {{--  <iframe src="/downloads/nom_du_fichier.pdf" width="100%" height="500px"></iframe>  --}}
                            <a class="btn btn-primary btn-sm" href="{{asset($doc->medias->document)}}" download>
                              <i class="fa-solid fa-download"></i>
                                Télécharger
                            </a> 
                        </div>
                     </td>   
                    </tr>
            @endforeach
            @endif
            </tbody>
          </table>
        </div>
        <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Serie : {{ $inscriptions->users->serie }}</h5>
          </div>
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Date de naissance : {{ $inscriptions->users->date_de_naissance }}</h5>
          </div>
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Nationalité : {{ $inscriptions->users->nationalite }}</h5>
          </div>
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Adresse permanente : {{ $inscriptions->users->address }}</h5>
          </div>

          

        </div>
      </div>

    </div>
<br>
<br>
<br>



@endif
 <footer>
            @include('partials.footer')
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
 
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  
  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  {{--  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>  --}}
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

  <!-- Main JS File -->


</body>

</html>

