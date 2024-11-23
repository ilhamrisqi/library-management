@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-16">
    <div class="w-full max-w-2xl px-8">
        <!-- Card -->
        <div class="bg-white shadow-xl rounded-xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800">{{ __('Register') }}</h1>
                <p class="text-lg text-gray-500">{{ __('Create a new account to get started') }}</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Field -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-700">{{ __('Name') }}</label>
                    <input id="name" type="text" class="mt-2 block w-full rounded-lg border-gray-300 shadow-md text-xl p-4 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <p class="text-red-500 text-base mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="mt-2 block w-full rounded-lg border-gray-300 shadow-md text-xl p-4 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <p class="text-red-500 text-base mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-lg font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" class="mt-2 block w-full rounded-lg border-gray-300 shadow-md text-xl p-4 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <p class="text-red-500 text-base mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-6">
                    <label for="password-confirm" class="block text-lg font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="mt-2 block w-full rounded-lg border-gray-300 shadow-md text-xl p-4 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-600 text-white text-xl py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6">
                <p class="text-lg text-gray-600">
                    {{ __("Already have an account?") }}
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">{{ __('Login here') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection