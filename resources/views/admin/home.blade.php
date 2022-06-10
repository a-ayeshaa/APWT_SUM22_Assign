@extends('layouts.loggedin')
@section('content')
    <h3>WELCOME ADMIN</h3>
    <h3>DASHBOARD</h3>
    <h4>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td><a href="{{route('user.details',['id'=>$user->id])}}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                </tr>   
            @endforeach
        </table>
    </h4>
@endsection