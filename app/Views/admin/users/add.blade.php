@extends('layouts.main')
@section('title', 'Debriefing - Create New User')
@section('page-title', 'Create New User')

@section('content')
<div class="w-[90%] lg:max-w-lg p-6 mx-auto">

    <h1 class="text-3xl font-bold mb-2 text-center">Create Account</h1>
    <p class="text-gray-400 mb-6 text-center">
        Add a new user to the platform as an Instructor or Learner.
    </p>

    <?php if(isset($success) && $success): ?>
        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-lg mb-4">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <form action="/admin/user/add" method="post" class="space-y-4">
        <div class="relative">
            <label for="firstName" class="block text-sm font-medium text-gray-800">First Name</label>
            <div class="relative">
                <i class="fa-solid fa-address-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="firstName" id="firstName" placeholder="First Name"
                    value="<?= htmlspecialchars($inputData['firstName'] ?? '') ?>"
                    class="w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-gray-600 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <span class="text-red-500 block mt-1 text-sm">
                <?= htmlspecialchars($errors['firstName'] ?? '') ?>
            </span>
        </div>

        <div class="relative">
            <label for="lastName" class="block text-sm font-medium text-gray-800">Last Name</label>
            <div class="relative">
                <i class="fa-solid fa-address-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="lastName" id="lastName" placeholder="Last Name"
                    value="<?= htmlspecialchars($inputData['lastName'] ?? '') ?>"
                    class="w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-gray-600 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <span class="text-red-500 block mt-1 text-sm">
                <?= htmlspecialchars($errors['lastName'] ?? '') ?>
            </span>
        </div>


        <div class="relative">
            <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
            <div class="relative">
                <i class="fa-solid fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="email" name="email" id="email" placeholder="Email Address"
                    value="<?= htmlspecialchars($inputData['email'] ?? '') ?>"
                    class="w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-gray-600 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <span class="text-red-500 block mt-1 text-sm">
                <?= htmlspecialchars($errors['email'] ?? '') ?>
            </span>
        </div>

        <div class="relative">
            <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
            <div class="relative">
                <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="password" name="password" id="password" placeholder="Enter a password"
                    class="w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-gray-600 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <span class="text-red-500 block mt-1 text-sm">
                <?= htmlspecialchars($errors['password'] ?? '') ?>
            </span>
        </div>

        <div class="relative">
            <label for="cpassword" class="block text-sm font-medium text-gray-800">Confirm Password</label>
            <div class="relative">
                <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm the password"
                    class="w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-gray-600 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <span class="text-red-500 block mt-1 text-sm">
                <?= htmlspecialchars($errors['cpassword'] ?? '') ?>
            </span>
        </div>

        <div class="relative">
            <label for="role" class="block text-sm font-medium text-gray-800">Role</label>
            <select name="role" id="role"
                class="w-full mt-1 pl-3 pr-3 py-3 rounded-lg bg-white border border-gray-600 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Learner" <?= (isset($inputData['role']) && $inputData['role'] === 'Learner') ? 'selected' : '' ?>>Learner</option>
                <option value="Instructor" <?= (isset($inputData['role']) && $inputData['role'] === 'Instructor') ? 'selected' : '' ?>>Instructor</option>
            </select>
            <span class="text-red-500 block mt-1 text-sm">
                <?= htmlspecialchars($errors['role'] ?? '') ?>
            </span>
        </div>

        <button type="submit" class="w-full py-3 bg-blue-200 rounded-lg font-semibold hover:bg-blue-300 transition cursor-pointer">
            Create Account
        </button>
    </form>

    <p class="text-center text-gray-400 mt-6">
        <a href="/admin/dashboard" class="underline hover:text-blue-400">Return to home</a>
    </p>

</div>
@endsection
