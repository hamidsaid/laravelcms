@extends('layouts.sidebar')


@section('content')
<h1>USERS</h1>


@if(Session::has('deleted_user'))

<div class="alert alert-danger">
    <p>{{session('deleted_user')}}</p>

</div>
@endif

{{-- alert for creating a user --}}
@if(Session::has('user_created'))

<div class="alert alert-success col-lg-6">
    <p>{{session('user_created')}}</p>
</div>

@endif

<div class="col-lg-10">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created At</th>


          </tr>
        </thead>
        <tbody>

        @if($users)    
          @foreach($users as $user)
                
          <tr>
            <td>{{ $user->id }}</td>
            {{-- instead of this
            /images/{{ $user->photo? $user->photo->path : 'User has no photo' }} 
            as src path we use the below because of the accessor we wrote in Photo class 
            --}}
            <td> <img height="50" src="{{ $user->photo? $user->photo->path : 'https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg'}}"></td>
            <td><a href="{{ route('users.edit', $user->id ) }}"> {{ $user->name }}</a></td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{  $user->created_at? $user->created_at->diffForHumans() : 'null'}}</td>

          </tr>
        
          @endforeach
          @endif

        </tbody>
      </table>
</div>

@endsection