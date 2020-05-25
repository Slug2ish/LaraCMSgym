{{-- @extends('layouts.admin') --}}
@extends('layouts.app')


@section('content')


    <h1 class="font-weight-bold text-dark">Edit Users</h1>
 

    <div class="container-fluid">
    
        <div class="row">
    
        <div class="col-sm-3">
    
            <img height="320" src="/images/{{!empty($user->photo) ? $user->photo->file:'no img.png'}}" alt="" class="img-fluid rounded">
    
        </div>
 
    
        <div class="col-sm-9">
        
            {{-- {!! Form::model($user, ['route' => ['users.update', $user->id]]) !!} --}}
            {!! Form::model($user,['action'=>['AdminUsersController@update',$user->id],'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
            
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class ="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name',null, ['class'=>'form-control','placeholder'=>'Enter your name'])}}
            </div>
            {{-- <div class ="form-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body',null, ['id' => 'ckeditor-demo','class' => 'form-control','placeholder' => 'Body Text'])}}
            </div>  --}}
            <div class ="form-group">
                {{Form::label('email','Email')}}
                {{Form::email('email',null, ['class' => 'form-control','placeholder' => 'Enter your email'])}}
            </div> 
            <div class ="form-group">
                {{Form::label('role_id','Role')}}
                {{Form::select('role_id', $roles ,null,['class' => 'form-control'])}}
            </div> 
            <div class ="form-group">
                {{Form::label('is_active','Status')}}
                {{Form::select('is_active', $active, null , ['class' => 'form-control'])}}
            </div> 
            <div class ="form-group">
                {{Form::label('password','Password')}}
                {{Form::password('password',['class' => 'form-control','placeholder' => 'Enter your password'])}}
            </div> 
            <div class ="form-group">  
                {{Form::file('photo_id')}}
            </div> 
            <div class ="form-group"> 
            {{Form::submit('Update User',['class'=>'btn btn-primary btn-block data-toggle="button" aria-pressed="false"'])}}
            </div> 
            {!! Form::close() !!}



            {!! Form::open(['action'=>['AdminUsersController@destroy',$user->id],'method'=>'DELETE','class'=>'pull-right','enctype'=>'multipart/form-data']) !!}
            <div class ="form-group"> 
                {{Form::submit('Delete User',['class'=>'btn btn-danger btn-block data-toggle="button" aria-pressed="false"'])}}
            </div> 
            {!! Form::close() !!}

        </div> 
        </div>
    </div>

    @include('includes.form_error')

   

@endsection