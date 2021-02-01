@extends('auth.master_auth')
@section('title', 'Login Admin')
@section('content')
<div class="login">
    <h1>Login</h1>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{$error}}</p>
    @endforeach
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" @error('email') is-invalid @enderror" placeholder="Email" required="required" />
        <input type="password" name="password" value="{{ old('password') }}" @error('password') is-invalid @enderror"  placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
    <a href="{{ route('privacy.index') }}" target="_blank" class="float-right p-1 text-info">privacy policy</a>
</div>
@endsection