@props(['data'])

<div class="overflow-hidden shadow-lg rounded-lg border border-gray-200">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-left text-xs font-medium text-white uppercase tracking-wider rounded-tl-lg">No</th>
                <th class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-400 text-left text-xs font-medium text-white uppercase tracking-wider">Company Name</th>
                <th class="px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-300 text-left text-xs font-medium text-white uppercase tracking-wider">Date Created</th>
                <th class="px-6 py-3 bg-gradient-to-r from-blue-300 to-blue-200 text-left text-xs font-medium text-blue-800 uppercase tracking-wider rounded-tr-lg">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            {{ $slot }}
        </tbody>
    </table>
</div>