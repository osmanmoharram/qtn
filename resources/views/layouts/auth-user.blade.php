@extends('layouts.app')

@section('auth-content')
<div class="h-screen w-2/12 bg-gray-900 flex flex-col justify-between"> {{-- SideBar --}}
    <div> {{-- Profile_Tasks --}}
        <div class="px-8 pt-10 pb-8"> {{-- Profile --}}
            <a class="flex flex-col justify-center items-center text-white text-xs hover:underline" href="#">
                <img class="h-16 rounded-full mr-2" src="https://placekitten.com/30/30" >
                <div class="mt-2 text-center">
                    <span class="block font-bold">
                        @if (session('user'))
                            {{ ucwords(session('user')->username) }}
                        @endif
                    </span>
                    <span class="block mt-1">
                        @if (session('user'))
                            {{ ucwords(session('user')->role) }}
                        @endif
                    </span>
                </div>
            </a>
        </div> {{-- End_Profile --}}

        <div class="mt-16 ml-4"> {{-- Tasks --}}
            
        </div> {{-- End_Tasks --}}
    </div> {{-- End_Profile_Tasks --}}

    <div class="flex justify-between px-3 pb-5"> {{-- Logout_Language --}} 
        <form action="{{ route('login') }}" method="POST"> {{-- Logout --}}
            @csrf
            @method('DELETE')

            <button class="text-sm text-gray-500 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
        </form> {{-- End_Logout --}}

        <a class="text-gray-500 text-sm font-bold hover:text-white" href="#">عربي</a>
    </div> {{-- End_Logout_Language --}}
</div> {{-- End_SideBar --}}

<div class="flex-1 overflow-y-auto">
    @yield('main')
</div>
@endsection