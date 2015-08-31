@extends('master')

@section('content')
 <div class="row">
     {!! Form::open(['route'=>'customer.post_new']) !!}
     <h1>New Customer</h1>
     <div class="col-md-6">
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
         <!--- Dob Field --->
         <div class="form-group">
             {!! Form::label('dob', 'Date of Birth:') !!}
             <div class='input-group date' id='dobpicker'>
                 {!! Form::text('dob', null, ['class' => 'form-control']) !!}
                 <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
             </div>
         </div>
         <!--- Gender Field --->
         <div class="form-group">
             {!! Form::label('gender', 'Gender:') !!}
             {!! genderDropDown('gender',null,['class' => 'form-control']) !!}
         </div>
         <!--- State of Origin Field --->
         <div class="form-group">
             {!! Form::label('state_of_origin', 'State of Origin:') !!}
             {!! statesDropDown('state_of_origin',null,['class' => 'form-control']) !!}
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
         <!--- Hostel Address Field --->
         <div class="form-group">
             {!! Form::label('hostel_address', 'Hostel Address:') !!}
             {!! Form::textarea('hostel_address', null, ['class' => 'form-control']) !!}
         </div>
     </div>
     <div class="col-md-6">
         <!--- Guardian Name Field --->
         <div class="form-group">
             {!! Form::label('guardian_name', 'Guardian Name:') !!}
             {!! Form::text('guardian_name', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Guardian Phone Field --->
         <div class="form-group">
             {!! Form::label('guardian_phone', 'Guardian Phone:') !!}
             {!! Form::text('guardian_phone', null, ['class' => 'form-control','maxlength'=>11]) !!}
         </div>
         <!--- Guardian Address Field --->
         <div class="form-group">
             {!! Form::label('guardian_address', 'Guardian Address:') !!}
             {!! Form::textarea('guardian_address', null, ['class' => 'form-control']) !!}
         </div>
         <hr>
         <h3>Initial Account Balance</h3>
         <!--- Account Balance Field --->
         <div class="form-group">
             {!! Form::label('account_balance', 'Account Balance (&#8358;):') !!}
             {!! Form::text('account_balance', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Add Customer Field --->
         <div class="form-group">
             <button type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-ok-circle"></span> Add Customer
             </button>
             <a href="{!! route('customer.list') !!}" class="btn btn-danger">
                 <span class="glyphicon glyphicon-arrow-left"></span> Back
             </a>
         </div>
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
     {!! Form::close() !!}
 </div>
@stop

@include('partials._datepicker')