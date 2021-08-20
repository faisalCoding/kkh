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
                    @livewire('section-manager-list')
                </div>
            </div>
        </div>
    </div>
    <a href="mailto:weeb.dd@gmail.com"> repaly </a>
</x-app-layout>
