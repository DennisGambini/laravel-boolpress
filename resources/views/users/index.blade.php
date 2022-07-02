@extends('layouts.post_layout')

@section('pageTitle', 'All Users')

@section('mainContent')

<ul>
    @foreach ($users as $user)
    <li>
        <div>{{$user->name}}</div>
        <div>{{$user->email}}</div>
        <div>{{$user->id}}</div>
        <div>{{$user->created_at}}</div>
        <div>{{$user->password}}</div>
    </li>
    @endforeach
</ul>


@endsection