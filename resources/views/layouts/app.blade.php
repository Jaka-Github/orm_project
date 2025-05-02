<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORM Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow mb-4">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between">
            <div class="font-bold text-xl">ORM Project</div>
            <div class="space-x-4">
                <a href="{{ route('companies.index') }}" class="text-blue-600 hover:underline">Companies</a>
                <a href="{{ route('employees.index') }}" class="text-blue-600 hover:underline">Employees</a>
                <a href="{{ route('skills.index') }}" class="text-blue-600 hover:underline">Skills</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4">
        {{-- Flash Messages --}}
            @if (session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 3000)" 
                    x-show="show" 
                    x-transition
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"
                >
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 3000)" 
                    x-show="show" 
                    x-transition
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"
                >
                    {{ session('error') }}
                </div>
            @endif
        @yield('content')
    </main>
</body>
</html>
