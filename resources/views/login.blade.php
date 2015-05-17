<!doctype html>
<html>
<head>
    <title>Look at me login</title>
</head>
<body>
{{ Form::open(['url' => 'login']) }}

<h1>Login</h1>

<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
</p>

<p>
    {{ form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email')) }}
</p>

<p>
    {{ form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit() }}</p>
{{ Form::close () }}
</body>
</html>