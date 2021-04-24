@extends('layouts.master')

@section('content')
      <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
          <!-- This is an example component -->
<div class="min-h-screen flex px-4">
    <div class='overflow-x-auto w-full'>
        <p class="text-3xl text-gray-500 font-bold text-center my-8">
            {{ $user->username }} are Following
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
                                <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                            </div>
                            <div>
                                <p class="">
                                    {{ $user->username }}
                                </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>
                    </td>
                   
                    <td class="px-6 py-4 text-center">
                        @if ($user->followingBy(auth()->user()))
                        <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                            Following
                        </span>
                        @else
                        @if ($user->id == auth()->user()->id)
                        <span class="text-green-800 font-semibold px-2 rounded-full">
                            This is you
                        </span>
                        @else
                        <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                            Follow
                        </span>
                        @endif
                        
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