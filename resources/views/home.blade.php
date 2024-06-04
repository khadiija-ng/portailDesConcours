
@extends('layout')
@section('content')
<!-- page d acceuil -->
<section id="hero" class="hero section">

    <img src="assets/img/main-femme-noir.jpg" alt="" data-aos="fade-in">

    <div class="container">
      <h2 data-aos="fade-up" data-aos-delay="100" class="">Le Calendrier Général,<br>Des Concours</h2>
      <p data-aos="fade-up" data-aos-delay="200">Cette plateforme rassemble en un seule lieu tous les concours d&#039;entrée dans les établissements publics
        d&#039;enseignement supérieur.</p>
      <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
        <a href="" class="btn-get-started">Candidater</a>
      </div>
    </div>

  </section>
  <!-- /les concours -->
     
  <section id="courses-list" class="section courses-list">
    <div class="container section-title" data-aos="fade-up">
        <h2>Concours</h2>
        <p class="">les concours ouverts</p>
    </div>
    <div class="container">

      <div class="row">
          @foreach ($concours as $concour)   

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="course-item">
                <img src="{{ $concour->image }}" class="img-fluid" alt="...">
                <div class="course-content">   
                    <h3><a href="course-details.html">{{ $concour->nom }}</a></h3>
                    <p class="description">{{ $concour->description }}</p>
                    @if($concour->date_fin >= now())
                    <div class="d-flex justify-content-between align-items-center mb-3" >
                      <p class="category">@if($concour->etat ===1) Ouvert
                      @else Fermé
                      @endif </p>
                      {{--  <i class="fa-light fa-arrow-right"></i>
                      <i class="fa-solid fa-arrow-right"></i>  --}}
                    @endif
                  </div>
                    <div class="d-flex justify-content-between align-items-center mb-3" >
                    @if($concour->date_fin >= now())
                      <a class="btn btn-secondary" href="{{ route('candidater',$concour->id) }}" >
                        Candidater
                      </a>
                    @endif
                    <a class="btn btn-secondary" href="{{ route('details', $concour->id) }}" >
                      Détails
                    </a>
                  </div>

                    {{--  <form action="{{ route('candidater', $concour->id) }}" method="POST">
                      @csrf
                      <button type="submit">Candidater</button>
                    </form>  --}}
                </div>
              </div>
          </div>
          @endforeach
      </div>

    </div>

  </section><!-- /Courses List Section --> 
  <section id="about-us" class="section about-us">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/concours.jpg" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
          <h3>Vous êtes le mieux placer pour le faire </h3>
          <br>
          <br>
          <ul>
            <li><i class="bi bi-check-circle"></i> <span>Préparer et participer à un concours peut être une excellente occasion de développer de nouvelles compétences ou de perfectionner celles existantes</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Pour ceux qui aiment les défis intellectuels ou créatifs, les concours offrent une occasion de se mesurer à d'autres individus talentueux et de tester leurs limites</span></li>
            <li><i class="bi bi-check-circle"></i> <span>les concours offrent une gamme d'avantages et d'opportunités qui peuvent être très motivants pour les personnes intéressées</span></li>
          </ul>
        </div>

      </div>

    </div>

  </section><!-- /About Us Section -->
         
@endsection