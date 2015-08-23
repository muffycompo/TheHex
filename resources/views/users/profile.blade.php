@extends('master')

@section('content')
 <div class="row">
     <h1>Edit Profile: {!! $user->firstname . ' ' . $user->lastname !!}</h1>
     <div class="col-md-6">
         {!! Form::open(['route'=>'user.post_profile']) !!}
                 <!--- First Name Field --->
         <div class="form-group">
             {!! Form::label('firstname', 'First Name:') !!}
             {!! Form::text('firstname', $user->firstname, ['class' => 'form-control']) !!}
         </div>
         <!--- Lastname Field --->
         <div class="form-group">
             {!! Form::label('lastname', 'Lastname:') !!}
             {!! Form::text('lastname', $user->lastname, ['class' => 'form-control']) !!}
         </div>
         <!--- Email Field --->
         <div class="form-group">
             {!! Form::label('email', 'Email:') !!}
             {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
         </div>
         <!--- Phone Field --->
         <div class="form-group">
             {!! Form::label('phone', 'Phone:') !!}
             {!! Form::text('phone', $user->phone, ['class' => 'form-control','maxlength'=>11]) !!}
         </div>
         <!--- Password Field --->
         <div class="form-group">
             {!! Form::label('password', 'Password:') !!}
             {!! Form::password('password', ['class' => 'form-control']) !!}
         </div>
         <!--- Add User Field --->
         <div class="form-group">
             {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
         </div>
         {!! Form::hidden('user_id', $user->id) !!}
         {!! Form::close() !!}

     </div>
     <div class="col-md-6">
         @if($errors->any())
             <div class="alert alert-danger alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <ul>
                     @foreach($errors->all() as $error)
                         <li>{!! $error !!}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
     </div>
 </div>
@stop
