@extends('settings::layouts.master')

@section('module-content')
    <h1>Hello World anjing</h1>

    <p>Module: {!! config('settings.name') !!}</p>
@endsection
