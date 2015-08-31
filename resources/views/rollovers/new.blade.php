@extends('master')

@section('content')
 <div class="row">
     {!! Form::open(['route'=>'rollover.post_new']) !!}
     <h1>New Rollover</h1>
     <div class="col-md-6">
         <!--- From THC Field --->
         <div class="form-group">
             {!! Form::label('from_thc', 'From (THC):') !!}
             {!! Form::text('from_thc', null, ['class' => 'form-control']) !!}
         </div>
         <!--- To THC Field --->
         <div class="form-group">
             {!! Form::label('to_thc', 'To (THC):') !!}
             {!! Form::text('to_thc', null, ['class' => 'form-control']) !!}
         </div>
         <!--- Order Amount Field --->
         {{--<div class="form-group">--}}
             {{--{!! Form::label('rollover_amount', 'Rollover Amount (&#8358;):') !!}--}}
             {{--{!! Form::text('rollover_amount', null, ['class' => 'form-control']) !!}--}}
         {{--</div>--}}
         <!--- Add Customer Field --->
         <div class="form-group">
             <button type="submit" class="btn btn-primary">
                 <span class="glyphicon glyphicon-ok-circle"></span> Rollover
             </button>
             <a href="{!! route('rollover.list') !!}" class="btn btn-danger">
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
