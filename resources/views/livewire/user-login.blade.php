<div class=" w-full h-screen m-0 bg-gray-200 flex justify-center items-center">

    <div x-data="{ open: false }" x-on:click="$wire.toggleShowMessage()" >
        <div x-show="$wire.showMessage" class=" w-full md:w-8/12 lg:w-96 absolute translate-x-1/2 bg-yellow-50 text-center text-yellow-700 top-0 right-1/2 px-7 py-3">
        <span >
            البيانات المدخلة غير متوافقة مع بياناتنا
        </span>
     </div>
    </div>

    <div class="flex flex-col relative  w-full md:w-8/12 lg:w-96 shadow-md h- rounded-sm px-7 bg-white pt-16" style="height:fit-content">
        <div class="bg-main-grd flex justify-items-start items-center text-white absolute w-full right-0 h-14 top-0 pr-3">
            <h1 class="font-bold text-lg mt-2">تسجيل دخول</h1>
        </div>
        <h2 class=" font-bold text-md mt-4">رقم الجوال</h2>
        <input type="text" wire:model.lazy="phone" class=" bg-gray-100 rounded-md mt-4 border-none">
        @error('phone')
            <h3 class=" text-sm text-red-700 mt-1 pr-2 ">{{$message}}</h3>
        @enderror
        
        <h2 class=" font-bold text-md mt-4">كلمة المرور</h2>
        <input type="password" wire:model.lazy="password" class=" bg-gray-100 rounded-md mt-4 border-none">
        @error('password')
        <h3 class=" text-sm text-red-700 mt-1 pr-2 ">{{$message}}</h3>
        @enderror

        <button  wire:click="check" class=" self-end bg-gray-800 text-white rounded-md border-none shadow-md px-5 py-1 my-4 text-lg">
            تسجيل
        </button>
    </div>
</div>
