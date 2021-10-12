@extends('layouts.main')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('content')
    <h1>
        {{ __($exception->getMessage() ?: 'Forbidden') }}
    </h1>
@endsection
