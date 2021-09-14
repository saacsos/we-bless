@extends('layouts.main')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl ">
        เพิ่มอพาร์ตเมนต์ใหม่
    </h2>

    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name">ชื่อ</label>
            <input type="text" class="border-2 @error('name') border-red-400 bg-red-100 @enderror"
                   name="name" value="{{ old('name') }}"
                   autocomplete="off"
                placeholder="ระบุชื่ออพาร์ตเมนต์">
            @error('name')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="num_floor">จำนวนชั้น</label>
            <input type="number" class="border-2 @error('num_floor') border-red-400 bg-red-100 @enderror"
                   min="1" value="{{ old('num_floor') }}"
                   name="num_floor"> ชั้น
            @error('num_floor')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="num_room">จำนวนห้อง</label>
            <input type="number" class="border-2 @error('num_room') border-red-400 bg-red-100 @enderror"
                   min="1" value="{{ old('num_room') }}"
                    name="num_room"> ห้อง
            @error('num_room')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                เพิ่ม
            </button>
        </div>
    </form>
@endsection
