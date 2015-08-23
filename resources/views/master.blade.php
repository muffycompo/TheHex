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
  <link href="/css/navbar-static-top.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
      <a class="navbar-brand" href="javascript:;">The Hex</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li>{!! link_to_route('dashboard','Dashboard') !!}</li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('auth.signup','New User') !!}</li>
            <li>{!! link_to_route('user.list','User List') !!}</li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customers</a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('customer.new','New Customer') !!}</li>
            <li>{!! link_to_route('customer.list','Customer List') !!}</li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orders</a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('order.new','New Order') !!}</li>
            <li>{!! link_to_route('order.list','Order List') !!}</li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rollovers</a>
          <ul class="dropdown-menu">
            <li><a href="#">New Rollover</a></li>
            <li><a href="#">Rollover List</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <p class="navbar-text"><em>Logged in as:</em></p>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@include('partials._fullname') <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li role="separator" class="divider"></li>
            <li>{!! link_to_route('auth.logout','Logout') !!}</li>
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
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-viewport-bug-workaround.js"></script>
<!-- This is only necessary if you do Flash::overlay('...') -->
<script>
  $('#flash-overlay-modal').modal();
</script>
</body>
</html>
