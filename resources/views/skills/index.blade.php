@extends('layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-4">Skills</h1>

<a href="{{ route('skills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Skill</a>

<div class="mt-4">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $skill)
            <tr>
                <td class="border px-4 py-2">{{ $skill->id }}</td>
                <td class="border px-4 py-2">{{ $skill->name }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('skills.edit', $skill->id) }}" class="text-indigo-600">Edit</a> |
                    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="inline">
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
