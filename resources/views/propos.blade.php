@extends('layout')
@section('content')

<div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="">A propos de nous<br></h1>
            <p class="mb-0">Le Portail des concours est une plateforme
                d&#039;informations et de gestion centralisée des concours
                d&#039;entrée aux différents établissements publics
                d&#039;enseignement supérieur.
                 </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{route('home')}}">Acceuil</a></li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="stats-about" class="stats-about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-3">
        <div class="col-lg-3 col-md-6">
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="{{$users}}" data-purecounter-duration="1" class="purecounter"></span>
            <p class="">Utilisateurs</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="{{$etablissements}}" data-purecounter-duration="1" class="purecounter"></span>
            <p class="">Etablissements</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="{{$concours}}" data-purecounter-duration="1" class="purecounter"></span>
            <p class="">Concours</p>
          </div>
        </div><!-- End Stats Item -->

      </div>

    </div>
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
  
              @endif
  
            </div>
            <div class="swiper-pagination"></div>
          </div>
  
        </div>
  
      </section><!-- /Testimonials Section -->

  </section><!-- /Stats About Section -->


@endsection