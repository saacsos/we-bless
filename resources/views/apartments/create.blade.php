@extends('layouts.main')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl ">
        เพิ่มอพาร์ตเมนต์ใหม่
    </h2>

    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name">ชื่อ</label>
            <input type="text" class="border-2"
                   name="name"
                   autocomplete="off"
                placeholder="ระบุชื่ออพาร์ตเมนต์">
        </div>

        <div class="mb-4">
            <label for="num_floor">จำนวนชั้น</label>
            <input type="number" class="border-2"
                   min="1"
                   name="num_floor"> ชั้น
        </div>

        <div class="mb-4">
            <label for="num_room">จำนวนห้อง</label>
            <input type="number" class="border-2"
                   min="1"
                    name="num_room"> ห้อง
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                เพิ่ม
            </button>
        </div>
    </form>
@endsection
