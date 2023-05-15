@extends('layout')

@section('content')
<h4 class="text-center">Sign In</h4>
<form action="{{ route('auth')}}" method="post">
    @csrf
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" placeholder="Masukan Eamil" class="form-control"><br>
    <label for="password">Password :</label>
    <input type="password" name="password" id="password" placeholder="Masukan Password" class="form-control"><br>
    <button type="submit" class="btn btn-primary">Sign In</button> <a href="{{ route('index')}}" class="btn btn-primary">Back</a>
</form>
@endsection