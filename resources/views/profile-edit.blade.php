@extends('layouts.master')

@section('content')
        <div class="flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg ">
                <p class="text-center mb-4 text-3xl font-bold text-gray-500">EDIT Profile</p>

                <div class="flex justify-center">
                    <form method="POST" action="" class="border-2 shadow-xl border-gray-400 rounded-2xl p-12 w-1/2" > 
                        @csrf
                        @method('PUT')
                        <div class=" w-full flex justify-between my-8">
                            <label class="" for="name">
                                Nama : 
                            </label>
                            
                            <input value="{{ old('name', $profile->name) }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" type="text" name="name">
                            @error('name')
                            <div class="alert alert-danger">
                                masukkan nama!
                            </div>
                            @enderror
                        </div>
                        <div class=" w-full flex justify-between my-8">
                            <label for="inline-full-name">
                                Bio : 
                            </label>
                            <input name="bio" value="{{ old('bio', $profile->bio) }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="bio" />
                            @error('bio')
                            <div class="alert alert-danger">
                                masukkan bio!
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4 border rounded-xl bg-blue-200 w-3/5 p-4">
                            <p class="text-sm">
                                <span class="text-lg font-bold">info:</span> <br> if you want to change avatar,<br> go to edit account
                            </p>
                        </div>
                        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Save
                        </button>
                    </form>
                    </div>
                </div>
            </div>
@endsection