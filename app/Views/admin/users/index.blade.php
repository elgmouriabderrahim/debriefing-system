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
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add User
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-left">Joined</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $user->name }}</td>
                    <td class="p-4 text-gray-600">{{ $user->email }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-xs rounded-full
                            {{ $user->role === 'Admin' ? 'bg-red-100 text-red-700' :
                               ($user->role === 'Instructor' ? 'bg-purple-100 text-purple-700' :
                               'bg-green-100 text-green-700') }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="p-4 text-gray-500">{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
