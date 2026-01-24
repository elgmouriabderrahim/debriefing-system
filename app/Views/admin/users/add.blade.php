@extends('layouts.main')

@section('title', 'Debriefing - Create New User')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-900">Create Account</h1>
        <p class="text-gray-500 mt-1">
            Add a new user to the platform as an Instructor or Learner
        </p>
    </div>

    <?php if(isset($success) && $success): ?>
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-4">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <form action="/admin/user/add" method="post"
          class="bg-white p-6 rounded-xl shadow-sm border space-y-6">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                First Name
            </label>

            <input
                type="text"
                name="firstName"
                value="<?= htmlspecialchars($inputData['firstName'] ?? '') ?>"
                class="w-full border-0 border-b focus:ring-0 focus:outline-none
                       <?= isset($errors['firstName']) ? 'border-red-500' : 'border-gray-300' ?>"
                placeholder="Enter the first name"
            >

            <?php if(isset($errors['firstName'])): ?>
                <p class="text-sm text-red-600 mt-1">
                    <?= htmlspecialchars($errors['firstName']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Last Name
            </label>

            <input
                type="text"
                name="lastName"
                value="<?= htmlspecialchars($inputData['lastName'] ?? '') ?>"
                class="w-full border-0 border-b focus:ring-0 focus:outline-none
                       <?= isset($errors['lastName']) ? 'border-red-500' : 'border-gray-300' ?>"
                placeholder="Enter the last name"
            >

            <?php if(isset($errors['lastName'])): ?>
                <p class="text-sm text-red-600 mt-1">
                    <?= htmlspecialchars($errors['lastName']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Email Address
            </label>

            <input
                type="email"
                name="email"
                value="<?= htmlspecialchars($inputData['email'] ?? '') ?>"
                class="w-full border-0 border-b focus:ring-0 focus:outline-none
                       <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-300' ?>"
                placeholder="Enter the email"
            >

            <?php if(isset($errors['email'])): ?>
                <p class="text-sm text-red-600 mt-1">
                    <?= htmlspecialchars($errors['email']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="w-full border-0 border-b focus:ring-0 focus:outline-none
                       <?= isset($errors['password']) ? 'border-red-500' : 'border-gray-300' ?>"
                placeholder="********"
            >

            <?php if(isset($errors['password'])): ?>
                <p class="text-sm text-red-600 mt-1">
                    <?= htmlspecialchars($errors['password']) ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Confirm Password
            </label>

            <input
                type="password"
                name="cpassword"
                class="w-full border-0 border-b focus:ring-0 focus:outline-none
                       <?= isset($errors['cpassword']) ? 'border-red-500' : 'border-gray-300' ?>"
                placeholder="********"
            >

            <?php if(isset($errors['cpassword'])): ?>
                <p class="text-sm text-red-600 mt-1">
                    <?= htmlspecialchars($errors['cpassword']) ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Role -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Role
            </label>

            <select
                name="role"
                class="w-full border-0 border-b focus:ring-0 focus:outline-none
                       <?= isset($errors['role']) ? 'border-red-500' : 'border-gray-300' ?>">
                <option value="Learner"
                    <?= (isset($inputData['role']) && $inputData['role'] === 'Learner') ? 'selected' : '' ?>>
                    Learner
                </option>
                <option value="Instructor"
                    <?= (isset($inputData['role']) && $inputData['role'] === 'Instructor') ? 'selected' : '' ?>>
                    Instructor
                </option>
            </select>

            <?php if(isset($errors['role'])): ?>
                <p class="text-sm text-red-600 mt-1">
                    <?= htmlspecialchars($errors['role']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="/admin/users"
               class="px-4 py-1 text-sm font-medium text-gray-800
                      bg-neutral-100 hover:bg-neutral-200 rounded-lg transition">
                Cancel
            </a>

            <button
                type="submit"
                class="px-4 py-1 rounded-lg bg-green-600 text-white
                       text-sm font-medium hover:bg-green-700 transition">
                <i class="fa-solid fa-user-plus"></i> Create
            </button>
        </div>

    </form>
</div>
@endsection
