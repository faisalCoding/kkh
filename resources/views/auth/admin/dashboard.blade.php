<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <script src="{{ mix('js/admin.js') }}" defer></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="w-full bg-gray-400 flex flex-col">
                    <div class="up-bar w-full bg-main-grd-button flex h-24 ">
                        <div class="tap w-32 h-full flex justify-center items-center text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-800 ease-out  bg-gray-100 duration-300"><h1>ادارة الاقسام</h1></div>
                        <div class="tap w-32 h-full flex justify-center items-center text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-800 ease-out  bg-white duration-300"><h1>ادارة مدراء الاقسام</h1></div>
                        <div class="tap w-32 h-full flex justify-center items-center text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-800 ease-out  bg-white duration-300" ><h1>ادارة المستخدمين</h1></div>
                    </div>
                
                    <div class="contetn-board h-full relative bg-white">
                        <div class="board  block w-full min-h-full border-t border-gray-300 bg-white">
                            @livewire('add-new-section')
                            @livewire('edit-sections')
                        </div>
                        <div class="board hidden w-full min-h-full border-t border-gray-300  bg-white">
                            @livewire('add-sections-managers')
                            @livewire('edit-sections-managers')
                        </div>
                        <div class="board hidden  w-full min-h-full border-t border-gray-300 bg-white"></div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
