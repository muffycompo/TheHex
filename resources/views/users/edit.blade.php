@extends('master')

@section('content')
 <div class="row">
     <h1>Edit User: {!! $userdetail->firstname . ' ' . $userdetail->lastname !!}</h1>
     <div class="col-md-6">
         {!! Form::open(['route'=>'user.post_edit']) !!}
                 <!--- First Name Field --->
         <div class="form-group">
             {!! Form::label('firstname', 'First Name:') !!}
             {!! Form::text('firstname', $userdetail->firstname, ['class' => 'form-control']) !!}
         </div>
         <!--- Lastname Field --->
         <div class="form-group">
             {!! Form::label('lastname', 'Lastname:') !!}
             {!! Form::text('lastname', $userdetail->lastname, ['class' => 'form-control']) !!}
         </div>
         <!--- Email Field --->
         <div class="form-group">
             {!! Form::label('email', 'Email:') !!}
             {!! Form::email('email', $userdetail->email, ['class' => 'form-control']) !!}
         </div>
         <!--- Phone Field --->
         <div class="form-group">
             {!! Form::label('phone', 'Phone:') !!}
             {!! Form::text('phone', $userdetail->phone, ['class' => 'form-control','maxlength'=>11]) !!}
         </div>
         <!--- Password Field --->
         <div class="form-group">
             {!! Form::label('password', 'Password:') !!}
             {!! Form::password('password', ['class' => 'form-control']) !!}
         </div>
         <!--- Role Field --->
         <div class="form-group">
             {!! Form::label('role', 'Role:') !!}
             {!! rolesDropDown('role',$userdetail->role_id,['class' => 'form-control']) !!}
         </div>
         <!--- Add User Field --->
         <div class="form-group">
             <button type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-ok-circle"></span> Update
             </button>
             <a href="{!! route('user.list') !!}" class="btn btn-danger">
                 <span class="glyphicon glyphicon-arrow-left"></span> Cancel
             </a>
         </div>
         {!! Form::hidden('user_id', $userdetail->id) !!}
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
