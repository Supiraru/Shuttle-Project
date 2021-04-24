@extends('layouts.master')

@section('content')
        <div class="flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg ">
                <p class="text-center mb-4 text-3xl font-bold text-gray-500">EDIT Account</p>
                <div class="flex justify-center">
                    <form method="POST" action="{{ route('account.post') }}" enctype="multipart/form-data" class="border-2 shadow-xl border-gray-400 rounded-2xl p-12 w-1/2" > 
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <p class="mb-4 text-lg text-gray-800 font-semibold">Change Avatar</p>
                            <label for="image" class="sr-only">Avatar</label>
                            <input type="file" name="image" id="image" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Post something!"/>
                        </div>
    
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
@endsection