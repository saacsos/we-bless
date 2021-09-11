@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        Apartment {{ $apartment->name }}
    </h1>

    <div class="mb-4">
        จำนวน {{ $apartment->num_floor }} ชั้น
        {{ $apartment->rooms->count() }} / {{ $apartment->num_room }} ห้อง
    </div>

    <hr>
    <div class="my-4">
        <a class="border-2 bg-yellow-400 px-4 py-2"
            href="{{ route('apartments.edit', ['apartment' => $apartment->id]) }}">
            แก้ไขอพาร์ตเมนต์นี้
        </a>
    </div>

    <div class="mt-4">
        <h2 class="text-3xl">
            รายชื่อห้องในอพาร์ตเมนต์
        </h2>

        <div class="my-2">
            <a class="px-4 py-2 bg-blue-400 hover:bg-blue-200"
                href="{{ route('apartments.rooms.create', ['apartment' => $apartment->id]) }}">
                + เพิ่มห้องใหม่
            </a>
        </div>

        <ul>
            @foreach($apartment->rooms->sortBy('floor') as $room)
                <li>
                    <a class="text-blue-600 hover:text-purple-600"
                        href="{{ route('rooms.show', ['room' => $room->id]) }}">
                        {{ $room->type }}-{{ $room->name }}
                    </a>

                    Floor {{ $room->floor }}
                </li>

            @endforeach
        </ul>
    </div>


@endsection
