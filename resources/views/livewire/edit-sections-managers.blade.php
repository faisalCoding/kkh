<div class="flex flex-col gap-2  w-10/12 mx-auto">

    <h1 class=" text-gray-800 text-xl font-bold py-3 my-6 px-4 bg-gray-100 rounded-md">الاقسام المسجلة</h1>
    <div class="">

        @foreach ($sectionsManagers as $sectionManager)

            @php
                $sectionManagerArray = $sectionManager->toArray();
                $withOut = str_replace(["\"", "'", "'", '`'], ' ', $sectionManagerArray);
                
            @endphp
            <div class="flex gap-3 sectionManager-items ">
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center  w-1/4">
                    {{ $sectionManager->name }}
                </h1>
                <p class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $sectionManager->email }}</p>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $sectionManager->section_name }}</h1>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $sectionManager->id }}
                </h1>

                <button class="w-6 h-14 flex justify-center items-center text-blue-600 "
                    onclick="@this.initToUpdate(['{{ $withOut['id'] }}','{{ $withOut['name'] }}',`{{ $withOut['email'] }}`,'{{ $withOut['section_id'] }}'])">تعديل</button>

            </div>
        @endforeach


        <div
            class="popup fixed w-screen h-screen {{ $popup ? 'flex' : 'hidden' }} top-0 left-0 backdrop-blur-sm bg-gray-900 bg-opacity-20 items-center">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0" onclick="@this.popup_false()"></div>

            <div class="w-7/12 flex flex-col mx-auto bg-white rounded-md z-10">
                <div class="flex gap-3 ">
                    <div class="w-1/2 p-5">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4 ">اسم مدير القسم
                        </h1>
                        <input wire:model="edit_section_manager_name" type="text" value="{{ $edit_section_manager_name }}"
                            class="edit_section_manager_name bg-gray-100 rounded-md h-14 border-none w-72">
                        <hr class="mt-3 mb-8">

                        <input wire:model="edit_section_manager_email" type="text" hidden value="{{ $edit_section_manager_id }}"
                            class="edit_section_manager_email bg-gray-100 rounded-md h-14 border-none w-72">


                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">البريد الاكتروني
                        </h1>
                        <input wire:model="edit_section_manager_email" type="text"
                            class="edit_section_manager_email bg-gray-100 rounded-md border-none w-72" value ="{{ $edit_section_manager_email }}">
                        <hr class="mt-3 mb-8">
                    </div>
                    <div class="w-1/2 p-5">
                        <div class="">
                            <h1 class="text-gray-800 text-xl py-3 ">قسم المدير</h1>
                
                            <select wire:model="edit_section_manager_section">
                                @foreach (App\Models\Section::get() as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            @error('edit_section_manager_section')
                                <span class=" text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr class="mt-3 mb-8">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">كلمة المرور
                        </h1>
                        <input type="checkbox" wire:model="change_pass" class="m-3"><span>هل ترغب في  تعديل كلمة المرور؟</span><br>
                        <input {{ $change_pass?'':'disabled' }} wire:model="edit_section_manager_password" type="text"
                            class="edit_section_manager_email {{ $change_pass?'bg-gray-100':'bg-gray-300' }}  rounded-md border-none w-72" >
                        <hr class="mt-3 mb-8">

                    </div>


                </div>
                <div class="flex w-full p-5 justify-between bg-gray-200 rounded-b-md">
                    <button class="h-14 px-10 bg-main-grd-button col-span-2 rounded-lg text-white text-xl" wire:click="
                        update()">تحديث</button>
                    <button class="w-24 h-14 text-red-500  rounded-xl bg-red-50" wire:click="delete()">حذف</button>
                </div>
            </div>
        </div>
    </div>


</div>
