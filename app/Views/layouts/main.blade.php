<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>  
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <aside class="w-64 bg-white shadow-md">
        <div class="p-6 font-bold text-xl border-b">Admin Panel</div>
        <nav class="p-6">
            <ul class="space-y-2">
                <li><a href="/dashboard" class="block p-2 hover:bg-gray-200 rounded">Dashboard</a></li>
                <li><a href="/sprints" class="block p-2 hover:bg-gray-200 rounded">Sprints</a></li>
                <li><a href="/classes" class="block p-2 hover:bg-gray-200 rounded">Classes</a></li>
                <li><a href="/competences" class="block p-2 hover:bg-gray-200 rounded">Competences</a></li>
                <li><a href="/users" class="block p-2 hover:bg-gray-200 rounded">Users</a></li>
                <li><a href="/logout" class="block p-2 hover:bg-red-500 text-white hover:bg-red-600 rounded">Logout</a></li>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
