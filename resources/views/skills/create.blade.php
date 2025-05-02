@extends('layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-4">Add Skill</h1>

<form action="{{ route('skills.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" class="w-full border p-2 rounded" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
