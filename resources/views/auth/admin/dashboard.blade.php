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
                        <div class="tap w-32 h-full flex justify-center items-center text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-800 ease-out  bg-gray-100 duration-300"><h1>{{ __("Department management")}}</h1></div>
                        <div class="tap w-32 h-full flex justify-center items-center text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-800 ease-out  bg-white duration-300"><h1>{{ __("Department managers management")}}</h1></div>
                        <div class="tap w-32 h-full flex justify-center items-center text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-800 ease-out  bg-white duration-300" ><h1>{{ __("User management")}}</h1></div>
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
                        <div class="board hidden  w-full min-h-full border-t border-gray-300 bg-white">
                            @livewire('add-user')
                            @livewire('edit-user')
                        </div>
                    </div>
                
                </div>
            </div>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5">
            <div class="bg-white shadow-xl sm:rounded-lg">


                <div class="show_message hidden w-screen h-screen  z-40 bg-black bg-opacity-80 right-0 top-0">
                    <div class="flex justify-center items-center w-screen h-screen">
                        <div class="clouse_message absolute w-screen h-screen "></div>
                        <div class="flex w-8/12 bg-white shadow-2xl rounded-md h-80 p-5 relative z-50 flex-col">
                            <div class=" flex gap-2">
                                <span class=" material-icons text-gray-300 p-1 rounded-md cursor-pointer select-none"
                                    style="font-size: 28px">
                                    message
                                </span>
                                <h1 class="h1">نص الرسالة</h1>
                            </div>
            
                            <p class=" w-10/12 mx-auto"></p>
                        </div>
                    </div>
            
                </div>
               @livewire('admin-message-list')
            </div>
        </div>
    </div>
</x-app-layout>
