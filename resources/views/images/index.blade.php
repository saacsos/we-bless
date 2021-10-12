@extends('layouts.main')

@section('content')
    <h1 class="text-3xl">
        All Images
    </h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Path</th>
                <th>Preview</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td class="border px-3">
                        {{ $image->name }}
                    </td>
                    <td class="border px-3">
                        {{ $image->path }}
                    </td>
                    <td class="border px-3">
                        <img src="{{ url(\Str::replace('public/', 'storage/', $image->path)) }}"
                             class="w-16"
                             alt="{{ $image->name }}">
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@endsection
