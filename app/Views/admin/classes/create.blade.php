@extends('layouts.main')

@section('title', 'Create Classroom')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-900">Create Classroom</h1>
        <p class="text-gray-500 mt-1">Add a new classroom to the system</p>
    </div>

    @if(isset($success) && $success)
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-4 mb-4">
            {{ $success }}
        </div>
    @endif

    <form action="/admin/class/create" method="POST"
          class="bg-white p-6 rounded-xl shadow-sm border space-y-6">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Classroom Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ $inputData['name'] ?? '' }}"
                class="w-full border-0 border-b
                       focus:ring-0 focus:outline-none
                       {{ isset($errors['name']) ? 'border-red-500' : 'border-gray-300' }}"
                placeholder="debuggers"
            >

            @if(isset($errors['name']))
                <p class="text-sm text-red-600 mt-1">
                    {{ $errors['name'] }}
                </p>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Promotion Year
            </label>

            <input
                type="number"
                name="promotionYear"
                value="{{ $inputData['promotionYear'] ?? '' }}"
                class="w-full border-0 border-b
                       focus:ring-0 focus:outline-none
                       {{ isset($errors['promotionYear']) ? 'border-red-500' : 'border-gray-300' }}"
                placeholder="2026"
            >

            @if(isset($errors['promotionYear']))
                <p class="text-sm text-red-600 mt-1">
                    {{ $errors['promotionYear'] }}
                </p>
            @endif
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a
                href="/admin/classes"
                class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-100"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700"
            >
                Create Classroom
            </button>
        </div>

    </form>
</div>
@endsection
