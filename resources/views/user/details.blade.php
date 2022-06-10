@extends('layouts.loggedin')
@section('content')
    <h3> DETAILS</h3>
    <h4>
        @foreach ($users as $user)
            NAME : {{ $user->name }}
            <br>
            ID : {{ $user->id }}
            <br>
            EMAIL : {{ $user->email }}
            <br>
            TYPE : {{$user->type}}
            <br><br>
        @endforeach     
    </h4>
@endsection