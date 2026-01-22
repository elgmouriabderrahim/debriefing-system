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

        <a href="/admin/sprints/create"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Create Sprint
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        @if(!empty($sprints))
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Sprint</th>
                    <th class="p-4 text-left">Duration</th>
                    <th class="p-4 text-left">Order</th>
                    <th class="p-4 text-left">Classroom</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sprints as $sprint)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $sprint->getTitle() }}</td>
                    <td class="p-4 text-gray-600">{{ $sprint->getDuration() }}</td>
                    <td class="p-4 text-gray-500">{{ $sprint->getOrder()}}</td>
                    <td class="p-4 text-gray-500">{{ $sprint->getClassroom()->getName() }}</td>
                    <td class="p-4 space-x-2">
                        <a href="/admin/sprints/{{ $sprint->getId() }}" class="text-blue-600 hover:underline">
                            View
                        </a>

                        <a href="/admin/sprints/edit/{{ $sprint->getId() }}" class="text-gray-600 hover:underline">
                            Edit
                        </a>

                        <form action="/admin/sprints/delete/{{ $sprint->getId() }}" method="POST" class="inline">
                            <button type="submit" class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
        @else
        <div class="p-6 text-gray-600 text-center">
            No sprints found.
        </div>
        @endif
    </div>

</div>
@endsection
