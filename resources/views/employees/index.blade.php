@extends('layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-4">Employees</h1>

<a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Employee</a>

<div class="mt-4">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Company</th>
                <th class="py-2 px-4">Skills</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td class="border px-4 py-2">{{ $employee->id }}</td>
                <td class="border px-4 py-2">{{ $employee->name }}</td>
                <td class="border px-4 py-2">{{ $employee->company->name }}</td>
                <td class="border px-4 py-2">
                    @foreach ($employee->skills as $skill)
                        <span class="inline-block bg-gray-200 px-2 py-1 rounded text-sm">{{ $skill->name }}</span>
                    @endforeach
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-indigo-600">Edit</a> |
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
