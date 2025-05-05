@extends('layouts.app')


@section('content')

<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Employees</h1>

    <a href="{{ route('employees.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow-md transition duration-300 flex items-center w-max">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add Employee
    </a>

    <div class="mt-6 overflow-hidden shadow-lg rounded-lg border border-gray-200">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-400 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-300 text-left text-xs font-medium text-white uppercase tracking-wider">Company</th>
                    <th class="px-6 py-3 bg-gradient-to-r from-blue-300 to-blue-200 text-left text-xs font-medium text-white uppercase tracking-wider">Skills</th>
                    <th class="px-6 py-3 bg-gradient-to-r from-blue-200 to-blue-100 text-left text-xs font-medium text-blue-800 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($employees as $index => $employee)
                <tr class="hover:bg-blue-50 transition duration-150 {{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $employee->id }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $employee->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $employee->company->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        @foreach ($employee->skills as $skill)
                            <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium mr-1 mb-1">{{ $skill->name }}</span>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2 justify-start">
                            {{-- Edit Button --}}
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-info flex items-center gap-1 mr-3 bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-md transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5l3 3L12 15l-4 1 1-4L18.5 2.5z" />
                                </svg>
                                Edit
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-error flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 001-1V5a1 1 0 00-1-1h-3.5a1 1 0 01-.95-.69l-.3-.9a1 1 0 00-.95-.69h-2.6a1 1 0 00-.95.69l-.3.9A1 1 0 017.5 4H4a1 1 0 00-1 1v1a1 1 0 001 1h16z" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection