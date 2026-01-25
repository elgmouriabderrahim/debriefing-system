@extends('layouts.main')

@section('title', 'Assign Sprint')
@section('page-title', 'Assign Sprint')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-lg">

        <div class="px-6 py-5 border-b bg-gray-50 relative">
            <h2 class="text-2xl font-semibold text-gray-800">Assign Sprint: <?= htmlspecialchars($sprint->getName()) ?></h2>
            <p class="text-sm text-gray-500 mt-1">
                Select the classes you want to assign this sprint to.
            </p>
            <?php if(isset($success) && $success): ?>
                <div id="success-message" class=" absolute right-0 top-0 text-green-800 p-4  m-4 flex items-center justify-between transition-all duration-500">
                    <span><?= htmlspecialchars($success) ?></span>
                </div>

                <script>
                    setTimeout(() => {
                        const msg = document.getElementById('success-message');
                        if(msg){
                            msg.style.opacity = '0';
                            msg.style.transition = 'opacity 0.5s ease-out';
                            setTimeout(() => msg.remove(), 500);
                        }
                    }, 3000);
                </script>
            <?php endif; ?>
        </div>

        <?php if(isset($errors) && !empty($errors)): ?>
            <div class="bg-red-100 border border-red-300 text-red-800 p-3 rounded-lg m-4">
                <?php foreach($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/admin/sprint/assign" class="p-6 space-y-6">

            <input type="hidden" name="sprint_id" value="<?= htmlspecialchars($sprint->getId()) ?>">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Classes
                </label>

                <?php if(!empty($classes)): ?>
                    <div class="space-y-2 max-h-80 overflow-y-auto border border-gray-200 rounded-lg p-3">
                        <?php foreach($classes as $class): ?>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    name="class_ids[]" 
                                    value="<?= htmlspecialchars($class->getId()) ?>"
                                    class="h-4 w-4 rounded border-gray-300 focus:ring-green-500"
                                    <?= (isset($assignedClasses) && in_array($class->getId(), $assignedClasses)) ? 'checked' : '' ?>
                                >
                                <span class="text-gray-700"><?= htmlspecialchars($class->getName()) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-sm">No classes available to assign.</p>
                <?php endif; ?>
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="/admin/sprints"
                   class="px-4 py-1 text-sm font-medium text-gray-800 hover:text-gray-900 rounded-lg bg-neutral-100 hover:bg-neutral-200 transition">
                    Back to sprints
                </a>

                <button
                    type="submit"
                    class="px-4 py-1 rounded-lg bg-green-600 text-white text-sm font-medium hover:bg-green-700 transition">
                    <i class="fa-solid fa-floppy-disk"></i> Assign Sprint
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
