@extends('layouts.main')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl ">
        รายการอพาร์ตเมนต์ทั้งหมด
    </h2>

    @can('create', \App\Models\Apartment::class)
    <div class="my-6">
        <a class="border-2 bg-green-300 px-4 py-2 shadow-lg hover:shadow-md"
            href="{{ route('apartments.create') }}">
            + เพิ่มอพาร์ตเมนต์ใหม่
        </a>
    </div>
    @endcan

    <table class="w-full lg:w-1/2 shadow-lg">
        <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">ชื่ออพาร์ตเมนต์</th>
                <th class="px-4 py-3">จำนวนชั้น</th>
                <th class="px-4 py-3">จำนวนห้อง</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartments as $apartment)
                <tr>
                    <td class="px-4 py-3 border">
                        <a href="{{ route('apartments.show', ['apartment' => $apartment->id]) }}">
                            {{ $apartment->name }}
                        </a>
                    </td>
                    <td class="px-4 py-3 border">
                        {{ $apartment->num_floor }}
                    </td>
                    <td class="px-4 py-3 border">
                        {{ $apartment->rooms->count() }}
                        / {{ $apartment->num_room }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
