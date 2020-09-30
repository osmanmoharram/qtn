@extends('layouts.app')

@section('content')
<div class="h-screen w-2/12 bg-gray-900 py-16 pl-4 flex flex-col justify-between"> {{-- SideBar --}}
    <div class="space-y-10"> {{-- Tasks --}}
        <div> {{-- Task_One --}}
            <a class="flex justify-start items-center pl-4 py-4 rounded-l-full {{ request()->is('home') ? 'bg-white text-black' : 'text-white' }} hover:bg-white hover:text-black " href="#">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                <span class="text-sm ml-4">Dashboard</span>
            </a>
        </div> {{-- End_Task_One --}}
    
    
        <div> {{-- Task_Two --}}
            <a class="flex justify-start items-center pl-4 py-4 rounded-l-full {{ request()->is('/*') ? 'bg-white text-black' : 'text-white' }}  hover:bg-white hover:text-black " href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                <span class="text-sm ml-4">Users</span>
            </a>
        </div> {{-- End_Task_Two --}}
    
        <div> {{-- Task_Three --}}
            <a class="flex justify-start items-center pl-4 py-4 rounded-l-full {{ request()->is('sale') ? 'bg-white text-black' : 'text-white' }} hover:bg-white hover:text-black" href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                <span class="text-sm ml-4">Branches</span>
            </a>
        </div> {{-- End_Task_Three --}}
    
        <div> {{-- Task_Four --}}
            <a class="flex justify-start items-center pl-4 py-4 rounded-l-full {{ request()->is('employee')}} text-white hover:bg-white hover:text-black " href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm ml-4">Departments</span>
            </a>
        </div> {{-- End_Task_Four --}}
    
        <div> {{-- Task_Five --}}
            <a class="flex justify-start items-center pl-4 py-4 rounded-l-full {{ request()->path() === 'expenses' ? 'bg-white text-black' : 'text-white' }} hover:bg-white hover:text-black " href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm ml-4">Employees</span>
            </a>
        </div> {{-- End_Task_Five --}}
    
        <div> {{-- Task_Six --}}
            <a class="flex justify-start items-center pl-4 py-4 rounded-l-full {{ request()->is('supplier') ? 'bg-white text-black' : 'text-white' }} text-white hover:bg-white hover:text-black " href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm ml-4">Quotations Module</span>
            </a>
        </div> {{-- End_Task_Six --}}

        <div> {{-- Task_Six --}}
            <a class="flex justify-start items-center pl-4 py-4 rounded-l-full {{ request()->is('supplier') ? 'bg-white text-black' : 'text-white' }} text-white hover:bg-white hover:text-black " href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm ml-4">Stores Module</span>
            </a>
        </div> {{-- End_Task_Six --}}
    </div> {{-- End_Tasks --}
</div> {{-- End_SideBar --}}

<div class="flex-1 overflow-y-auto">
    @yield('main')
</div>
@endsection
