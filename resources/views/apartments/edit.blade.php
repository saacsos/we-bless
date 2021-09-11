@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">แก้ไขอพาร์ตเมนต์</h1>

    <form action="{{ route('apartments.update', ['apartment' => $apartment->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name">ชื่อ</label>
            <input type="text" class="border-2"
                   name="name"
                   autocomplete="off"
                   value="{{ $apartment->name }}"
                placeholder="ระบุชื่ออพาร์ตเมนต์">
        </div>

        <div class="mb-4">
            <label for="num_floor">จำนวนชั้น</label>
            <input type="number" class="border-2"
                   min="1" value="{{ $apartment->num_floor }}"
                   name="num_floor"> ชั้น
        </div>

        <div class="mb-4">
            <label for="num_room">จำนวนห้อง</label>
            <input type="number" class="border-2"
                   min="1" value="{{ $apartment->num_room }}"
                    name="num_room"> ห้อง
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                แก้ไข
            </button>
        </div>
    </form>

    <hr>
    <div class="mt-4 bg-red-100">
        <h2>DANGER ZONE</h2>

        <form action="{{ route('apartments.destroy', ['apartment' => $apartment->id]) }}" method="POST">
            @method('DELETE')
            @csrf

            <p>การลบ ไม่สามารถกู้คืนได้</p>
            <div>
                <label for="destroy">ใส่ชื่ออพาร์ตเมนต์เพื่อยืนยันการลบ</label>
                <input type="text" name="name">
            </div>
            <button type="submit" class="bg-red-400 hover:bg-red-200">
                ลบ
            </button>
        </form>
    </div>
@endsection
