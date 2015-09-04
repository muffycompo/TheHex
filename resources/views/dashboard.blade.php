@extends('master')

@section('content')
        <!-- Main component for a primary marketing message or call to action -->
<div class="well">
    <div class="row">
        <div class="col-md-12">
            <h3>Welcome, <strong>@include('partials._fullname')</strong>.</h3>
        </div>
        <div class="col-md-5">
            <p>Your Role: <strong>{!! $user->role->name !!}</strong></p>
            <p>Role Description: <strong>{!! $user->role->description !!}</strong></p>
            <hr>
            <div class="row">
                <div class="col-md-7">
                    <p><strong>Today&apos;s New Customers</strong></p>
                    @if(count($new_customers) > 0)
                    <ul class="list-unstyled">
                        @foreach($new_customers as $customer)
                            <li>{!! $customer->firstname . ' ' . $customer->lastname . ' ['. $customer->thc .']' !!}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-md-5">
                    <p><strong>Today&apos;s Sale</strong></p>
                    <h3><span class="label label-default">{!! nairaFormater($total_sales->total_sales) !!}</span></h3>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-11">
                    <p><strong>Sales for the past 7 days</strong></p>
                    <canvas id="sales_chart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@include('partials._charts')