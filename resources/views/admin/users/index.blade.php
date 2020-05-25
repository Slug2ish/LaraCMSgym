{{-- @extends('layouts.admin') --}}
@extends('layouts.app')


@section('content')

    @if(Session::has('deleted_user'))
      <p class="p-3 mb-2 bg-danger text-white rounded">{{session('deleted_user')}}</p>
    @endif

    @if(Session::has('edited_user'))
      <p class="p-3 mb-2 bg-info text-white rounded">{{session('edited_user')}}</p>
    @endif

    @if(Session::has('created_user'))
    <p class="p-3 mb-2 bg-primary text-white rounded">{{session('created_user')}}</p>
  @endif

    <h1 class="font-weight-bold text-dark">Users</h1>

    <table class="table table-hover table-dark table-responsive rounded-lg">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
          </tr>
        </thead>
        <tbody>

            @if($users)         
            
            @foreach ($users as $user)
                
            <tr>
                <td>{{$user->id}}</td> 
                <td><img height="25" width="30" class="rounded-circle" src="/images/{{!empty($user->photo) ? $user->photo->file:'no img.png'}}" alt=""></td>
                <td><a href="{{route('users.edit',$user->id)}}" class="text-light">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                {{-- {{!empty($user->role) ? $user->role->name:''}} --}}
                {{-- <td>{{$user->role->name}}</td>              --}}
                <td>{{!empty($user->role) ? $user->role->name:''}}</td> 
                <td>{{$user->is_active== 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach
            
            @endif

        </tbody>
      </table>
    
@endsection