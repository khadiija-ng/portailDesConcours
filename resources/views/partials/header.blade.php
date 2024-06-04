{{--  <style>
    .col{
        margin-top: 5px;
    }

    h3 {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;  
        font-size: 20px; 
        font-weight: bold; 
    }
    .log{
        margin-left: 40px;
        width: 100px;
        heigth: 120px;
      }
      p{
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
         font-size: 20px; 
        font-weight: bold; 
      }
</style>
<div class="container-fluid px-sm-2-9">
    <div class="row">
        <div class="col">
            <div class="senegal-logo">
                <img src="../assets/img/senegal.png" class="log"/>
                <p class="rds">République du Sénégal</p>
                <p class="pbf">Un peuple,Un but,Une foi</p>
            </div>
        </div>
        <div class="col">
          <br>
          <br>
            <h3>MINISTERE DE L&#039;EDUCATION NATIONNALE</h3>
        </div>
        <div class="col">
          <br>
          <br>
            <form class="d-flex mt-3 mt-lg-0" role="search">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Rechercher</button>
              </form>
        </div>
    </div>
</div>   --}}
<style>
  #titre{
    font-size: bold;
  }
  .test{
    width: 130px;
    height: 70px;
  }
</style>
<header id="header" class="header d-flex align-items-center sticky-top">
    
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <img class="test" src="{{ asset('assets/img/logoa.png') }}" alt=""> 
      <a href="" class="logo d-flex align-items-center me-auto">
        <h3 class="text-secondary-emphasis" id="titre"></h3>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" >Acceuil</a></li>
          <li><a href="{{ route('propos') }}">A Propos</a></li>
          <li><a href="{{ route('concours.index')}}">Concours</a></li>
          <li><a href="{{ route('contact.create') }}">Contact</a></li>
         
          <li class="megamenu has-dropdown"><a href="#"><span>Anciennes Epreuves</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a href="#">Column 1 link 1</a>
                <a href="#">Column 1 link 2</a>
                <a href="#">Column 1 link 3</a>
              </li>
              <li>
                <a href="#">Column 2 link 1</a>
                <a href="#">Column 2 link 2</a>
                <a href="#">Column 3 link 3</a>
              </li>
              <li>
                <a href="#">Column 3 link 1</a>
                <a href="#">Column 3 link 2</a>
                <a href="#">Column 3 link 3</a>
              </li>
              <li>
                <a href="#">Column 4 link 1</a>
                <a href="#">Column 4 link 2</a>
                <a href="#">Column 4 link 3</a>
              </li>
              <li>
                <a href="#">Column 5 link 1</a>
                <a href="#">Column 5 link 2</a>
                <a href="#">Column 5 link 3</a>
              </li>
            </ul>
          </li>
          
          <!-- Authentication Links -->
          @guest
          @if (Route::has('login'))
              <li>
                  <a class="btn-getstarted" href="{{ route('login') }}">{{ __("Se Connecter") }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li>
                  <a class="btn-getstarted " href="{{ route('register') }}">{{ __("S'inscrire   _") }}</a>
              </li>
          @endif
      @else
          <li>
              <a>
                  {{ Auth::user()->name }}
              </a>
          </li>
          <li>
              <a class="btn-getstarted" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Se Deconnecter') }}
           </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Se Deconnecter') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    
      {{--  <a class="btn-getstarted" href="courses.html">Inscription</a>
      <a class="btn-getstarted" href="courses.html">Connection</a>  --}}


    </div>
  </header>