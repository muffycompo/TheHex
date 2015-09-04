<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>The Hex</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/master.min.css" rel="stylesheet">

  @yield('styles.header')

  <link href="/css/style.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/js/ieshim.min.js"></script>
  <![endif]-->
</head>

<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img class="navbar-brand" src="/images/dashboard-logo.png" alt="Brand">
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="{!! route('dashboard') !!}">
            <span class="glyphicon glyphicon-th-large"></span>&nbsp;Dashboard
          </a>
        </li>
        @role('admin')
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user thehex-red"></span>&nbsp;Users
          </a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('auth.signup','New User') !!}</li>
            <li>{!! link_to_route('user.list','User List') !!}</li>
          </ul>
          @endrole
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-folder-open thehex-blue"></span>&nbsp;&nbsp;Customers
          </a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('customer.new','New Customer') !!}</li>
            <li>{!! link_to_route('customer.list','Customer List') !!}</li>
            <li>{!! link_to_route('cashierdesk','Cashier Desk') !!}</li>
            @role('admin')
            <li>{!! link_to_route('customer.topup','Customer Top-Up') !!}</li>
            @endrole
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-cutlery thehex-red"></span>&nbsp;Orders
          </a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('order.new','New Order') !!}</li>
            <li>{!! link_to_route('order.list','Order List') !!}</li>
          </ul>
        </li>
        @role('admin')
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-book thehex-blue"></span>&nbsp;Rollovers
          </a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('rollover.new','New Rollover') !!}</li>
            <li>{!! link_to_route('rollover.list','Rollover List') !!}</li>
          </ul>
        </li>
        @endrole
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! authUserFullname() !!} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{!! route('user.get_profile',[$user->id]) !!}">
                <span class="glyphicon glyphicon-cog"></span>&nbsp;Profile
              </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
              <a href="{!! route('auth.logout') !!}">
                <span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">
  @include('partials._notification')
  @yield('content')
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/master.min.js"></script>

@yield('scripts.footer')
</body>
</html>
