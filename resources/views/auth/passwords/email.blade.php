@extends('layouts.app')

@section('header')
    
@include('partials.header')

@endsection

@section('content')

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-conten padding-y" style="min-height:auto">
        <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px;">
          <div class="card-body">
            <h4 class="card-title mb-4">Password Reset</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            
              <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
        
  
              <!-- form-group form-check .// -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary ">
                    {{ __('Send Password Reset Link') }}
                </button>
                <a href="{{route('login')}}" class="btn btn-info">
                    {{ __('Go Back') }}
                </a>
              </div>
              <!-- form-group// -->
            </form>
          </div>
          <!-- card-body.// -->
        </div>
        <!-- card .// -->
  
        <!-- ============================ COMPONENT LOGIN  END.// ================================= -->
      </section>
      <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
