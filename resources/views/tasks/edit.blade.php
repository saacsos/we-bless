@extends('layouts.main')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl ">
        แก้ไขงาน {{ $task->title }}
    </h2>

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title">หัวข้องาน</label>
            <input type="text" class="border w-full p-2"
                   name="title" id="title" value="{{ $task->title }}"
                   autocomplete="off"
                placeholder="ระบุหัวข้องาน">
        </div>

        <div class="mb-4">
            <label for="detail">รายละเอียดงาน</label>
            <textarea name="detail" id="detail" class="w-full border p-2" rows="10">{{ $task->detail }}</textarea>
        </div>

        <div class="mb-4">
            <label for="due_date">วันสิ้นสุด</label>
            <input type="date" class="border p-2" value="{{ $task->due_date->format('Y-m-d') }}"
                   name="due_date">
        </div>

        <div class="mb-4">
            <label for="tags">Tags ของงาน (คั่นแต่ละ Tag ด้วย ,)</label>
            <input type="text" class="border p-2 w-full"
                   autocomplete="off" value="{{ $task->tag_names }}"
                   name="tags" >
        </div>

        <div>
            <button type="submit" class="border px-4 py-2 bg-blue-300 hover:bg-blue-200">
                แก้ไข
            </button>
        </div>
    </form>


    <hr class="mt-4">
    <div class="mt-4 bg-red-100 p-4">
        <h2 class="text-xl text-red-600">DANGER ZONE</h2>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @method('DELETE')
            @csrf


            <div class="mt-2">
                <label for="destroy">ใส่หัวข้องานเพื่อยืนยันการลบ</label>
                <p class="italic inline-block text-red-600">การลบ ไม่สามารถกู้คืนได้</p>
                <input type="text" class="border w-full p-2 placeholder-red-300" placeholder="ใส่หัวข้องานเพื่อยืนยันการลบ" name="name">
            </div>
            <div class="mt-2">
                <button type="submit" class="border px-4 py-2 bg-red-400 hover:bg-red-200">
                    ลบ
                </button>
            </div>

        </form>
    </div>
@endsection
