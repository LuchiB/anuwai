

@extends('layouts.app',['title'=>'Contact Us - Anuwai Arts'])

@section('header')

    @include('partials.header')

@endsection

{{-- include the website content --}}
@section('content')



<section class="section-main padding-y">
  <main class="card">
    <div class="card-body">
  
        <section id="about" class="about section-bg">
            <div class="container">
      
              <div class="section-title">
                <h3>Find Out More <span>About Us</span></h3>
              </div>
      
              <div class="row">
                <div class="col-lg-6">
                  <img src="/app/images/about-us.jpeg" class="img-fluid" >
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center">
                  <h3>About Us.</h3>
               
                  <p>
                    Anuwai, translated from Swahili means diverse. Anuwai Arts is founded by Leslie Wahiermeh and 
                    Desmond Afedzie.  As Ghana’s premier online art dealers, we give artists the platform to engage 
                    in the secondary market sale of art works and services. It’s a platform where artists can make a
                     living doing what they love and anyone can easily find and buy authentic, handmade works of art.
                       You can view a plethora of very creative artworks and portfolios which truly reflect dynamic art culture.
                        Anuwai Arts is here to give our artists and clients a unique and seamless business experience.
                  </p>
                </div>
              </div>
      
            </div>
          </section><!-- End About Section -->
      
  
    </div> <!-- card-body.// -->
  </main> <!-- card.// -->
  
  </section>
@endsection
