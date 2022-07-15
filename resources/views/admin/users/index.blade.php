@extends('layouts.sidebar')


@section('content')
<h1>USERS</h1>

<div class="col-lg-10">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
                
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
          </tr>
        
          @endforeach
          
        </tbody>
      </table>
</div>

@endsection