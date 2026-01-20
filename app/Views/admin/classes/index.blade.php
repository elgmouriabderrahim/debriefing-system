@extends('layouts.main')

@section('title', 'Classes')
@section('page-title', 'Classes')

@section('content')
<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">Classes</h2>
            <p class="text-gray-500 text-sm">Manage all learning groups</p>
        </div>

        <a href="/classes/create"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Create Class
        </a>
    </div>

    {{-- TABLE --}}
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Class Name</th>
                    <th class="p-4 text-left">Students</th>
                    <th class="p-4 text-left">Instructor</th>
                    <th class="p-4 text-left">Created</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($classes as $class)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $class->name }}</td>
                    <td class="p-4 text-gray-600">{{ $class->students_count }}</td>
                    <td class="p-4 text-gray-600">{{ $class->instructor }}</td>
                    <td class="p-4 text-gray-500">{{ $class->created_at }}</td>
                    <td class="p-4 text-right space-x-2">
                        <a href="/classes/{{ $class->id }}" class="text-blue-600 hover:underline">View</a>
                        <a href="/classes/{{ $class->id }}/edit" class="text-gray-600 hover:underline">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500">
                        No classes found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
