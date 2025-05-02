@extends('layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Skill</h1>

<form action="{{ route('skills.update', $skill->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="{{ $skill->name }}" class="w-full border p-2 rounded" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
