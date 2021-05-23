<aside class="col-md-3">
    @php
    $user_id = Auth::user()->id;
    @endphp
    <nav class="list-group">
        @hasrole('Admin')
        <a class="list-group-item {{ request()->is('admin/home') ? 'active' : '' }}" href="{{route('admin.home')}}">Users </a>
        <a class="list-group-item {{ request()->is('vendor/product/create') ? 'active' : '' }}" href="{{route('admin.product.create')}}">Upload Art</a>
        <a class="list-group-item {{ request()->is('vendor/product/create') ? 'active' : '' }}" href="{{route('admin.product.index')}}">My Art</a>
        <a class="list-group-item {{ request()->is('vendor/home') ? 'active' : '' }}" href="{{route('admin.category.create')}}"> Art Category </a>
        <a class="list-group-item {{ request()->is("admin/user/$user_id") ? 'active' : '' }}" href="{{route("admin.profile")}}"> Settings </a>
        @endhasrole


        @hasrole('Vendor')
        <a class="list-group-item {{ request()->is('vendor/home') ? 'active' : '' }}" href="{{route('vendor.home')}}">Dashboard </a>
        <a class="list-group-item {{ request()->is('vendor/product/create') ? 'active' : '' }}" href="{{route('vendor.create.product')}}">Upload Art</a>
        <a class="list-group-item" href="{{route('vendor.order')}}">Ordered Product </a>
        <a class="list-group-item {{ request()->is("vendor/profile/$user_id") ? 'active' : '' }}" href="{{route('vendor.setting.profile')}}"> Settings </a>
        @endhasrole

        @hasrole('Buyer')
        <a class="list-group-item {{ request()->is('user/home') ? 'active' : '' }}" href="{{route('buyer.home')}}">Dashboard</a>
        <a class="list-group-item {{ request()->is('user/profile') ? 'active' : '' }}" href="{{route('buyer.profile')}}"> Account overview  </a>
        <a class="list-group-item {{ request()->is('user/orders') ? 'active' : '' }}" href="{{route('buyer.order')}}"> My Orders </a>
        <a class="list-group-item {{ request()->is("user/profile/$user_id") ? 'active' : '' }}" href="{{route('buyer.setting')}}"> Settings </a>
         @endhasrole
        <a href="{{ route('logout') }}" class="list-group-item" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
            style="display: none;">
            @csrf
        </form>
    </nav>
</aside> <!-- col.// -->