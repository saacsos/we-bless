@extends('layouts.main')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl ">
        เพิ่มงานใหม่
    </h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title">หัวข้องาน</label>
            <input type="text" class="border w-full p-2"
                   name="title"
                   id="title"
                   autocomplete="off"
                placeholder="ระบุหัวข้องาน">
        </div>

        <div class="mb-4">
            <label for="detail">รายละเอียดงาน</label>
            <textarea name="detail" id="detail" class="w-full border p-2" rows="10"></textarea>
        </div>

        <div class="mb-4">
            <label for="due_date">วันสิ้นสุด</label>
            <input type="date" class="border p-2"
                   name="due_date">
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                เพิ่ม
            </button>
        </div>
    </form>
@endsection
