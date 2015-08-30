@extends('master')

@section('content')
 <div class="row">
     {!! Form::open(['route'=>'order.post_new']) !!}
     <h1>New Order</h1>
     <div class="col-md-6">
         <!--- THC Field --->
         <div class="form-group">
             {!! Form::label('thc', 'THC:') !!}
             {!! Form::text('thc', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Order Amount Field --->
         <div class="form-group">
             {!! Form::label('order_amount', 'Order Amount (&#8358;):') !!}
             {!! Form::text('order_amount', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Order Type Field --->
         <div class="form-group">
             {!! Form::label('order_category', 'Order Type:') !!}
             {!! orderCategoryDropDown('order_category',null,['class' => 'form-control']) !!}
         </div>
         <!--- Add Customer Field --->
         <div class="form-group">
             <button type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-ok-circle"></span> Order
             </button>
             <a href="{!! route('order.list') !!}" class="btn btn-danger">
                 <span class="glyphicon glyphicon-arrow-left"></span> Back
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
