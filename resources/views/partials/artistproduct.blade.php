
        <div class="row">
           
            @foreach ($user->products as $product)
                    <div class="col-md-3">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="{{asset("app/images/arts/$product->image")}}" style="width: 100%">
                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <a href="{{route("show.product",$product->slug)}}" class="title mb-2">{{ $product->name }}</a>
                                <div class="price-wrap">
                                    price <span class="price"> ${{ $product->price }}</span>
                                    {{-- <small class="text-muted">/per item</small> --}}
                                </div> <!-- price-wrap.// -->
                                    @foreach ($product->users as $user)
                                <p class="mb-2"> by <small class="text-muted">{{$user->name}}</small></p>
                                        
                                    @endforeach
                                <p class="mb-2"> category <small class="text-muted">{{ $product->category->name }}</small></p>

                                {{-- <p class="text-muted ">{{ $product->category->name }}</p> --}}

                                <hr>

                                <p class="mb-3">
                                    @if ($user->status == 1)
                                    <span class="tag bg-success text-white"> <i class="fa fa-check"></i> Verified</span>
                                    @else
                                    <span class="tag bg-warning text-white"> <i class="fa fa-times"></i> Not Verified</span>
                                    @endif
                                    {{-- <span class="tag"> 3 Years </span>
                                    <span class="tag"> 70 reviews </span> --}}
                                    <span class="tag"> {{$user->address->country}} </span>
                                </p>

                                <div class="btn btn-group">
                                    <a href="#" class="btn btn-outline-primary"> contact artist </a>
                                    &nbsp;
                                        
                    <form action="{{ route("cart.store") }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">

                        <button class="btn btn-outline-info" type="submit">
                            <i class="shopping cart icon"></i>
                            add to cart
                        </button>
                        
                    </form>
                                </div>

                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                @endforeach

                <!-- row end.// -->
        <nav class="mb-4" aria-label="Page navigation sample">
            <ul class="pagination">
                {{-- {{ $products->links('vendor.pagination.bootstrap-4') }} --}}
            </ul>
        </nav>

           
           
        </div>
        
