@extends('layouts.sidebar')


@section('content')

<h1>CREATE A POST</h1>

<div class="row col-lg-10">

         {{-- //error validation --}}
     @include('includes.form_error')


    {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\AdminPostsController@store', 'files'=>true]) !!}

      <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
      </div>

 

       <div class="form-group">
           {!! Form::label('photo_id', 'Photo:') !!}
           {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
        </div>


       <div class="form-group">
           {!! Form::label('body', 'Description:') !!}
           {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
       </div>




        <div class="form-group">
           {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close() !!}

</div>


@endsection