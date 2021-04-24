<nav class="p-6 bg-white flex justify-between mb-6">
    <a class="-my-10" href="{{ route('global') }}"><img src="{{ asset('images/shuttle-logo.png') }}" alt="Shutter Logo" style="max-width: 120px"></a>
    @auth
        <ul class="text-gray-500 text-2xl flex items-center" style="font-weight: bold">
            <li class="{{ (request()->is('/home*')) ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="p-3 mx-6">Home</a>
            </li>
            <li>
                <a href="{{ route('global') }}" class="p-3 mx-6">Explorer</a>
            </li>
        </ul>
    @endauth

    <ul class="flex items-center">
        @auth
            <li>
                <div class="relative inline-block text-left">
                    <div>
                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span class="text-gray-500 text-2xl">{{ auth()->user()->username }}</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                                <div class="px-2 py-2 bg-gray-200 rounded-md shadow dark-mode:bg-gray-800">
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('profile') }}">Profile</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('profile-edit') }}">Edit Profile</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('account') }}">Edit Account</a>
                                    <form method="POST" action="{{ route('logout') }}" role="none">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" role="menuitem" tabindex="-1" id="menu-item-3">
                                        Sign out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    

            </li>
        @endauth

        @guest
            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
        @endguest
    </ul>
</nav>