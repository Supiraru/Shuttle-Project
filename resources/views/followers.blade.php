@extends('layouts.master')

@section('content')
      <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
          <!-- This is an example component -->
<div class="min-h-screen flex px-4">
    <div class='overflow-x-auto w-full'>
        <p class="text-3xl text-gray-500 font-bold text-center my-8">
            {{ auth()->user()->username }} are Followed by
        </p>
        <!-- Table -->
        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Name
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        status
                    </th>
                </tr>
            </thead>
            @if ($users->count())
            @foreach ($users as $user)
                
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-10 h-10">
                                <img class='w-10 h-10 object-cover rounded-full' alt='Avatar' src="{{ url($user->profile->avatar) }}">
                            </div>
                            <div>
                                <a href="{{ route("user.profile", $user->id) }}">
                                    <p class="">
                                        {{ $user->username }}
                                    </p>
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $user->email }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </td>
                   
                    <td class="px-6 py-4 text-center">
                        @if ($user->followingBy(auth()->user()))
                        <form action="{{ route('user.unfollow', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="shadow text-white bg-gray-600 font-semibold px-4 rounded-full hover:bg-gray-500 focus:shadow-outline focus:outline-none py-2" type="submit">
                              Unfollow
                            </button>
                          </form>
                        @else
                        <form action="{{ route('user.follow', $user->id) }}" method="post">
                            @csrf
                            <button class="shadow text-white bg-blue-600 font-semibold px-4 rounded-full hover:bg-blue-500 focus:shadow-outline focus:outline-none py-2" type="submit">
                              Follow
                            </button>
                          </form>
                        @endif
                    </td>
                </tr>
                
            </tbody>
            @endforeach
            @else
            <tbody>
                <tr>
                    No Following Found
                </tr>
            </tbody>
            @endif
        </table>

    </div>
</div>









    <!-- support me by buying a coffee -->
    <a href="https://www.buymeacoffee.com/danimai" target="_blank" class="bg-purple-600 p-2 rounded-lg text-white fixed right-0 bottom-0">
        Support me
    </a>
      </div>
    </div>
@endsection