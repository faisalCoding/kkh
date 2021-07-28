<div class="flex flex-col gap-2  w-10/12 mx-auto">

    <h1 class=" text-gray-800 text-xl font-bold py-3 my-6 px-4 bg-gray-100 rounded-md">المستفيدين المسجلين</h1>
    <div class="">

        @foreach ($users as $user)

            @php
                $usersArray = $user->toArray();
                $withOut = str_replace(["\"", "'", "'", '`'], ' ', $usersArray);
                
            @endphp
            <div class="flex gap-3 user-items ">
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center  w-1/4">
                    {{ $user->name }}
                </h1>
                <p class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $user->email }}</p>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $user->phone }}</h1>
                <h1 class=" bg-gray-100 text-gray-800 text-xl flex justify-center items-center mb-3 text-center w-1/4">
                    {{ $user->id }}
                </h1>

                <button class="w-6 h-14 flex justify-center items-center text-blue-600 "
                    onclick="@this.initToUpdate(['{{ $withOut['id'] }}','{{ $withOut['name'] }}',`{{ $withOut['email'] }}`,'{{ $withOut['phone'] }}'])">تعديل</button>

            </div>
        @endforeach


        <div
            class="popup fixed w-screen h-screen {{ $popup ? 'flex' : 'hidden' }} top-0 left-0 backdrop-blur-sm bg-gray-900 bg-opacity-20 items-center">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0" onclick="@this.popup_false()"></div>

            <div class="w-5/12 flex flex-col mx-auto bg-white rounded-md z-10">
                <div class="flex gap-3 ">
                    <div class="w-1/2 p-5">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4 ">اسم المستفيد
                        </h1>
                        <input wire:model="edit_user_name" type="text" 
                            class="edit_user_name bg-gray-100 rounded-md h-14 border-none w-72">
                            @error('edit_user_name')
                            <span class=" text-red-500">{{ $message }}</span>
                        @enderror
                        <hr class="mt-3 mb-8">

                        <input wire:model="edit_user_email" type="text" hidden 
                            class="edit_user_email bg-gray-100 rounded-md h-14 border-none w-72">


                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">البريد الاكتروني
                        </h1>
                        <input wire:model="edit_user_email" type="text"
                            class="edit_user_email bg-gray-100 rounded-md border-none w-72">
                            @error('edit_user_email')
                            <span class=" text-red-500">{{ $message }}</span>
                        @enderror
                        <hr class="mt-3 mb-8">
                    </div>
                    <div class="w-1/2 p-5">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">رقم الجوال
                        </h1>
                        <input wire:model="edit_user_phone" type="text"
                            class="edit_user_phone bg-gray-100 rounded-md border-none w-72" >
                            @error('edit_user_phone')
                            <span class=" text-red-500">{{ $message }}</span>
                        @enderror
                        <hr class="mt-3 mb-8">

                        <h1 class=" text-gray-700 text-xl font-bold py-3 px-4">كلمة المرور
                        </h1>
                        <input type="checkbox" wire:model="change_pass" class="m-3"><span>هل ترغب في  تعديل كلمة المرور؟</span><br>
                        <input {{ $change_pass?'':'disabled' }} wire:model="edit_user_password" type="text"
                            class="edit_user_password {{ $change_pass?'bg-gray-100':'bg-gray-300' }}  rounded-md border-none w-72" >
                            @error('edit_user_password')
                            <span class=" text-red-500">{{ $message }}</span>
                        @enderror
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
