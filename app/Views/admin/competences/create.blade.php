@extends('layouts.main')

@section('title', 'Create Competence')
@section('page-title', 'Create Competence')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-lg">

        <div class="px-6 py-5 border-b bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-800">New Competence</h2>
            <p class="text-sm text-gray-500 mt-1">
                Define a new competence to use in briefs and debriefings
            </p>
        </div>

        <form method="POST" action="/admin/competences/create" class="p-6 space-y-6">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Code
                </label>
                <input
                    type="text"
                    name="code"
                    value="{{ $inputData['code'] ?? '' }}"
                    class="w-full focus:outline-none rounded-lg px-2 py-1 {{ isset($errors['code']) ? 'border border-red-500' : 'border border-gray-300' }}"
                    placeholder="C01"
                >
                @if(isset($errors['code']))
                    <p class="text-sm text-red-600 mt-1">
                        {{ $errors['code'] }}
                    </p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Label
                </label>
                <input
                    type="text"
                    name="label"
                    value="{{ $inputData['label'] ?? '' }}"
                    class="w-full focus:outline-none rounded-lg px-2 py-1 {{ isset($errors['label']) ? 'border border-red-500' : 'border border-gray-300' }}"
                    placeholder="Teamwork"
                >
                @if(isset($errors['label']))
                    <p class="text-sm text-red-600 mt-1">
                        {{ $errors['label'] }}
                    </p>
                @endif
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="/admin/competences"
                   class="px-4 py-1 text-sm font-medium text-gray-800 hover:text-gray-900 rounded-lg bg-neutral-100 hover:bg-neutral-200 transition">
                    Back to competences
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
