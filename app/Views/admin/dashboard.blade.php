@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content')
<div class="space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
            <p class="text-gray-500 mt-1">Global overview of the platform</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">

        @php
            $stats = [
                ['label' => 'Total Users', 'value' => $totalUsers, 'color' => 'text-blue-600'],
                ['label' => 'Students', 'value' => $totalLearners, 'color' => 'text-green-600'],
                ['label' => 'Instructors', 'value' => $totalInstructors, 'color' => 'text-purple-600'],
                ['label' => 'Classes', 'value' => $totalClasses, 'color' => 'text-indigo-600'],
                ['label' => 'Sprints', 'value' => $totalSprints, 'color' => 'text-orange-600'],
                ['label' => 'Briefs', 'value' => $totalBriefs, 'color' => 'text-red-600'],
            ];
        @endphp

        @foreach($stats as $stat)
            <div class="bg-white rounded-xl shadow-sm border p-5">
                <p class="text-sm text-gray-500">{{ $stat['label'] }}</p>
                <p class="text-3xl font-bold mt-2 {{ $stat['color'] }}">
                    {{ $stat['value'] }}
                </p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <div class="xl:col-span-2 bg-white rounded-xl shadow-sm border">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold text-gray-800">Recent Briefs</h2>
            </div>
            @if(!empty($recentActivity))
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="p-4 text-left">Title</th>
                            <th class="p-4 text-left">Class</th>
                            <th class="p-4 text-left">Instructor</th>
                            <th class="p-4 text-left">Sprint</th>
                            <th class="p-4 text-left">Start date</th>
                            <th class="p-4 text-left">End date</th>
                            <th class="p-4 text-left">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentBriefs as $brief)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-4 font-medium text-gray-800">
                                    {{ $brief->getTitle() }}
                                </td>
                                <td class="p-4 text-gray-600">
                                    {{ $brief->getClass() }}
                                </td>
                                <td class="p-4 text-gray-600">
                                    {{ $brief->getInstructor() }}
                                </td>
                                <td class="p-4 text-gray-500">
                                    {{ $brief->getSprint() }}
                                </td>
                                <td class="p-4 text-gray-500">
                                    {{ $brief->getStartDate() }}
                                </td>
                                <td class="p-4 text-gray-500">
                                    {{ $brief->getEndDate() }}
                                </td>
                                <td class="p-4 text-gray-500">
                                    {{ $brief->getType() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="p-6 text-center text-gray-500">
                No briefs found.
            </div>
            @endif
        </div>

        <div class="bg-white rounded-xl shadow-sm border">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold text-gray-800">Recent Activity</h2>
            </div>

            <div class="p-6 space-y-4">
                @forelse($recentActivity as $activity)
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 mt-2 rounded-full bg-blue-500"></div>
                        <div>
                            <p class="text-sm text-gray-800">
                                <span class="font-semibold">{{ $activity['user'] }}</span>
                                {{ $activity['action'] }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ $activity['date'] }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 text-center">
                        No recent activity
                    </p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Admin Actions</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="#" class="block p-4 border rounded-lg hover:bg-gray-50">
                <p class="font-medium text-gray-800">Create Class</p>
                <p class="text-sm text-gray-500">Add a new class</p>
            </a>

            <a href="/admin/user/add" class="block p-4 border rounded-lg hover:bg-gray-50">
                <p class="font-medium text-gray-800">Add User</p>
                <p class="text-sm text-gray-500">Student or instructor</p>
            </a>

            <a href="#" class="block p-4 border rounded-lg hover:bg-gray-50">
                <p class="font-medium text-gray-800">Create Sprint</p>
                <p class="text-sm text-gray-500">Plan new sprint</p>
            </a>

            <a href="#" class="block p-4 border rounded-lg hover:bg-gray-50 transition">
                <p class="font-medium text-gray-800">Add Competence</p>
                <p class="text-sm text-gray-500 mt-1">
                    New skill definition
                </p>
            </a>

        </div>
    </div>

</div>
@endsection
