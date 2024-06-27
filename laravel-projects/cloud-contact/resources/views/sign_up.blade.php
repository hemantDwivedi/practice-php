@extends('layouts.master')
@section('title', 'Sign Up')
@section('content')
    <section>
        <div class="py-5 px-4 mt-5 mx-auto max-w-screen-sm">
            <h2 class="mt-5 mb-2 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Sign Up
            </h2>
            <form action={{ route('signup.post') }} method="POST" class="space-y-8">
                @csrf {{-- Generate hidden csrf token input field --}}
                <div>
                    <input type="text" id="signUpName" name="signUpName" value="{{ old('signUpName') }}"
                        placeholder="Full name"
                        class="bg-zinc-900 shadow-sm border-b border-gray-300 text-white text-sm block w-full py-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none dark:shadow-sm-light">
                    @error('signUpName')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                        placeholder="Username"
                        class="bg-zinc-900 shadow-sm border-b border-gray-300 text-white text-sm block w-full py-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none dark:shadow-sm-light">
                    @error('username')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="email" id="signUpEmail" name="signUpEmail" value="{{ old('signUpEmail') }}"
                        placeholder="Email"
                        class="bg-zinc-900 shadow-sm border-b border-gray-300 text-white text-sm block w-full py-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none dark:shadow-sm-light">
                    @error('signUpEmail')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                        placeholder="Password"
                        class="bg-zinc-900 shadow-sm border-b border-gray-300 text-white text-sm block w-full py-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none dark:shadow-sm-light">
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="password" id="confirmPassword" name="confirmPassword" value="{{ old('confirmPassword') }}"
                        placeholder="Confirm password"
                        class="bg-zinc-900 shadow-sm border-b border-gray-300 text-white text-sm block w-full py-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none dark:shadow-sm-light">
                    @error('confirmPassword')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="py-3 px-5 w-full text-sm font-medium text-center text-black rounded-lg bg-white  hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                    Up</button>

                <div class="text-sm font-medium text-center">
                    <span>
                        Already have an account?
                    </span>
                    <a href="/signin" class="underline">Sign in</a>
                </div>
            </form>
        </div>
    </section>
@endsection
