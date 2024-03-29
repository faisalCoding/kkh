<div class="flex flex-col gap-2  w-10/12 mx-auto">

    <h1 class=" text-gray-800 text-xl font-bold py-3 my-6 px-4 bg-gray-100 rounded-md">الاقسام المسجلة</h1>
    <div class="">

        @foreach ($sections as $section)

            @php
                $sectionArray = $section->toArray();
                $sectionArrayWithoutDoubelCotision = str_replace(["\"", "'", "'", '`'], ' ', $sectionArray);
                
            @endphp
            <div class="flex gap-3 section-items ">
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center  w-1/4">
                    {{ $section->name }}
                </h1>
                <p class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $section->description }}</p>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $section->manager_id }}</h1>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $section->id }}
                </h1>
                <img class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-2/12 h-14 object-cover"
                    class="w-24 object-cover h-24" src="{{ asset('/sections_images/' . $section->image_name) }}"
                    alt="">
                <button class="w-6 h-14 flex justify-center items-center text-blue-600 "
                    onclick="@this.initToUpdate(['{{ $sectionArrayWithoutDoubelCotision['id'] }}','{{ $sectionArrayWithoutDoubelCotision['name'] }}',`{{ $sectionArrayWithoutDoubelCotision['description'] }}`,'{{ $sectionArrayWithoutDoubelCotision['manager_id'] }}','{{ $sectionArrayWithoutDoubelCotision['order_by'] }}','{{ $sectionArrayWithoutDoubelCotision['image_name'] }}'])">تعديل</button>

            </div>
        @endforeach


        <div
            class="popup fixed w-screen h-screen z-10 {{ $popup ? 'flex' : 'hidden' }} top-0 left-0 backdrop-blur-sm bg-gray-900 bg-opacity-20 items-center">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 " onclick="@this.popup_false()"></div>

            <div class="w-7/12 flex flex-col mx-auto bg-white rounded-md z-50">
                <div class="flex gap-3 ">
                    <div class="w-1/2 p-5">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4 ">اسم القسم
                        </h1>
                        <input wire:model="section_name" type="text"
                            class="section_name bg-gray-100 rounded-md h-14 border-none w-72">
                        @error('section_name')
                            <span class=" text-red-500">{{ $message }}</span>
                        @enderror
                        <hr class="mt-3 mb-8">

                        <input wire:model="section_id" type="text" hidden
                            class="section_id bg-gray-100 rounded-md h-14 border-none w-72">



                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">وصف القسم
                        </h1>
                        <textarea wire:model="section_description" type="text"
                            class="section_description bg-gray-100 rounded-md border-none w-72">{{ $section_description }}</textarea>
                        @error('section_description')
                            <span class=" text-red-500">{{ $message }}</span>
                        @enderror
                        <hr class="mt-3 mb-8">
                    </div>

                    <div class="w-1/2 p-5">


                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">مدير القسم
                        </h1>

                        <select wire:model="section_manager_id">
                            @foreach (App\Models\SectionManager::get() as $sectionManager)
                                <option value="{{ $sectionManager->id }}">{{ $sectionManager->name }}</option>
                            @endforeach
                        </select>
                        <hr class="mt-3 mb-8">
                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">ترتيب القسم</h1>
                        <input type="number" wire:model="section_order_by">
                        @error('section_order_by')
                            <span class=" text-red-500">{{ $message }}</span>
                        @enderror

                        <hr class="mt-3 mb-8">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">خدمات القسم
                        </h1>
                        <div class="flex gap-1 flex-wrap">
                            @foreach ($section_services as $key => $section_service)
                                <div class=" flex">
                                    <input type="text"
                                        wire:change="updateService('{{ $section_service->id }}','{{ $key }}')"
                                        wire:model="service_val.{{ $key }}.order_by"
                                        class="p-0 text-center w-9 h-6 bg-blue-400 text-white shadow-md border-none rounded-r-full">
                                    <input type="text"
                                        wire:change="updateService('{{ $section_service->id }}','{{ $key }}')"
                                        wire:model="service_val.{{ $key }}.name"
                                        class="p-0 text-center h-6 bg-blue-500 text-white shadow-md border-none ">
                                    <input type="submit" wire:click="deleteService('{{ $section_service->id }}')"
                                        value="X"
                                        class=" text-xs p-0 text-center w-5 h-6 bg-blue-300 cursor-pointer text-blue-600 shadow-md border-none rounded-l-full">
                                </div>
                            @endforeach


                        </div>
                        
                        <div class=" flex mt-1">
                            <input type="text" disabled
                                class="p-0 text-center w-9 h-6 bg-blue-100 text-white shadow-md border-none rounded-r-full">
                            <input type="text" wire:model="new_service_name" wire:keydown.enter="addNewService()"
                                class="p-0 text-center h-6 bg-blue-200 text-blue-700 shadow-md border-none "
                                placeholder="اضف جديد">
                            <input type="submit" disabled value="X"
                                class=" text-xs p-0 text-center w-5 h-6 bg-blue-100 cursor-pointer text-blue-600 shadow-md border-none rounded-l-full">
                        </div>

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">صورة القسم
                        </h1>
                        <img class="w-24 object-cover h-24"
                            src="{{ asset('/sections_images/' . $section_image_name) }}" alt="">
                        <hr class="mt-3 mb-8">
                    </div>


                </div>
                <div class="flex w-full p-5 justify-between bg-gray-200 rounded-b-md">
                    <button class="h-14 px-10 bg-main-grd-button col-span-2 rounded-lg text-white text-2xl" wire:click="
                        update()">تحديث</button>
                    <button class="w-24 h-14 text-red-500  rounded-xl bg-red-50" wire:click="delete()">حذف</button>
                </div>
            </div>
        </div>
    </div>


</div>
