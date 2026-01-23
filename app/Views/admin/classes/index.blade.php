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

        <a href="/admin/class/create"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Create Class
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        @if(isset($classes) && !empty($classes))
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
                    <td class="p-4 text-gray-500">{{ $class->getCreatedAt()->format('Y-m-d H:i:s') }}</td>
                    <td class="p-4 text-gray-600">{{ $class->getStudentsCount() }}</td>
                    <td class="p-4 text-gray-600">
                        <ul>
                            @if(empty($class->getInstructors()))
                            <li>N/A</li>
                            @else
                            @foreach ($class->getInstructors() as $instructor)
                                <li>{{ $instructor->getFullName() }}</li>
                            @endforeach
                            @endif
                        </ul>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <a href="/admin/class/view?id={{ $class->getId() }}" class="text-blue-600 "><i class="fa-regular fa-eye"></i></a>
                        <a href="#" class=""><i class="fa-solid fa-file-pen"></i></a>
                        <form action="/admin/class/delete" method="POST" class="inline">
                            <input type="hidden" value="{{ $class->getId() }}" name="classId">
                            <button class="cursor-pointer"><i class="fa-solid fa-trash-can text-red-500"></i></button>
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
