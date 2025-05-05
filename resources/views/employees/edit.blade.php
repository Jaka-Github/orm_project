@extends('layouts.app')


@section('content')
<div class="max-w-3xl mx-auto p-4">
    <div class="flex items-center mb-6">
        <a href="{{ route('employees.index') }}" class="mr-4 text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Edit Employee</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name:</label>
                <input type="text" name="name" value="{{ $employee->name }}" 
                    class="w-full border border-gray-300 p-2.5 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Company:</label>
                <select name="company_id" 
                    class="w-full border border-gray-300 p-2.5 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" @selected($employee->company_id == $company->id)>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Skills:</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 bg-gray-50 p-4 rounded-md border border-gray-200">
                    @foreach ($skills as $skill)
                        <label class="flex items-center space-x-2 hover:bg-blue-50 p-2 rounded-md transition cursor-pointer">
                            <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                                @if ($employee->skills->contains($skill->id)) checked @endif
                                class="rounded text-blue-600 focus:ring-blue-500 h-4 w-4">
                            <span class="text-gray-700">{{ $skill->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-ghost flex items-center gap-1 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Cancel
                </a>
                <button type="submit" class="btn btn-sm btn-info flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection