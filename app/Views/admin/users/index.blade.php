@extends('layouts.main')

@section('title', 'Users')
@section('page-title', 'Users')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">Users</h2>
            <p class="text-gray-500 text-sm">Students, instructors and admins</p>
        </div>

        <a href="/admin/user/add"
           class="px-4 py-2">
            <i class="fa-solid fa-user-plus text-green-600"></i> Add User
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Full Name</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-left">Created At</th>
                    <th class="p-4 text-left">Classroom</th>
                    <th class="p-4 text-left">Actions</th>

                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $user->getFullName() }}</td>
                    <td class="p-4 text-gray-600">{{ $user->getEmail() }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-xs rounded-full
                            {{ $user->getRole() === 'Admin' ? 'bg-red-100 text-red-700' :
                               ($user->getRole() === 'Instructor' ? 'bg-purple-100 text-purple-700' :
                               'bg-green-100 text-green-700') }}">
                            {{ $user->getRole()->value }}
                        </span>
                    </td>
                    <td class="p-4 text-gray-500">{{ $user->getCreatedAt()->format('Y-m-d H:i:s') }}</td>
                    @if($user->getRole() === 'Learner')
                        <td class="p-4 text-gray-500">{{ $user->getClassroom()->getName() }}</td>
                    @else
                        <td class="p-4 text-gray-500 italic">N/A</td>
                    @endif
                    <td class="p-4 flex space-x-2">
                        @if($user->getRole()->value === "Instructor")
                        <a href="/admin/user/delete?user_id={{ $user->getId() }}" class="px-2 py-1 bg-neutral-100 rounded text-red-600 hover:bg-neutral-200 text-xs"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="/admin/instructor/assign?instructor_id={{ $user->getId() }}" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-700 text-xs">Assign Class</a>
                        @elseif($user->getRole()->value === "Learner")
                            <a href="/admin/user/delete?user_id={{ $user->getId() }}" class="px-2 py-1 bg-neutral-100 rounded text-red-600 hover:bg-neutral-200 text-xs"><i class="fa-solid fa-trash-can"></i></a>
                        @else
                            <span class="text-gray-400 text-xs italic">No actions available</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
