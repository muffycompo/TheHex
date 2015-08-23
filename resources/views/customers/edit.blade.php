@extends('master')

@section('content')
 <div class="row">
     {!! Form::open(['route'=>'customer.post_edit']) !!}
     <h1>Edit Customer: {!! $customerdetail->firstname . ' ' . $customerdetail->lastname !!}</h1>
     <div class="col-md-6">
         <!--- First Name Field --->
         <div class="form-group">
             {!! Form::label('firstname', 'First Name:') !!}
             {!! Form::text('firstname', $customerdetail->firstname, ['class' => 'form-control']) !!}
         </div>
         <!--- Lastname Field --->
         <div class="form-group">
             {!! Form::label('lastname', 'Lastname:') !!}
             {!! Form::text('lastname', $customerdetail->lastname, ['class' => 'form-control']) !!}
         </div>
         <!--- Dob Field --->
         <div class="form-group">
             {!! Form::label('dob', 'Date of Birth:') !!}
             {!! Form::text('dob', dobFormat($customerdetail->profile->dob), ['class' => 'form-control']) !!}
         </div>
         <!--- Gender Field --->
         <div class="form-group">
             {!! Form::label('gender', 'Gender:') !!}
             {!! genderDropDown('gender',$customerdetail->profile->gender_id,['class' => 'form-control']) !!}
         </div>
         <!--- State of Origin Field --->
         <div class="form-group">
             {!! Form::label('state_of_origin', 'State of Origin:') !!}
             {!! statesDropDown('state_of_origin',$customerdetail->profile->state_id,['class' => 'form-control']) !!}
         </div>
         <!--- Email Field --->
         <div class="form-group">
             {!! Form::label('email', 'Email:') !!}
             {!! Form::email('email', $customerdetail->email, ['class' => 'form-control']) !!}
         </div>
         <!--- Phone Field --->
         <div class="form-group">
             {!! Form::label('phone', 'Phone:') !!}
             {!! Form::text('phone', $customerdetail->phone, ['class' => 'form-control','maxlength'=>11]) !!}
         </div>
         <!--- Hostel Address Field --->
         <div class="form-group">
             {!! Form::label('hostel_address', 'Hostel Address:') !!}
             {!! Form::textarea('hostel_address', $customerdetail->profile->hostel_address, ['class' => 'form-control']) !!}
         </div>
     </div>
     <div class="col-md-6">
         <!--- Guardian Name Field --->
         <div class="form-group">
             {!! Form::label('guardian_name', 'Guardian Name:') !!}
             {!! Form::text('guardian_name', $customerdetail->profile->guardian_name, ['class' => 'form-control']) !!}
         </div>
         <!--- Guardian Phone Field --->
         <div class="form-group">
             {!! Form::label('guardian_phone', 'Guardian Phone:') !!}
             {!! Form::text('guardian_phone', $customerdetail->profile->guardian_phone, ['class' => 'form-control','maxlength'=>11]) !!}
         </div>
         <!--- Guardian Address Field --->
         <div class="form-group">
             {!! Form::label('guardian_address', 'Guardian Address:') !!}
             {!! Form::textarea('guardian_address', $customerdetail->profile->guardian_address, ['class' => 'form-control']) !!}
         </div>
         <!--- Add Customer Field --->
         <div class="form-group">
             {!! Form::submit('Update Customer', ['class' => 'btn btn-primary']) !!}
             {!! Form::hidden('customer_id', $customerdetail->id) !!}
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
