<article class="card">
    <div class="card-body">

        <div class="row">

            @if ($user->products->isNotEmpty())

                @foreach ($user->products as $product)
                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="{{ asset("app/images/arts/$product->image") }}" style="width:100%">
                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <a href="#" class="title mb-2">
                                    {{ $product->name }}</a>
                                <div class="price-wrap mb-3">
                                    <span class="price">${{ $product->price }}</span>
                                    <small class="text-muted">/per item</small>
                                </div> <!-- price-wrap.// -->
                                <div class="btn-group mx-auto">
                                    <a href="{{ route('vendor.edit.product', $product->id) }}"
                                        class="btn btn-outline-primary btn-sm"> <i class="fa fa-pen"></i> Edit </a>
                                    &nbsp;
                                    <a href="#" class="btn btn-danger btn-sm remove-product" data-remove-product="{{ $product->id }}">
                                         <i class="fa fa-trash"></i> Delete </a>
                                        {{-- delete form --}}
                                            <form action="{{ route('vendor.product.destroy', $product->id) }}" style="display: none" method="POST" 
                                                id="remove-product-{{ $product->id }}" class="ui left floated">
                                                @csrf @method('delete')
                                            </form>

                                </div>
                                <hr>
                                <a href="#" class="btn btn-success btn-block"> Promote </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                @endforeach
            @else
                <div class="alert alert-info col-md-12" role="alert">
                    {{ 'You have no product on sale' }}
                </div>
            @endif

        </div> <!-- row .//  -->

    </div> <!-- card-body.// -->
</article>

