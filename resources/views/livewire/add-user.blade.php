<div class="flex justify-center mt-10">
    <div class="w-10/12 flex flex-col justify-center">

        <h1>اضافة مستفيد جديد</h1>
        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">اسم المستفيد</h1>
            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text" wire:model="new_user_name">
            @error('new_user_name')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">البريد الالكتروني</h1>

            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text" name="email"
                wire:model="new_user_email">
            @error('new_user_email')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">رقم الجوال</h1>

            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text"
                wire:model="new_user_phone">
            @error('new_user_phone')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <h1 class="text-gray-800 text-xl py-3 ">كلمة المرور</h1>

            <input class="bg-gray-100 rounded-md h-14 border-none w-96" type="text"
                wire:model="new_user_password">
            @error('new_user_password')
                <span class=" text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="py-2">
            <button
                class="rounded-md w-52 h-14 text-white font-bold flex justify-center items-center bg-main-grd-button"
                wire:click="addNewUser">اضف</button>
        </div>

    </div>

</div>
