<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Test content to verify page loads -->
            <div class="p-4 sm:p-8 bg-red-100 dark:bg-red-900 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-red-900 dark:text-red-100">Profile Test - This should be visible</h3>
                <p class="mt-1 text-sm text-red-700 dark:text-red-300">
                    User: {{ $user->name ?? 'No user' }}<br>
                    Email: {{ $user->email ?? 'No email' }}<br>
                    Time: {{ now() }}
                </p>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
