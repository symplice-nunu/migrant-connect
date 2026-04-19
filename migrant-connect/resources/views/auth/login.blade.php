<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-6 text-sm font-medium text-teal-600">
            {{ session('status') }}
        </div>
    @endif

    <!-- Header -->
    <div class="mb-7 text-center">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Welcome back</h1>
        <p class="text-sm text-gray-500">Sign in to your Migrant Connect account.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"  autofocus autocomplete="username" placeholder="you@example.com"
                class="w-full px-4 py-2.5 text-sm border rounded-xl bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-transparent transition duration-150 shadow-sm {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-teal-500' }}" />
            @error('email')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs font-medium text-teal-600 hover:text-teal-700 transition-colors duration-150">
                        Forgot password?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password"  autocomplete="current-password" placeholder="••••••••"
                class="w-full px-4 py-2.5 text-sm border rounded-xl bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-transparent transition duration-150 shadow-sm {{ $errors->has('password') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-teal-500' }}" />
            @error('password')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                class="w-4 h-4 rounded border-gray-300 text-teal-600 focus:ring-teal-500 transition duration-150">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
        </div>

        <!-- Submit -->
        <div class="pt-1">
            <button type="submit"
                class="w-full flex justify-center items-center px-5 py-3 bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold rounded-xl shadow-sm hover:shadow-md active:scale-95 transition-all duration-150">
                Sign In
            </button>
        </div>

        <!-- Register link -->
        @if (Route::has('register'))
            <div class="text-center pt-3 border-t border-gray-200">
                <p class="text-sm text-gray-500">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-teal-600 hover:text-teal-700 transition-colors duration-150">
                        Create one
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>
