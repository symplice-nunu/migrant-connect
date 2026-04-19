@extends('layouts.app')

@section('header')
    <div class="flex items-center space-x-4">
        <div class="w-10 h-10 bg-teal-600 rounded-xl flex items-center justify-center">
            <i class="fas fa-user text-white"></i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Profile Settings</h2>
            <p class="text-sm text-gray-500">Manage your account information and password.</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="max-w-3xl space-y-6">
        <div class="p-6 bg-white shadow sm:rounded-xl border border-gray-200">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-6 bg-white shadow sm:rounded-xl border border-gray-200">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-6 bg-white shadow sm:rounded-xl border border-gray-200">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
