@extends('layouts.main')

@section('title', 'Competences')
@section('page-title', 'Competences')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">Competences</h2>
            <p class="text-gray-500 text-sm">Skill definitions & mastery levels</p>
        </div>

        <a href="/admin/competences/create"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add Competence
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-600">
                <tr>
                    <th class="p-4 text-left">Code</th>
                    <th class="p-4 text-left">Label</th>
                    <th class="p-4 text-left">Assigned Sprints</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($competences as $competence)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-mono text-gray-800">{{ $competence->code }}</td>
                    <td class="p-4 font-medium">{{ $competence->label }}</td>
                    <td class="p-4 text-gray-600">{{ $competence->sprints_count }}</td>
                    <td class="p-4 text-right">
                        <a href="/admin/competences/{{ $competence->id }}/edit" class="text-gray-600 hover:underline">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
