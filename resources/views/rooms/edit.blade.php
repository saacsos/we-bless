@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        แก้ไขห้อง {{ $room->type }}-{{ $room->name }}
    </h1>

    <form action="{{ route('rooms.update', ['room' => $room->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <label for="floor">ชั้น</label>
            <input type="number" name="floor"
                   class="border-2 @error('floor') border-red-400 bg-red-100 @enderror"
                   value="{{ old('floor', $room->floor) }}"

            > / {{ $room->apartment->num_floor }}
            @error('floor')
                <p class="text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="name">หมายเลขห้อง</label>
            <input type="text" name="name"
                   value="{{ old('name', $room->name) }}"
                    class="border-2 @error('name') border-red-400 bg-red-100 @enderror"
            >
            @error('name')
                <p class="text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="type">ประเภทห้อง</label>
            <select name="type" id="type" class="border-2 @error('type') border-red-400 bg-red-100 @enderror">
                @foreach($room_types as $type)
                    <option @if($type === old('type', $room->type)) selected @endif
                            value="{{ $type }}">
                        {{ $type }}
                    </option>
                @endforeach
            </select>
            @error('type')
                <p class="text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-400 px-4 py-2 hover:bg-blue-200">แก้ไข</button>
        </div>
    </form>

@endsection
