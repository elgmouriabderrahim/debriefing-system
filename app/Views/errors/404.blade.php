<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>404 – Page Not Found</title>
</head>

<body class="bg-gray-100 text-gray-800">

<div class="min-h-screen flex items-center justify-center px-6">
    <div class="max-w-xl w-full text-center bg-white rounded-xl shadow-sm border p-10">

        {{-- CODE --}}
        <div class="text-6xl font-bold text-gray-300 mb-4">
            404
        </div>

        {{-- TITLE --}}
        <h1 class="text-2xl font-semibold mb-2">
            Page not found
        </h1>

        {{-- DESCRIPTION --}}
        <p class="text-gray-500 mb-8">
            The page you are trying to access does not exist or has been moved.
            Please check the URL or return to the dashboard.
        </p>

        {{-- ACTIONS --}}
        <div class="flex justify-center gap-4">
            <a href="/admin/dashboard"
               class="px-5 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium
                      hover:bg-blue-700 transition">
                Go to Dashboard
            </a>

            <a href="javascript:history.back()"
               class="px-5 py-2 rounded-lg border text-sm font-medium
                      hover:bg-gray-50 transition">
                Go Back
            </a>
        </div>

    </div>
</div>

</body>
</html>
