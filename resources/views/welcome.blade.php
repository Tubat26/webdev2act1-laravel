@extends('base')
@section('title', 'Welcome Page')

<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $std)
            <tr>
                <th scope="row">{{ $std -> id }}</th>
                <td>{{ $std -> name }}</td>
                <td>{{ $std -> age }}</td>
                <td>{{ $std -> gender }}</td>
                <td>{{ $std -> address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">email_verified_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user -> id }}</th>
                <td>{{ $user -> name }}</td>
                <td>{{ $user -> email }}</td>
                <td>{{ $user -> email_verified_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>