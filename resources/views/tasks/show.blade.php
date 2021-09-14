@extends('layouts.main')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl ">
        <div class="flex">
            <div class="border pl-6 pr-1 {{ $task->is_urgent ? "bg-red-600 text-gray-200" : "bg-gray-300" }} inline-block">
                Task
            </div>
            <div class="border px-2 inline-block w-full">
                {{ $task->title }}
            </div>
        </div>
    </h2>

    <div class="mt-4">
        Tags:
        @foreach($task->tags as $tag)
            <a href="{{ route('tags.slug', ['slug' => $tag->name]) }}" class="inline-block ml-2 px-2 bg-gray-200 hover:bg-gray-100">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>


    <div class="mt-4">
        <a class="px-4 py-2 bg-yellow-400 hover:bg-yellow-200"
           href="{{ route('tasks.edit', ['task' => $task->id]) }}">
            แก้ไขงาน
        </a>
    </div>

    <div class="mt-4 p-6">
        <div>
            วันสิ้นสุด {{ $task->due_date->diffForHumans() }}
        </div>
        <div>
            {{ $task->detail }}
        </div>

    </div>

@endsection
