@extends('layouts.adminloggedin')
@section('content')
    <h3>MODIFIED DETAILS</h3>
    <h4>
        NAME : {{ $user->name }}
        <br>
        ID : {{ $user->id }}
        <br>
        EMAIL : {{ $user->email }}
        <br>
        TYPE : {{$user->type}}
        <br><br>    
    </h4>
@endsection