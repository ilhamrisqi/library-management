@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-16">
    <div class="w-full max-w-2xl px-8">
        <!-- Card -->
        <div class="bg-white shadow-xl rounded-xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800">{{ __('Login') }}</h1>
                <p class="text-lg text-gray-500">{{ __('Access your account to manage your activities') }}</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                           class="mt-2 block w-full rounded-lg border-gray-300 shadow-md text-xl p-4 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-base mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-lg font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required 
                           class="mt-2 block w-full rounded-lg border-gray-300 shadow-md text-xl p-4 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-base mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" name="remember" 
                               class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 text-lg text-gray-700">{{ __('Remember Me') }}</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-lg text-blue-500 hover:underline">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white text-xl py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="text-center mt-6">
                <p class="text-lg text-gray-600">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">{{ __('Register here') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
