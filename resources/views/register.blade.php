@extends('layouts.master')


@section('content')
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <h3 class="font-bold text-2xl">Welcome to Shuttle</h3>
        <p class="text-gray-600 pt-2">Register your account.</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="POST" action="">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200 @error('username') border-2 border-red-500 @enderror">
                <label class="block text-gray-700 @error('username') text-red-500  @enderror text-sm font-bold mb-2 ml-3" for="username">Username</label>
                <input value="{{ old('username') }}" type="text" name="username" id="username" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                @error('username')
                    <div class="text-red-500 text-sm p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200 @error('email') border-2 border-red-500 @enderror">
                <label class="block text-gray-700 @error('email') text-red-500  @enderror text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <input value="{{ old('email') }}" type="text" name="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                @error('email')
                    <div class="text-red-500 text-sm p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200 @error('password') border-2 border-red-500 @enderror">
                <label class="block text-gray-700 @error('password') text-red-500  @enderror text-sm font-bold mb-2 ml-3" for="password">password</label>
                <input type="password" name="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                @error('password')
                    <div class="text-red-500 text-sm p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200 @error('password_confirmation') border-2 border-red-500 @enderror">
                <label class="block text-gray-700 @error('password_confirmation') text-red-500  @enderror text-sm font-bold mb-2 ml-3" for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                @error('password_confirmation')
                    <div class="text-red-500 text-sm p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Register</button>
        </form>
    </section>
</main>
@endsection