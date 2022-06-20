@extends('layouts.adminloggedin')
@section('content')
    <h3>WELCOME ADMIN</h3>
    <h3>DASHBOARD</h3>
    <h4>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>DELETE</th>
                <th>MODIFY</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td><a href="{{route('user.details',['id'=>$user->id])}}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td><a href="{{route('user.delete',['id'=>$user->id])}}">DELETE</a></td>
                    <td><a href="{{route('user.modify',['id'=>$user->id])}}">MODIFY</a></td>
                </tr>   
            @endforeach
        </table>
    </h4>
@endsection