@extends('master')

@section('content')
 <div class="row">
     {!! Form::open(['route'=>'customer.post_topup']) !!}
     <h1>New Customer Top-Up</h1>
     <div class="col-md-6">
         <!--- Customer THC Field --->
         <div class="form-group">
             {!! Form::label('customer_thc', 'Customer THC:') !!}
             {!! Form::text('customer_thc', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Top-Up Amount Field --->
         <div class="form-group">
             {!! Form::label('topup_amount', 'Top-Up Amount (&#8358;):') !!}
             {!! Form::text('topup_amount', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Add Customer Field --->
         <div class="form-group">
             <button type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-ok-circle"></span> Top Up
             </button>
             <a href="{!! route('customer.list') !!}" class="btn btn-danger">
                 <span class="glyphicon glyphicon-arrow-left"></span> Cancel
             </a>
         </div>

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
     {!! Form::close() !!}
 </div>
@stop
