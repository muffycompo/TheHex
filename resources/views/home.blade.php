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
    <link href="/css/signin.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/js/ieshim.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
        {!! Form::open(['route'=>'auth.login','class'=>'form-signin']) !!}

        <p>
            <img src="/images/logo.png" alt="Logo">
        </p>

        {!! Form::label('username','Username:',['class'=>'sr-only']) !!}
        {!! Form::text('username', old('username'), ['class' => 'form-control','autofocus','placeholder'=>'Username']) !!}

        {!! Form::label('password','Password:',['class'=>'sr-only']) !!}
        {!! Form::password('password', ['class' => 'form-control','placeholder'=>'Password']) !!}
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <!---  Field --->
        <div class="form-group">
            {!! Form::submit('Login', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
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

        {!! Form::close() !!}


</div> <!-- /container -->

</body>
</html>
