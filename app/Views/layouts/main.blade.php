<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>

<body class="bg-gray-100 text-gray-800 antialiased">

    <header class="bg-white border-b px-4 py-2 flex items-center justify-between">
        <div class="px-6 ">
            <p class="text-xl font-bold tracking-tight"><i class="fa-solid fa-graduation-cap text-blue-500"></i><span class="pl-4">Debriefing System</span></h1>
        </div>

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

<div class="min-h-screen flex">
    <aside class="w-[15%] bg-white border-r flex flex-col">
        <nav class="flex-1 px-4 py-6">
            <ul class="space-y-1 text-sm">
                <li>
                    <a href="/admin/dashboard"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/classes"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Classes
                    </a>
                </li>
                <li>
                    <a href="/admin/sprints"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Sprints
                    </a>
                </li>
                <li>
                    <a href="/admin/competences"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Competences
                    </a>
                </li>
                <li>
                    <a href="/admin/users"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        Users
                    </a>
                </li>
                <li>
                    <a href="/debriefings"
                       class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                        debriefings history
                    </a>
                </li>
            </ul>
        </nav>

        <div class="px-4 py-4">
            <a href="/logout"class="block text-center px-4 py-2 rounded-lg text-sm font-medium bg-red-500 text-white hover:bg-red-600 transition">
                Logout
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col">
        <main class="flex-1 px-8 py-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
