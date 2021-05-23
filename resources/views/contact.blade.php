

@extends('layouts.app',['title'=>'Contact Us - Anuwai Arts'])

@section('header')

    @include('partials.header')

@endsection

{{-- include the website content --}}
@section('content')



<section class="section-main padding-y">
  <main class="card">
    <div class="card-body">
  
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
      
          <div class="section-title">
            <h3><span>Contact Us</span></h3>
            <p>Get in touch with us today, we are a phone call away..</p>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
              
                <h3>Our Address</h3>
                <p>Accra ,Ghana</p>
              </div>
            </div>
      
            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <h3>Email Us</h3>
                <p>info@anuwai.com</p>
              </div>
            </div>
      
            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <h3>Call Us</h3>
                <p>+233248900213</p>
              </div>
            </div>
      
          </div>
      
          <div class="row" data-aos="fade-up" data-aos-delay="100">
      
            <div class="col-lg-6 ">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15883.029900675401!2d-0.18643400000000002!3d5.602801!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9084b2b7a773%3A0xbed14ed8650e2dd3!2sAccra%2C%20Ghana!5e0!3m2!1sen!2sus!4v1621730436920!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div>
      
            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
      
          </div>
      
        </div>
      </section><!-- End Contact Section -->
      
  
    </div> <!-- card-body.// -->
  </main> <!-- card.// -->
  
  </section>
@endsection
