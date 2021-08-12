<div class="flex justify-center mt-10">
    <div class="w-10/12 flex flex-col justify-center">

        <h1>اضافة قسم جديد</h1>
        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">ترتيب القسم</h1>
            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text" wire:model="new_section_order_by">
            @error('new_section_order_by')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">اسم القسم</h1>
            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text" wire:model="new_section_name">
            @error('new_section_name')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">وصف القسم</h1>

            <textarea class="bg-gray-100 rounded-md h-14 border-none w-96" type="text"
                wire:model="new_section_description"></textarea>
            @error('new_section_description')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">مدير القسم</h1>

            <select wire:model="new_scetion_manager">
                @foreach (App\Models\SectionManager::get() as $section_managet)
                    <option value="{{ $section_managet->id }}">{{ $section_managet->name }}</option>
                @endforeach
            </select>
            @error('new_scetion_manager')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <h1 class="text-gray-800 text-xl py-3 ">صورة القسم</h1>

            <form class="h-96" wire:submit.prevent="saveFile" class="flex flex-col">
                <input type="file" wire:model="file" class="custom-file-input">
                <div wire:loading wire:target="file" class="text-xl text-yellow-500 block">جاري تحميل الصورة</div>
                @if ($file)
                <div class="py-3 text-lg text-gray-700 ">اسم الصورة : {{ $new_section_image_name }}</div>
                <div class="py-3 text-lg text-gray-700 ">معاينة الصورة</div>
                
                <img class="max-h-40" src="{{ $file->temporaryUrl() }}">
                @endif
                @error('file')
                    <span class=" text-red-500">{{ $message }}</span>
                @enderror
            </form>
        </div>
        <div class="py-2">
            <button
                class="rounded-md w-52 h-14 text-white font-bold flex justify-center items-center bg-main-grd-button"
                wire:click="addNewSection">اضف</button>
        </div>

    </div>

</div>
