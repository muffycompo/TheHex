@extends('master')

@section('content')
        <!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <h1>The Hex Dashboard</h1>
    <p>Welcome to the Hex Dashboard, <strong>@include('partials._fullname')</strong>.</p>
    <p>Role: <strong>{!! $user->role->role_name !!}</strong></p>
</div>
@stop