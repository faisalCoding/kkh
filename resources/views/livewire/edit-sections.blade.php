<div class="flex flex-col gap-2  w-10/12 mx-auto">
    <h1 class=" text-gray-700 text-xl font-bold my-10 py-3 px-4 bg-gray-400 rounded-md">الاقسام المسجلة</h1>
<div class="">
    @foreach ($sections as $section)
    <div class="flex gap-3">
        <input type="text" value="{{ $section->name }}" class="bg-gray-100 rounded-md h-14 border-none w-72">
        <textarea type="text" value="{{ $section->descption }}" class="bg-gray-100 rounded-md border-none w-72"></textarea>
        <input type="text" value="{{ $section->manager_id }}" class="bg-gray-100 rounded-md h-14 border-none w-72">
        <img class="w-14 object-cover h-14" src="{{  asset('/sections_images/' . $section->image_name) }}" alt="">

        <button class="h-14 px-10 bg-main-grd-button col-span-2 rounded-lg text-white text-2xl " >تحديث</button>
        <button class="w-24 h-14 text-red-500  rounded-xl bg-red-50" wire:click="delete({{ $section->id }})">حذف</button>
    </div>
@endforeach
<div class="" dir="ltr">{{ $sections->links() }}</div>
</div>

    
</div>
