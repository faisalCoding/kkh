<div class="flex flex-col gap-2  w-10/12 mx-auto">
    
    <h1 class=" text-gray-800 text-xl font-bold py-3 my-6 px-4 bg-gray-100 rounded-md">{{__("Registered sections")}}</h1>
    <div class="">

        @foreach ($sections as $section)

        @php
           $sectionArray = $section->toArray();
           $sectionArrayWithoutDoubelCotision = str_replace(array("\"","'","'",'`'), ' ' ,$sectionArray);

        @endphp
            <div class="flex gap-3 section-items ">
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center  w-1/4">{{ $section->name }}
                </h1>
                <p class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $section->description }}</p>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $section->manager_id }}</h1>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">{{ $section->id }}
                </h1>
                <img class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-2/12 h-14 object-cover"
                    class="w-24 object-cover h-24" src="{{ asset('/sections_images/' . $section->image_name) }}"
                    alt="">
                <button class="w-6 h-14 flex justify-center items-center text-blue-600 "
                    onclick="@this.initToUpdate(['{{ $sectionArrayWithoutDoubelCotision['id']}}','{{ $sectionArrayWithoutDoubelCotision['name']}}',`{{ $sectionArrayWithoutDoubelCotision['description']}}`,'{{ $sectionArrayWithoutDoubelCotision['manager_id']}}','{{ $sectionArrayWithoutDoubelCotision['image_name']}}'])">{{__("Edit")}}</button>

            </div>
        @endforeach
        <div class="" dir="ltr">{{ $sections->links() }}</div>

        <div
            class="popup fixed w-screen h-screen {{  $popup?'flex':'hidden'  }} top-0 left-0 backdrop-blur-sm bg-gray-900 bg-opacity-20 items-center">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0" onclick="@this.popup_false()"></div>

            <div class="w-7/12 flex flex-col mx-auto bg-white rounded-md z-10">
                <div class="flex gap-3 ">
                    <div class="w-1/2 p-5">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4 ">{{__("Department Name")}}
                        </h1>
                        <input wire:model="section_name" type="text" value="{{ $section_name }}"
                            class="section_name bg-gray-100 rounded-md h-14 border-none w-72">
                        <hr class="mt-3 mb-8">

                        <input wire:model="section_id" type="text" hidden value="{{ $section_id }}"
                            class="section_id bg-gray-100 rounded-md h-14 border-none w-72">


                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">{{__("Section description")}}
                        </h1>
                        <textarea wire:model="section_description" type="text"
                            class="section_description bg-gray-100 rounded-md border-none w-72">{{ $section_description }}</textarea>
                        <hr class="mt-3 mb-8">
                    </div>

                    <div class="w-1/2 p-5">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">{{__("Section Manager")}}
                        </h1>
                        <input wire:model="section_manager_id" type="text" value="{{ $section_manager_id }}"
                            class="section_manager_id bg-gray-100 rounded-md h-14 border-none w-72">
                        <hr class="mt-3 mb-8">


                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">{{__("Section picture")}}
                        </h1>
                        <img class="w-24 object-cover h-24"
                            src="{{ asset('/sections_images/' . $section_image_name) }}" alt="">
                        <hr class="mt-3 mb-8">
                    </div>


                </div>
                <div class="flex w-full p-5 justify-between bg-gray-200 rounded-b-md">
                    <button class="h-14 px-10 bg-main-grd-button col-span-2 rounded-lg text-white text-2xl" wire:click="
                        update()">{{__("Update")}}</button>
                    <button class="w-24 h-14 text-red-500  rounded-xl bg-red-50"
                        wire:click="delete()">{{__("Delete")}}</button>
                </div>
            </div>
        </div>
    </div>


</div>
