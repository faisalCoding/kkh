<div class="flex justify-center mt-10">
    <div class="w-10/12 flex flex-col justify-center">

        <h1>{{__(("Add a new section"))}}</h1>
        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">{{__("manager name")}}</h1>
            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text" wire:model="new_sections_managers_name">
            @error('new_sections_managers_name')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">{{__("Email")}}</h1>

            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text"
                wire:model="new_section_manager_email">
            @error('new_section_manager_email')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">{{__("Director's Department")}}</h1>

            <select wire:model="new_section_manager_section">
                @foreach (App\Models\Section::get() as $section_manager)
                    <option value="{{ $section_manager->id }}">{{ $section_manager->name }}</option>
                @endforeach
            </select>
            @error('new_section_manager_section')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">{{__("Passowrd")}}</h1>

            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text"
                wire:model="new_section_manager_password">
            @error('new_section_manager_email')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="py-2">
            <button
                class="rounded-md w-52 h-14 text-white font-bold flex justify-center items-center bg-main-grd-button"
                wire:click="addNewSectionManager">{{__("add")}}</button>
        </div>

    </div>

</div>
