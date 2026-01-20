@extends('layouts.main')

@section('title')

@section('content')
<h1 class="text-3xl font-bold mb-6">Welcome</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-gray-500">Total Sprints</h2>
        <p class="text-2xl font-bold">{{ $totalSprints }}</p>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-gray-500">Total Classes</h2>
        <p class="text-2xl font-bold">{{ $totalClasses }}</p>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-gray-500">Total Users</h2>
        <p class="text-2xl font-bold">{{ $totalUsers }}</p>
    </div>
</div>

<div class="bg-white shadow rounded p-4 mb-6">
    <h2 class="text-xl font-bold mb-4">Recent Briefs</h2>
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-left">Brief</th>
                <th class="border p-2 text-left">Class</th>
                <th class="border p-2 text-left">Instructor</th>
                <th class="border p-2 text-left">Date Assigned</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentBriefs as $brief)
            <tr class="hover:bg-gray-50">
                <td class="border p-2">{{ $brief['title'] }}</td>
                <td class="border p-2">{{ $brief['class'] }}</td>
                <td class="border p-2">{{ $brief['instructor'] }}</td>
                <td class="border p-2">{{ $brief['date_assigned'] }}</td>
                <td class="border p-2">{{ $brief['status'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="bg-white shadow rounded p-4">
    <h2 class="text-xl font-bold mb-4">Recent Activity</h2>
    <ul class="space-y-2">
        @foreach($recentActivity as $activity)
        <li class="border-b py-2">
            <span class="font-medium">{{ $activity['user'] }}</span> {{ $activity['action'] }}.
        </li>
        @endforeach
    </ul>
</div>
@endsection