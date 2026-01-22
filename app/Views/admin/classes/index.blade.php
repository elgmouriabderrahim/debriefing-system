@extends('layouts.main')

@section('title', 'Classes')
@section('page-title', 'Classes')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">Classes</h2>
            <p class="text-gray-500 text-sm">Manage all learning groups</p>
        </div>

        <a href="/admin/classes/create"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Create Class
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        @if(!empty($classes))
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Class Name</th>
                    <th class="p-4 text-left">Promotion Year</th>
                    <th class="p-4 text-left">Created At</th>
                    <th class="p-4 text-left">Students</th>
                    <th class="p-4 text-left">Instructors</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($classes as $class)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $class->getName() }}</td>
                    <td class="p-4 font-medium">{{ $class->getPromotionYear() }}</td>
                    <td class="p-4 text-gray-500">{{ $class->getCreatedAt() }}</td>
                    <td class="p-4 text-gray-600">{{ $class->getStudentsCount() }}</td>
                    <td class="p-4 text-gray-600">{{ $class->getInstructors() }}</td>
                    <td class="p-4 text-gray-600">
                        <ul>
                            @foreach ($class->getInstructors() as $instructor)
                                <li>{{ $instructor->getFullName() }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <a href="/admin/classes/{{ $class->getId() }}" class="text-blue-600 hover:underline">View</a>
                        <a href="/admin/classes/edit/{{ $class->getId() }}" class="text-gray-600 hover:underline">Edit</a>
                        <form action="/admin/classes/delete/{{ $class->getId() }}" method="POST" class="inline">
                            <button class="text-gray-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div colspan="5" class="p-6 text-center text-gray-500">
            No classes found
        </div>
        @endif
    </div>

</div>
@endsection
