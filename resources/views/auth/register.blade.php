@extends('master')

@section('content')
 <div class="row">
     <h1>New User</h1>
     <div class="col-md-6">
         {!! Form::open(['route'=>'auth.register']) !!}
         <!--- First Name Field --->
         <div class="form-group">
             {!! Form::label('firstname', 'First Name:') !!}
             {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Lastname Field --->
         <div class="form-group">
             {!! Form::label('lastname', 'Lastname:') !!}
             {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Email Field --->
         <div class="form-group">
             {!! Form::label('email', 'Email:') !!}
             {!! Form::email('email', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Phone Field --->
         <div class="form-group">
             {!! Form::label('phone', 'Phone:') !!}
             {!! Form::text('phone', null, ['class' => 'form-control','maxlength'=>11]) !!}
         </div>
         <!--- Username Field --->
         <div class="form-group">
             {!! Form::label('username', 'Username:') !!}
             {!! Form::text('username', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Password Field --->
         <div class="form-group">
             {!! Form::label('password', 'Password:') !!}
             {!! Form::password('password', ['class' => 'form-control']) !!}
         </div>
         <!--- Role Field --->
         <div class="form-group">
             {!! Form::label('role', 'Role:') !!}
             {!! rolesDropDown('role',null,['class' => 'form-control']) !!}
         </div>
         <!--- Add User Field --->
         <div class="form-group">
             {!! Form::submit('Add User', ['class' => 'btn btn-primary']) !!}
         </div>
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
