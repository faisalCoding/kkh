<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Section Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class=" w-full bg-white py-5 flex flex-col p-5">
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
                    @livewire('section-manager-list')
                </div>
            </div>
        </div>
    </div>
    <a href="mailto:weeb.dd@gmail.com"> repaly </a>
</x-app-layout>
