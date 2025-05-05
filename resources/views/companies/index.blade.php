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
                <td>
                    <div class="flex gap-2 justify-start">
                        {{-- Edit Button --}}
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-info flex items-center gap-1 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5l3 3L12 15l-4 1 1-4L18.5 2.5z" />
                            </svg>
                            Edit
                        </a>

                        {{-- Delete Button --}}
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-error flex items-center gap-1">
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
    </x-table>

    </div>
</div>
@endsection
