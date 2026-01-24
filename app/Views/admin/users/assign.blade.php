@extends('layouts.main')

@section('title', 'Assign Classroom')
@section('page-title', 'Assign Classroom')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-lg">

        <div class="px-8 py-6 border-b bg-gray-50">
            <h2 class="text-3xl font-semibold text-gray-800">Assign Classroom</h2>
            <p class="text-sm text-gray-500 mt-2">
                Assign a classroom to <span class="font-medium">{{ $instructor->getFullName() }}</span>.
                Select a classroom from the list below and click "Assign".
            </p>
        </div>

        @if(!empty($classes) && is_array($classes))
            <form action="/admin/instructor/assign" method="POST" class="px-8 py-6 space-y-6">
                <input type="hidden" name="instructorId" value="{{ $instructor->getId() }}">

                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Classroom
                    </label>
                    <select name="classroomId"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800 text-base">
                        @foreach($classes as $classroom)
                            <option value="{{ $classroom->getId() }}">
                                {{ $classroom->getName() }} ({{ $classroom->getPromotionYear() }})
                            </option>
                        @endforeach
                    </select>
                    @if(isset($error))
                        <div>
                            {{ $error }}
                        </div>
                    @endif
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="/admin/users"
                       class="px-2 py-1 text-sm font-medium text-gray-800 hover:text-gray-900 rounded-lg bg-neutral-100 hover:bg-neutral-200 transition">
                        Back to users
                    </a>

                    <button
                        type="submit"
                        class="px-2 py-1 rounded-lg bg-green-600 text-white text-sm font-medium hover:bg-green-700 transition">
                        <i class="fa-solid fa-anchor-circle-exclamation"></i> Assign
                    </button>
                </div>
            </form>
        @else
            <p class="px-8 py-6 text-gray-400 italic">
                There are no classrooms available to assign.
            </p>
        @endif

    </div>

</div>
@endsection
