@extends('layouts.adminloggedin')
@section('content')
    <h3>WELCOME ADMIN</h3>
    <h4>MODIFY : {{$user->name}}</h4>

    <form action="" method="POST" >
        {{ csrf_field() }}
        USER ID : <input type="text" name="id" placeholder=" {{$user->id}}" value=" {{$user->id}} " readonly>
        <br><br>
        Name: <input type="text" name="name" placeholder="{{$user->name}}" value=" {{$user->name}} ">
        <br>
        @error('name')
            {{ $message}}<br>
        @enderror
        <br>
        Email: <input type="email" name="email" placeholder="{{$user->email}}" value=" {{$user->email}} ">
        <br>
        @error('email')
            {{ $message}}<br>
        @enderror
        <br>
        Password: <input type="password" name="password" placeholder="Password" value="">
        <br>
        @error('password')
            {{ $message}}<br>
        @enderror
        <br>
        Confirm Password : <input type="password" name="confirmPassword" placeholder="Re-enter Password" value="">
        <br>
        @error('confirmPassword')
            {{ $message}}<br>
        @enderror
        <input type="submit" name="modify" value="MODIFY">
    </form>

@endsection