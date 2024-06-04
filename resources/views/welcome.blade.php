
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
          <a href="{{ route('concours.index') }}" class="btn-get-started">Candidater</a>
        </div>
      </div>
  
    </section>
    <!-- /les concours -->
       
    {{--  <section id="courses-list" class="section courses-list">
      <div class="container section-title" data-aos="fade-up">
          <h2>Concours</h2>
          <p class="">les concours ouverts</p>
      </div>  --}}
      
    <section id="about-us" class="section about-us">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('assets/img/concours.jpg') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Vous êtes le mieux placer pour le faire </h3>
            <br>
            <br>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Préparer et participer à un concours peut être une excellente occasion de développer de nouvelles compétences ou de perfectionner celles existantes</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Pour ceux qui aiment les défis intellectuels ou créatifs, les concours offrent une occasion de se mesurer à d'autres individus talentueux et de tester leurs limites</span></li>
              <li><i class="bi bi-check-circle"></i> <span>les concours offrent une gamme d&#039;avantages et d'opportunités qui peuvent être très motivants pour les personnes intéressées</span></li>
            </ul>
          </div>

        </div>

      </div>

    </section><!-- /About Us Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Témoignages</h2>
        <p class="">Ce Qu&#039;ils Disent De Nous</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
       @if (isset($temoignages))
           @foreach ($temoignages as $temoignage)
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>{{ $temoignage->utilisateurs->prenom }} {{ $temoignage->utilisateurs->name }}</h3>
                  <h4>{{ $temoignage->profil }}</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>{{ $temoignage->temoigner }}</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
           @endforeach
           {{--  <div class="position-relative">
            <div class="position-absolute start-50">
                {{ $temoignages->links('pagination::bootstrap-4') }}
            </div>
        </div>  --}}
            @endif

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->
    
    
           
  @endsection