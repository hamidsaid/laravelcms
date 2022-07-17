@extends('layouts.sidebar')

@section('content')

<h1>Edit Users</h1>

<div class="col-sm-3">

     <img src="{{ $user->photo ? $user->photo->path : 'https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg'}}" alt="" class="img-responsive img-rounded">
</div>



<div class="col-lg-6">
    
     {{-- //error validation --}}
 @include('includes.form_error')


{{-- NOTE we changed from form to model below so as to bind the form with its model so as to filled with 
data automatically form the db --}}
{!! Form::model($user,['method'=>'PATCH', 'action'=> ['App\Http\Controllers\AdminUsersController@update',$user->id],'files'=>true]) !!}


<div class="form-group">
       {!! Form::label('name', 'Name:') !!}
       {!! Form::text('name', null, ['class'=>'form-control'])!!}
 </div>


 <div class="form-group">
  {!! Form::label('email', 'Email:') !!}
  {!! Form::email('email', null, ['class'=>'form-control'])!!}
 </div>

 <div class="form-group">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $roles , null, ['class'=>'form-control'])!!}
</div>


<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), null , ['class'=>'form-control'])!!}
 </div>

 <div class="form-group">
    {!! Form::label('photo_id', 'Photo:') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
 </div>


 <div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class'=>'form-control'])!!}
 </div>

   <div class="form-group">
      {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
   </div>

 {!! Form::close() !!}


</div>




@endsection