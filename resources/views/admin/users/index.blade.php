@extends('layouts.sidebar')


@section('content')
<h1>USERS</h1>

<div class="col-lg-10">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
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
            <td>{{ $user->name }}</td>
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