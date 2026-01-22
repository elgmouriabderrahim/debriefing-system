@extends('layouts.main')

@section('title', 'Debriefing History')
@section('page-title', 'Debriefing History')

@section('content')
<div class="space-y-6">

    <div>
        <h2 class="text-2xl font-semibold">Debriefing Records</h2>
        <p class="text-gray-500 text-sm">All evaluation sessions history</p>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        @if(!empty($debriefings))
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Student</th>
                    <th class="p-4 text-left">Brief</th>
                    <th class="p-4 text-left">Competence</th>
                    <th class="p-4 text-left">Level</th>
                    <th class="p-4 text-left">Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach($debriefings as $record)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $record->student }}</td>
                    <td class="p-4 text-gray-600">{{ $record->brief }}</td>
                    <td class="p-4 text-gray-600">{{ $record->competence }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                            {{ $record->level }}
                        </span>
                    </td>
                    <td class="p-4 text-gray-500">{{ $record->date }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
        @else
         <div class="p-6 text-center text-gray-500">
            No Debriefings found.
        </div>
        @endif
    </div>

</div>
@endsection
