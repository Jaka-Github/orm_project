@extends('layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-4">Add Employee</h1>

<form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block">Company:</label>
        <select name="company_id" class="w-full border p-2 rounded" required>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-2">Skills:</label>
        <div class="flex flex-wrap gap-2">
            @foreach ($skills as $skill)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}">
                    <span>{{ $skill->name }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
