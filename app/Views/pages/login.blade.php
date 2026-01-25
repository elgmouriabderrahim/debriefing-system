@extends('layouts.main')

@section('title', 'Login')
@section('page-title', 'Login')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center">

    <div class="w-full max-w-md bg-white border border-gray-200 rounded-2xl shadow-lg p-8 animate-fade-in">

        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
            <p class="text-gray-500 text-sm mt-1">
                Log in to continue to Debriefing
            </p>
        </div>


        <form action="/login" method="POST" class="space-y-4">

            <div>
                <div class="text-red-600 w-full text-center">
                    {{ $errors['info'] ?? ''}}
                </div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ $old['email'] ?? '' }}"
                    class="w-full px-4 py-2 border rounded-lg {{ isset($errors['info']) || isset($errors['email']) ? 'border-red-600': ''}}
                           focus:outline-none focus:ring-1 focus:ring-indigo-500 transition"
                    placeholder="you@example.com"
                >
                <div class="text-red-600">
                    {{ $errors['email'] ?? ''}}
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    class="w-full px-4 py-2 border rounded-lg {{ isset($errors['info']) || isset($errors['password']) ? 'border-red-600': ''}}
                           focus:outline-none focus:ring-1 focus:ring-indigo-500 transition"
                    placeholder="••••••••"
                >
                <div class="text-red-600">
                    {{ $errors['password'] ?? ''}}
                </div>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Remember me
                </label>

                <span class="text-gray-400 cursor-pointer">
                    Forgot password?
                </span>
            </div>

            <button
                type="submit"
                class="w-full mt-4 bg-blue-600 text-white py-2 rounded-lg font-semibold
                       transition-all duration-200
                       hover:bg-blue-700 hover:shadow-lg">
                Log In
            </button>

        </form>

        <div class="mt-6 text-center text-xs text-gray-400">
            &copy; <?= date('Y') ?> Debriefing Platform
        </div>

    </div>

</div>
@endsection
