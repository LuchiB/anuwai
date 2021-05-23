<div class="row">
    <div class="col-12">
        
        
        <div class="card">
            <div class="card-body">
                @include('partials.alert-message')
                <h5 class="card-title">Users</h5>
                @if (count($users)>0)
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registered</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                     @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $roles)
                                       <label class="badge badge-primary">{{ $roles }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse( $user->created_at )->toFormattedDateString() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.user.destroy',$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                                        {{-- <a href="#" class="btn btn-danger btn-sm delete-user" data-delete-user="{{ $user->id }}">Delete</a>
                                        <form action="{{ route('admin.edit.user', $user->id) }}" style="display: none" method="POST" 
                                            id="delete-user-{{ $user->id }}" class="ui left floated">
                                            @csrf @method('delete')
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>   
                            @endforeach
                           
                        </tfoot>
                    </table>
                </div>

                @else
                   <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        {{'No User Found'}}
                        </div>
                   </div>
                @endif
            </div>
        </div>
    </div>
</div>