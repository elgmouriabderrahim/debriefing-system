@extends('layouts.main')

@section('title', 'Class details')
@section('page-title', 'Class details')

@section('content')
<div class="max-w-7xl mx-auto space-y-10 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-start">
        <a href="/admin/classes" class="inline-flex items-center gap-2 text-sm font-medium text-red-500 hover:text-red-600 bg-neutral-200 hover:bg-neutral-300  rounded-md px-4 py-2">
           got back <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-6 flex flex-col md:flex-row md:justify-between md:items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $class->getName() }}</h1>
                <p class="mt-1 text-gray-500">Promotion Year: <span class="font-semibold">{{ $class->getPromotionYear() }}</span></p>
                <p class="mt-1 text-gray-500">Created At: <span class="font-semibold">{{ $class->getCreatedAt()->format('Y-m-d H:i') }}</span></p>
            </div>
            <div class="mt-4 md:mt-0 flex gap-4">
                <div class="bg-blue-50 text-blue-700 rounded-xl px-4 py-2 text-center shadow-sm">
                    <p class="text-sm font-medium">Students</p>
                    <p class="text-lg font-bold">{{ count($classLearners) }}</p>
                </div>
                <div class="bg-green-50 text-green-700 rounded-xl px-4 py-2 text-center shadow-sm">
                    <p class="text-sm font-medium">Instructors</p>
                    <p class="text-lg font-bold">{{ count($classInstractors) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-800">Class Learners ({{ count($classLearners) }})</h2>
        </div>
        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse($classLearners as $learner)
                <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        {{ strtoupper(substr($learner->getFullName(),0,1)) }}
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold text-gray-800">{{ $learner->getFullName() }}</p>
                        <p class="text-sm text-gray-500">{{ $learner->getEmail() }}</p>
                        <p class="text-xs text-gray-400">{{ $learner->getCreatedAt()->format('Y-m-d') }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic col-span-full">No learners in this class.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-800">Instructors</h2>
        </div>
        <div class="p-6 flex flex-wrap gap-4">
            @forelse($classInstractors as $instructor)
                <div class="flex items-center gap-3 bg-green-50 text-green-700 rounded-xl px-4 py-2 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-200 rounded-full flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr($instructor->getFullName(),0,1)) }}
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold text-gray-800">{{ $instructor->getFullName() }}</p>
                        <p class="text-xs text-gray-500">{{ $instructor->getEmail() }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic">No instructors assigned to this class.</p>
            @endforelse
        </div>
    </div>    

</div>
@endsection
