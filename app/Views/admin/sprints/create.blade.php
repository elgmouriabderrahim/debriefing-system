@extends('layouts.main')

@section('title', 'Create sprint')
@section('page-title', 'Create sprint')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-lg">

        <div class="px-6 py-5 border-b bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-800">New Sprint</h2>
            <p class="text-sm text-gray-500 mt-1">
                Create a sprint template to be assigned later to classes
            </p>
        </div>

        <form method="POST" action="/admin/sprint/create" class="p-6 space-y-6">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Sprint name
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ $inputData['name'] ?? '' }}"
                    class="w-full focus:outline-none rounded-lg px-2 py-1 {{ isset($errors['name']) ? 'border border-red-500' : '' }}"
                    placeholder="Sprint 1 – Foundations"
                >
                @if(isset($errors['name']))
                    <p class="text-sm text-red-600 mt-1">
                        {{ $errors['name'] }}
                    </p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Duration (days)
                </label>
                <input
                    type="number"
                    name="duration_days"
                    min="1"
                    value="{{ $inputData['duration_days'] ?? '' }}"
                    class="w-full focus:outline-none rounded-lg px-2 py-1 {{ isset($errors['duration_days']) ? 'border border-red-500' : '' }}"
                    placeholder="14"
                >
                @if(isset($errors['duration_days']))
                    <p class="text-sm text-red-600 mt-1">
                        {{ $errors['duration_days'] }}
                    </p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Sprint order
                </label>
                <input
                    type="number"
                    name="sprint_order"
                    min="1"
                    value="{{ $inputData['sprint_order'] ?? '' }}"
                    class="w-full focus:outline-none rounded-lg px-2 py-1 {{ isset($errors['sprint_order']) ? 'border border-red-500' : '' }}"
                    placeholder="1"
                >
                <p class="text-xs text-gray-400 mt-1">
                    Used later when assigning sprints to a class
                </p>
                @if(isset($errors['sprint_order']))
                    <p class="text-sm text-red-600 mt-1">
                        {{ $errors['sprint_order'] }}
                    </p>
                @endif
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="/admin/sprints"
                   class="px-4 py-1 text-sm font-medium text-gray-800 hover:text-gray-900 rounded-lg bg-neutral-100 hover:bg-neutral-200 transition">
                    Back to sprints
                </a>

                <button
                    type="submit"
                    class="px-4 py-1 rounded-lg bg-green-600 text-white text-sm font-medium hover:bg-green-700 transition">
                    <i class="fa-solid fa-floppy-disk"></i> Save
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
