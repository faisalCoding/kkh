<div>


    @if ($success_popup)
    <div
        class="popup_notify popup fixed w-screen h-screen flex justify-center top-0 left-0 bg-gray-800 min-full-screen-height items-center z-10 select-none">
        <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0"></div>
        <div
            class="success-popup w-10/12 sm:w-5/12 lg:w-4/12  bg-gray-700 h-80 rounded-3xl flex flex-col items-center overflow-x-hidden z-50">
            <div class=" flex-grow flex justify-center items-center">
                <span
                    class="material-icons text-4xl text-green-300 p-7 bg-green-300 bg-opacity-10 rounded-full success-popup anim-del-1000">
                    done
                </span>
            </div>
            <div class="text-gray-200 p-4 pt-0">

                @if ($success_login)
                <div class="flex justify-center">
                    <span class="material-icons text-2xl success-popup anim-del-600">
                        done
                    </span>
                    <h1>
                        تم تسجيل الدخول
                    </h1>
                </div>
                @endif

                @if ($success_send)
                <div class="flex justify-center"> <span class="material-icons text-2xl anim-del-600">
                        done
                    </span>
                    <h1>
                        تم ارسال الرسالة
                    </h1>
                </div>
                @endif
            </div>
            <div onclick="@this.popupNotify_false()"
                class="w-full bg-white flex justify-center items-center text-lg text-blue-500 py-5 cursor-pointer">
                <h1>حسناً</h1>
            </div>
        </div>
    </div>
    @endif


    <header>
        <div class="h-12 text-white items-center justify-between px-4 py-1 bg-gray-800 w-full flex">
            @if (Auth::check())
            <h1 class="p-2 rounded-md bg-white bg-opacity-5">{{ Auth::user()->name }}</h1>
            <div class=" flex-grow px-12 ">
                <div class="relative flex justify-start w-10" x-data="{ open: false }">
                    <span class="material-icons" @click="open = true">
                        message
                    </span>
                    <div
                        class=" w-5 h-5 rounded-full bg-blue-500 text-center flex justify-center items-end text-xs absolute left-0 top-0">
                        {{ Auth::user()->userMessage()->count() }}</div>

                    <div x-show="open" @click.away="open = false"
                        class=" w-52 rounded-md shadow-lg  bg-white text-gray-700 text-center flex flex-col justify-center items-end text-xs absolute top-7 right-0 overflow-hidden z-50">
                        @foreach (Auth::user()->userMessage()->latest()->get()
                        as $userMessage)
                        <div
                            class=" w-full h-10 border-b-2 border-gray-100 p-2 flex items-center justify-between hover:bg-gray-100 cursor-pointer select-none">
                            <h1>{{ mb_substr($userMessage->message, 0, 30, 'UTF-8') }}... </h1>
                            <div class="w-2 h-2 rounded-full   bg-{{ $userMessage->reply ? 'green' : 'yellow' }}-400">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <form wire:submit.prevent="submitLoguot" method="post">@csrf<input type="submit"
                    class="bg-gray-700 text-white px-4 py-1 rounded-md" value=" تسجيل خروج"></form>
            @else
            <a class="bg-gray-700 text-white px-4 py-1 rounded-md" href="{{ route('login') }}">تسجيل دخول</a>

            @endif
        </div>
        <div class="white-header w-full flex justify-end items-center  flex-col">
            <img class=" mb-10 w-48" src="{{ asset('assets/main_logo.png') }}">


            <div class="flex bg-main-grd w-full  justify-center items-center main-search relative">

                <input type="text" class="w-80 h-12 bg-white border-none pr-0" wire:model.lazy="searcheee">
                <select class="w-28 h-12 border-none  bg-gray-100" dir="ltr" wire:model.lazy="selector">
                    <option value="1">الادارة</option>
                    <option value="12">ابو محمد </option>
                    <option value="13">خوخ</option>
                </select>
            </div>
        </div>
    </header>
    <nav class="flex flex-col items-center w-full nav">

        <div class="row-section w-8/12 flex justify-start items-end pr-9 pt-3 text-xl relative text-white">
            <div class="circle">
                <div class="point"></div>
            </div>
            <h1 class="sub-h1-white mt-4 mb-1">اقسام المستشفى</h1>
        </div>
    </nav>
    <div class="container-sections w-8/12 mx-auto flex mt-10 flex-wrap flex-col">

        <div class="h-52">
            <div class="lined w-2  bg-gray-100 flex-shrink-0" style="    height: inherit;"></div>
        </div>
        @foreach ($sections as $section)

        <div class="card flex  " style=" order:{{ $section->order_by }};">

            <div class="lined w-2  bg-gray-100 flex-shrink-0"></div>

            <div class="flex flex-col pr-4 ">

                <div class=" flex flex-col p-4 ">
                    <h1 class="h1 ">{{ $section->name }}</h1>

                    <h1 class="sub-h1 ">{{ $section->description }}</h1>
                </div>

                {{-- <img class="w-full up-img-bg-card h-24 object-cover"
                    src="{{ asset('/sections_images/' . $section->image_name) }}" alt=""> --}}


                <div class="button mb-20 mt-7">
                    <button wire:click="cardBotton('{{ $section->id }}')"
                        class=" w-full  h-14 flex justify-start items-center ">
                        <h1 class="text-black underline text-xl font-bold">مراسلة القسم ></h1>
                    </button>
                </div>
            </div>
        </div>

        @endforeach

        <script>

        </script>





        <div
            class="popup fixed w-screen h-screen bg-white {{ $popup ? 'flex' : 'hidden' }} top-0 left-0  min-full-screen-height items-start z-50">


            <div
                class="w-full flex flex-col mx-auto items-center h-screen sm:w-11/12 lg:w-6/12 rounded-t-2xl z-10 goup overflow-auto pt-32 ">

                <div
                    class=" flex items-center w-full shadow-md justify-between absolute top-0 right-0 bg-gray-50 px-3 sm:px-8 ">

                    <h1 class="py-5 text-gray-900 text-2xl">
                        مراسلة :
                        @if (App\Models\Section::find($section_id))
                        {{ App\Models\Section::find($section_id)->name }}
                        @endif
                    </h1>
                    <div class="popup_clouse flex justify-end items-center w-14 h-14 top-0 left-0 z-20 select-none cursor-pointer"
                        onclick="@this.popup_false()"> <span
                            class="material-icons text-2xl success-popup anim-del-600 text-blue-700 underline">
                            arrow_back_ios </span></div>
                </div>
                <div class="flex flex-col sm:flex-row justify-between w-11/12">

                    <div class="flex flex-col w-full sm:w-6/12 ">
                        <h1 class="py-3 text-lg text-gray-700 pb-6">رقم الجوال</h1>

                        @if (Auth::check())
                        <h1>{{ Auth::user()->phone }}</h1>

                        @else
                        <input wire:model.lazy.lazy="new_user_phone" class="bg-gray-100 rounded-md h-14 border-none w-11/12"
                            type="text" name="" id="">
                        @error('new_user_phone')
                        <span class=" text-red-600">{{ $message }}</span>
                        @enderror

                        @endif

                        <h1 class="py-3 text-lg text-gray-700 pt-10 pb-6">اسم المرسل</h1>

                        @if (Auth::check())
                        <h1>{{ Auth::user()->name }}</h1>

                        @else
                        <input wire:model.lazy.lazy="new_user_name" class="bg-gray-100 rounded-md h-14 border-none w-11/12"
                            type="text" name="" id="">
                        @error('new_user_name')
                        <span class=" text-red-600">{{ $message }}</span>
                        @enderror
                        @endif


                    </div>
                    <div class="flex flex-col w-6/12">
                        <h1 class="py-3 text-lg text-gray-700 pb-6">نوع الرسالة</h1>
                        <select wire:model.lazy.lazy="service_id" required>
                            <option>حدد نوع الرسالة</option>
                            @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                        <span class=" text-red-600">{{ $message }}</span>
                        @enderror

                        <div class="flex flex-col pt-10">
                            <h1 class="py-3 text-lg text-gray-700 pb-6">طريقة الرد</h1>
                            <div class="flex gap-4 flex-col">
                                <div class="flex items-center gap-2">
                                    <input id="email" wire:model.lazy.lazy="new_user_contant_type_message" value="mail"
                                        required class="bg-gray-100 rounded-md h-6  cursor-pointer border-none w-6"
                                        type="radio" name="contant_type" id="">
                                    <label class="flex items-center cursor-pointer" for="email">
                                        <span class="material-icons text-gray-400 mx-2">
                                            mail
                                        </span>عبر البريد الاكتروني</label>


                                </div>
                                <div class="flex items-center gap-2">
                                    <input id="phone" wire:model.lazy.lazy="new_user_contant_type_message" value="phone"
                                        required class="bg-gray-100 rounded-md h-6  cursor-pointer border-none w-6"
                                        type="radio" name="contant_type" id=""><label
                                        class="flex items-center cursor-pointer" for="phone"> <span
                                            class="material-icons text-gray-400 mx-2">
                                            phone
                                        </span>عبر الواتس اب</label>


                                </div>
                            </div>
                            @error('new_user_contant_type_message')
                            <span class=" text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <label for="uploudfile"
                    class="flex flex-col bg-gray-50 rounded-lg w-10/12 mt-10 justify-center items-center p-4">

                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">

                        <input type="file" wire:model.lazy="file" id="uploudfile">

                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                        <div wire:loading wire:target="file" class="text-md text-blue-600 block">جاري تحميل</div>
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>


                        @error('file')
                        <span class=" text-red-500">{{ $message }}</span>
                        @enderror

                    </div>
                </label>
                <div class="flex flex-col w-10/12">
                    @error('new_user_message')
                    <span class=" text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-center items-end  mt-10">
                        <textarea wire:model.lazy.lazy="new_user_message" class=" rounded-t-2xl w-full" cols="30"
                            rows="10"></textarea>

                    </div>
                </div>
                <button
                    class="flex justify-center items-center rounded-b-2xl w-10/12 text-white text-lg py-4 mb-7  bg-gray-900"
                    wire:click="senMessage">
                    ارسال
                </button>
                <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

            </div>
        </div>















        {{--  --}}
        @if ($popupToLogin)
        <div
            class="popup fixed w-screen h-screen flex top-0 left-0 bg-gray-800 min-full-screen-height items-center z-50 ">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0" onclick="@this.popupToLogin_false()">
            </div>

            <div
                class="w-full sm:w-full md:w-5/12 lg:w-4/12 flex flex-col mx-auto items-center bg-white rounded-xl z-10 goup overflow-hidden">
                <div class="flex justify-center w-11/12">
                    <div class="flex flex-col ">
                        <h1 class="py-3 text-lg bg-opacity-30 rounded-lg m-1">انت فعلا
                            مسجل لديا باسم <span class="bg-gray-100 rounded-lg m-1">
                                {{ $login_user_name }}</span></h1>
                        <h1 class="py-3 text-md bg-opacity-30 rounded-lg m-1" bg-yellow-100>قم بادخال كلمة المرور
                            المسجلة بهذا الرقم <span
                                class="bg-white text-blue-700 rounded-lg m-1">{{ $new_user_phone }}</span></h1>


                        <form wire:submit.prevent="submit" method="POST" method="POST" id="form" class="m-2"
                            dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                            @csrf

                            <div class="mt-4">
                                <x-jet-label for="password" class="py-3 text-lg text-gray-700 "
                                    value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                    wire:model.lazy="password" required autocomplete="current-password" />
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="flex items-center justify-end mt-4">

                                <x-jet-button class="ml-4">
                                    {{ __('Log in') }}
                                </x-jet-button>
                            </div>

                        </form>
                    </div>

                </div>

                <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

            </div>
        </div>
        @endif

    </div>















    {{--  --}}
    @if ($popupToCreate)
    <div class="popup fixed w-screen h-screen flex top-0 left-0 bg-gray-800 min-full-screen-height items-center z-50">
        <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0" onclick="@this.popupToCreate_false()">
        </div>

        <div class="w-full sm:w-full md:w-7/12  lg:w-5/12 flex flex-col mx-auto items-center bg-white rounded-xl z-10 goup overflow-hidden">
            <div class="flex justify-center w-11/12">
                <div class="flex flex-col w-6/12">

                    <form wire:submit.prevent="submit" method="POST" id="form" class="m-2"
                        dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                        @csrf

                        <div class="mt-4">
                            <x-jet-label for="name" class="py-3 text-lg text-gray-700 " value="{{ __('Name') }}" />
                            <input id="name" wire:model.lazy="new_user_name" type="text" />
                            @error('new_user_name')
                            <span class=" text-sm text-red-700 block"> {{ $message }} </span>
                            @enderror

                        </div>


                        <div class="mt-4">
                            <x-jet-label for="phone" class="py-3 text-lg text-gray-700 " value="{{ __('phone') }}" />
                            <input id="phone" wire:model.lazy="new_user_phone" type="text" />
                            @error('new_user_phone')
                            <span class=" text-sm text-red-700 block"> {{ $message }} </span>
                            @enderror

                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" class="py-3 text-lg text-gray-700 "
                                value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model.lazy="password"
                                required />

                            @error('password')
                            <span class=" text-sm text-red-700 block"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" class="py-3 text-lg text-gray-700 "
                                value="اعد كتابة كلمة المرور" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                wire:model.lazy="password_confirmation" required autocomplete="current-password" />
                            <span
                                class="text-sm py-1 px-3 {{ $confirmation ? 'bg-green-300' : 'bg-gray-300' }}">{{ $confirmation ? 'كلمة المرور متطابقة' : 'يجب ان تتطابق كلمة المرور' }}</span>


                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-jet-button class="ml-4">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>

            </div>

            <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

        </div>
    </div>
    @endif

</div>

</div>