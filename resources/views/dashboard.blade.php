@extends('master')

@section('content')
        <!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <h2>The Hex Dashboard</h2>
    <p>Welcome to the Hex Dashboard, <strong>@include('partials._fullname')</strong>.</p>
    <p>Role: <strong>{!! $user->role->name !!}</strong></p>
    @if($user->is('admin'))
        <p>Description: {!! $user->role->description !!}</p>
    @elseif($user->is('cashier'))
        <p>Description: {!! $user->role->description !!}</p>
    @else
        <p>Check: <strong>Is Not Amin</strong></p>
    @endif
</div>
@stop