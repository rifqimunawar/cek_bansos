@extends('users::layouts.master')

@section('module-content')
    <h1>Hello World</h1>

    <p>Module: {!! config('users.name') !!}</p>
@endsection
