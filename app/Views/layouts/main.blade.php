<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title', 'Admin Panel')</title>
</head>

<body class="bg-gray-100 text-gray-800 antialiased">

<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r flex flex-col">
        <div class="px-6 py-5 border-b">
            <h1 class="text-xl font-bold tracking-tight">Admin Panel</h1>
            <p class="text-xs text-gray-500 mt-1">Platform Management</p>
        </div>

        <nav class="flex-1 px-4 py-6">
            <ul class="space-y-1 text-sm">

                <li>
                    <a href="/dashboard"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="/classes"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Classes
                    </a>
                </li>

                <li>
                    <a href="/sprints"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Sprints
                    </a>
                </li>

                <li>
                    <a href="/competences"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Competences
                    </a>
                </li>

                <li>
                    <a href="/users"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Users
                    </a>
                </li>
            </ul>
        </nav>

        <div class="px-4 py-4 border-t">
            <a href="/logout"
               class="block text-center px-4 py-2 rounded-lg text-sm font-medium
                      bg-red-500 text-white hover:bg-red-600 transition">
                Logout
            </a>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="flex-1 flex flex-col">

        {{-- TOP BAR --}}
        <header class="bg-white border-b px-8 py-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                @yield('page-title', 'Dashboard')
            </h2>

            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-sm font-medium">Admin</p>
                    <p class="text-xs text-gray-500">System Access</p>
                </div>
                <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center font-bold">
                    A
                </div>
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <main class="flex-1 px-8 py-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
