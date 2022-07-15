@extends('layouts.sidebar')

@section('content')

<h1>Create Users</h1>

<div class="col-lg-6">
    
     {{-- //error validation --}}
 @include('includes.form_error')



{!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\AdminUsersController@store','files'=>true]) !!}


<div class="form-group">
       {!! Form::label('name', 'Name:') !!}
       {!! Form::text('name', null, ['class'=>'form-control'])!!}
 </div>


 <div class="form-group">
  {!! Form::label('email', 'Email:') !!}
  {!! Form::email('email', 'example@gmail.com', ['class'=>'form-control'])!!}
 </div>

 <div class="form-group">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $roles , null, ['class'=>'form-control'])!!}
</div>


<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', array(1 => 'Active', 0=> 'Not Active'), 0 , ['class'=>'form-control'])!!}
 </div>

 <div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class'=>'form-control'])!!}
 </div>

   <div class="form-group">
      {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
   </div>

 {!! Form::close() !!}


</div>




@endsection