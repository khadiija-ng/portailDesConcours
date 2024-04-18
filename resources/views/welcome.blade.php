
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
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="category">{{ $concour->etat }}</p>
                        {{--  <i class="fa-light fa-arrow-right"></i>
                        <i class="fa-solid fa-arrow-right"></i>  --}}
                      </div>
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('candidater',$concour->id) }}" class="btn btn-primary">
                          Candidater
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
           
  @endsection