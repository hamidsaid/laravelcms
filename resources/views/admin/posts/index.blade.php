@extends('layouts.sidebar')


@section('content')

<h1>POSTS</h1>

{{-- show alert --}}
@if(Session::has('create_post'))
<div class="alert alert-success">
    <p>{{session('create_post')}}</p>
</div>
@endif


<div class="col-lg-10">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Author</th>
                <th>title</th>
                <th>Posted At</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
            @foreach($posts as $post)
                
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach

            @endif
          
        </tbody>
       
    </table>
</div>

@endsection