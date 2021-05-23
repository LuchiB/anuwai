@extends('layouts.app')


@section('header')
    @include('partials.header')
@endsection


@section('banner')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="section-pagetop bg-gray">
        <div class="container">
            <h2 class="title-page">My account</h2>
        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION PAGETOP END// ========================= -->
@endsection

@section('content')
    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
                @include('partials.aside')
                <main class="col-md-9">
                    @include('partials.alert-message')
                    <div class="card">
                      
                        <div class="card-body">
                            <form class="row" action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>Name</label>
                                         
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                                placeholder="product name" required>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group">
                                            <label>Price</label>

                                                <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="product price" required >

                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Art Category</label>
                                            <select id="inputState" class="form-control  @error('category') is-invalid @enderror" name="category">
                                                <option value=""> Choose...</option>
                                                @foreach ($categories as $category)

                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>Image</label>
                                            
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  required >

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Short Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5" name="description">{{ old('description') }}</textarea>
                                        
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->

                                    </div>
                                    <!-- form-row.// -->

                                    <button class="btn btn-primary" type="submit">Save</button>

                                </div> <!-- col.// -->

                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->



                </main> <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
@endsection
