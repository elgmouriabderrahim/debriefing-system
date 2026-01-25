@extends('layouts.main')

@section('title', 'Class details')
@section('page-title', 'Class details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex justify-end">
        <a href="/admin/classes" 
           class="px-4 py-1 text-sm font-medium text-gray-800 hover:text-gray-900 rounded-lg bg-neutral-100 hover:bg-neutral-200 transition">
           go back <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border space-y-2">
        <h1 class="text-3xl font-bold text-gray-900">{{ $class->getName() }}</h1>
        <p class="text-gray-500">Promotion Year: <span class="font-semibold">{{ $class->getPromotionYear() }}</span></p>
        <p class="text-gray-500">Created At: <span class="font-semibold">{{ $class->getCreatedAt()->format('Y-m-d H:i') }}</span></p>
        <p class="text-gray-500">Students: {{ count($classLearners) }}</p>
        @if(count($classInstructors) > 0)
            <p class="text-gray-500">Instructors: {{ count($classInstructors) }}</p>
        @endif
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border space-y-4">
        <h2 class="text-2xl font-semibold text-gray-900 border-b pb-2">Class Learners ({{ count($classLearners) }})</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse($classLearners as $learner)
                <div class="bg-gray-50 rounded-xl p-1 flex items-center gap-2 shadow-sm hover:shadow-md transition">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        {{ strtoupper(substr($learner->getFullName(),0,1)) }}
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold text-gray-900">{{ $learner->getFullName() }}</p>
                        <p class="text-sm text-gray-500">{{ $learner->getEmail() }}</p>
                        <p class="text-xs text-gray-400">{{ $learner->getCreatedAt()->format('Y-m-d') }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic col-span-full">No learners in this class.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border space-y-4">
        <h2 class="text-2xl font-semibold text-gray-900 border-b pb-2">Instructors</h2>
        <div class="flex flex-wrap gap-4">
            @forelse($classInstructors as $instructor)
                <div class="flex items-center gap-2 bg-green-50 text-green-700 rounded-xl p-2 shadow-sm hover:shadow-md transition">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-200 rounded-full flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr($instructor->getFullName(),0,1)) }}
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold text-gray-900">{{ $instructor->getFullName() }}</p>
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
