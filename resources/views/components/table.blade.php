@props(['data'])

<table class="min-w-full bg-white table-auto rounded-lg shadow-md">
    <thead>
        <tr class="bg-blue-600 text-white">
            <th class="px-6 py-3 text-left font-semibold">No</th>
            <th class="px-6 py-3 text-left font-semibold">Company Name</th>
            <th class="px-6 py-3 text-left font-semibold">Date Created</th>
            <th class="px-6 py-3 text-left font-semibold">Actions</th>
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
