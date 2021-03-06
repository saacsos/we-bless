@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        Room {{ $room->type }}-{{ $room->name }}
    </h1>

    <div class="text-3xl">
        Apartment
        <a class="text-blue-600 hover:text-green-600"
            href="{{ route('apartments.show', ['apartment' => $room->apartment->id]) }}">
            {{ $room->apartment->name }}
        </a>

    </div>

    <div class="text-2xl">
        Floor {{ $room->floor }}
    </div>

    <div class="mt-4">
        <a class="px-4 py-2 bg-yellow-400 hover:bg-yellow-200"
            href="{{ route('rooms.edit', ['room' => $room->id]) }}">
            แก้ไขห้อง
        </a>
    </div>

@endsection
