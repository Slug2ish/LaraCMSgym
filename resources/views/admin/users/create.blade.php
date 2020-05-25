{{-- @extends('layouts.admin') --}}
@extends('layouts.app')


@section('content')


    <h1 class="font-weight-bold text-dark">Create Users</h1>

    {!! Form::open(['action'=>'AdminUsersController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class ="form-group">
    	{{Form::label('name','Name')}}
    	{{Form::text('name','', ['class'=>'form-control','placeholder'=>'Enter your name'])}}
    </div>
    {{-- <div class ="form-group">
    	{{Form::label('body','Body')}}
    	{{Form::textarea('body','', ['id' => 'ckeditor-demo','class' => 'form-control','placeholder' => 'Body Text'])}}
    </div>  --}}
    <div class ="form-group">
    	{{Form::label('email','Email')}}
    	{{Form::email('email','', ['class' => 'form-control','placeholder' => 'Enter your email'])}}
    </div> 
    <div class ="form-group">
    	{{Form::label('role_id','Role')}}
    	{{Form::select('role_id', $roles ,'',['class' => 'form-control'])}}
    </div> 
    <div class ="form-group">
    	{{Form::label('is_active','Status')}}
    	{{Form::select('is_active', $active,'', ['class' => 'form-control'])}}
    </div> 
    <div class ="form-group">
    	{{Form::label('password','Password')}}
    	{{Form::password('password',['class' => 'form-control','placeholder' => 'Enter your password'])}}
    </div> 
    <div class ="form-group">  
    	{{Form::file('photo_id')}}
    </div> 
    {{Form::submit('Create User',['class'=>'btn btn-primary btn-block data-toggle="button" aria-pressed="false"'])}}
    
    {!! Form::close() !!}

    @include('includes.form_error')

@endsection