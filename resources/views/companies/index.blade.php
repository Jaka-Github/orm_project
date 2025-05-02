@extends('layouts.app')


@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Companies</h1>

    <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Company</a>

    <div class="mt-4">
    <x-table :data="$companies">
        @foreach ($companies as $index => $company)
            <tr class="border-b border-gray-200 hover:bg-gray-100 {{ $index % 2 == 0 ? 'bg-gray-50' : '' }}">
                <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $company->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $company->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">
                    <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a> |
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800" onclick="return confirm('Delete this company?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-table>

    </div>
</div>
@endsection
