@extends('layouts.main')

@section('title', 'Sprints')
@section('page-title', 'Sprints')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">Sprints</h2>
            <p class="text-gray-500 text-sm">Manage sprint cycles</p>
        </div>

        <a href="/sprints/create"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Create Sprint
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Sprint</th>
                    <th class="p-4 text-left">Class</th>
                    <th class="p-4 text-left">Start</th>
                    <th class="p-4 text-left">End</th>
                    <th class="p-4 text-left">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sprints as $sprint)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $sprint->title }}</td>
                    <td class="p-4 text-gray-600">{{ $sprint->class }}</td>
                    <td class="p-4 text-gray-500">{{ $sprint->start_date }}</td>
                    <td class="p-4 text-gray-500">{{ $sprint->end_date }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-xs rounded-full
                            {{ $sprint->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($sprint->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
