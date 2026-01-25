@extends('layouts.main')

@section('title', 'Sprints')
@section('page-title', 'Sprints')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">Sprints</h2>
            <p class="text-gray-500 text-sm">
                Sprint templates reusable across classes
            </p>
        </div>

        <a href="/admin/sprint/create"
           class="px-4 py-2  transition">
            <i class="fa-brands fa-sketch text-green-600"></i> Create Sprint
        </a>
    </div>

    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        @if(!empty($sprints))
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b text-gray-600">
                    <tr>
                        <th class="p-4 text-left">Sprint</th>
                        <th class="p-4 text-left">Duration</th>
                        <th class="p-4 text-left">Order</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sprints as $sprint)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-medium text-gray-800">
                                {{ $sprint->getName() }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $sprint->getDurationDays() }} days
                            </td>

                            <td class="p-4 text-gray-500">
                                {{ $sprint->getSprintOrder() }}
                            </td>

                            <td class="p-4 text-right space-x-3">

                                <a href="/admin/sprint/assign?sprint_id={{ $sprint->getId() }}"
                                   class="text-green-600 cursor-pointer hover:text-green-800">
                                    <i class="fa-solid fa-down-left-and-up-right-to-center"></i> Assign
                                </a>

                                <a href="/admin/sprint?sprint_id={{ $sprint->getId() }}"
                                   class="text-blue-600 ">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="/admin/sprint/edit?sprint_id={{ $sprint->getId() }}"
                                   class="text-gray-600 ">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>

                                <form action="/admin/sprint/delete" method="POST" class="inline">
                                    <input type="hidden" name="sprint_id" value="{{ $sprint->getId() }}">
                                    <button type="submit" class="text-red-600 cursor-pointer hover:text-red-800">
                                        <i class="fa-solid fa-trash-can"></i>   
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-8 text-gray-500 text-center">
                No sprints created yet.
            </div>
        @endif
    </div>

</div>
@endsection
