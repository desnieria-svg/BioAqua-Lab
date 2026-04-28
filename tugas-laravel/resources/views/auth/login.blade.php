@extends('layouts.app')

@section('content')

<h2>Login</h2>

<form method="POST" action="/login">
@csrf

<input type="email" name="email"><br>
<input type="password" name="password"><br>

<button type="submit">Login</button>
</form>

@endsection
