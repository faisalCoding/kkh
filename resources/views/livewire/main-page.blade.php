<div>


    @if ($success_popup)
        <div
            class="popup_notify popup fixed w-screen h-screen flex justify-center top-0 left-0 bg-gray-800 min-full-screen-height items-center z-10 select-none">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0"></div>
            <div
                class="success-popup w-5/12 bg-gray-700 h-80 rounded-3xl flex flex-col items-center overflow-x-hidden z-50">
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
                    <div class="relative flex justify-start w-10">
                        <span class="material-icons">
                            message
                        </span>
                        <div
                             class=" w-5 h-5 rounded-full bg-blue-500 text-center flex justify-center items-end text-xs absolute left-0 top-0">
                            {{ Auth::user()->userMessage()->count() }}</div>

                            <div
                              class=" w-52 rounded-md shadow-lg  bg-white text-gray-700 text-center flex flex-col justify-center items-end text-xs absolute top-7 right-0 overflow-hidden">
                            @foreach (Auth::user()->userMessage()->latest()->get() as $userMessage )
                                <div class=" w-full h-10 border-b-2 border-gray-100 p-2 flex items-center justify-between hover:bg-gray-100 cursor-pointer select-none">
                                    <h1>{{ mb_substr($userMessage->message,0,30,'UTF-8') }}... </h1>
                                    <div class="w-2 h-2 rounded-full   bg-{{ $userMessage->reply?"green":"yellow" }}-400"></div>
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
                <span class="material-icons">
                    search
                </span>
                <input type="text" class="w-80 h-12 bg-white border-none pr-0" wire:model="searcheee">
                <select class="w-28 h-12 border-none  bg-gray-100" dir="ltr" wire:model="selector">
                    <option value="1">الادارة</option>
                    <option value="12">ابو محمد </option>
                    <option value="13">خوخ</option>
                </select>
            </div>
        </div>
    </header>
    <nav class="flex flex-col items-center w-full nav">
        <div class="nan-menu">
            <ul class="flex justify-center w-full pb-12 pt-3 text-gray text-lg">
                <li class="py-3 px-10 bg-white"><a href="#">تواصل مع الادراة</a></li>
                <li class="py-3 px-10 bg-white"><a href="#">موقع المستشقى</a></li>
                <li class="py-3 px-10 bg-white"><a href="#">من نحن</a></li>
            </ul>
        </div>
        <div class="row-section flex justify-center py-4 text-xl text-white">
            <h1>اقسام المستشفى</h1>
            @if (Auth::check())
                <h1>{{ Auth::user()->name }}</h1>
            @else
                <h1>no</h1>
            @endif
        </div>
    </nav>
    <div class="container-sections w-8/12 mx-auto flex mt-10 gap-4 flex-wrap">
        @foreach ($sections as $section)

            <div class="card flex flex-col w-72 overflow-hidden rounded-2xl "
                style=" order:{{ $section->order_by }};">

                <img class="w-full up-img-bg-card h-24 object-cover"
                    src="{{ asset('/sections_images/' . $section->image_name) }}" alt="">

                <div class="h-32 flex flex-col p-4 bg-section-card-content">
                    <h1 class="text-lg text-white font-bold ">{{ $section->name }}</h1>

                    <h1 class="text-md text-white opacity-80 ">{{ $section->description }}</h1>
                </div>
                <div class="grt-line w-full"></div>
                <div class="button">
                    <button wire:click="cardBotton('{{ $section->id }}')"
                        class=" w-full bg-main-dark-button h-14 flex justify-center items-center ">
                        <h1 class="text-white text-xl font-bold">مراسلة</h1>
                    </button>
                </div>
            </div>

        @endforeach















        <div
            class="popup fixed w-screen h-screen {{ $popup ? 'flex' : 'hidden' }} top-0 left-0  min-full-screen-height items-end">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0" onclick="@this.popup_false()"></div>

            <div class="w-11/12 flex flex-col mx-auto items-center bg-white rounded-t-2xl z-10 goup ">
                <div class="flex justify-between w-11/12">
                    <div class="flex flex-col w-6/12">
                        <h1 class="py-3 text-lg text-gray-700 ">رقم الجوال</h1>

                        @if (Auth::check())
                            <h1>{{ Auth::user()->phone }}</h1>

                        @else
                            <input wire:model="new_user_phone" class="bg-gray-100 rounded-md h-14 border-none w-11/12"
                                type="text" name="" id="">
                            @error('new_user_phone')
                                <span>{{ $message }}</span>
                            @enderror

                        @endif

                        <h1 class="py-3 text-lg text-gray-700 ">اسم المرسل</h1>

                        @if (Auth::check())
                            <h1>{{ Auth::user()->name }}</h1>

                        @else
                            <input wire:model="new_user_name" class="bg-gray-100 rounded-md h-14 border-none w-11/12"
                                type="text" name="" id="">
                            @error('new_user_name')
                                <span>{{ $message }}</span>
                            @enderror
                        @endif


                    </div>
                    <div class="flex flex-col w-6/12">
                        <h1 class="py-3 text-lg text-gray-700 ">نوع الرسالة</h1>
                        <select wire:model="service_id" required>
                            <option>حدد نوع الرسالة</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <span>{{ $message }}</span>
                        @enderror

                        <div class="flex flex-col">
                            <h1 class="py-3 text-lg text-gray-700 ">طريقة الرد</h1>
                            <div class="flex ">
                                <input wire:model="new_user_contant_type_message" value="mail" required
                                    class="bg-gray-100 rounded-md h-14 border-none w-6 mb-2" type="radio"
                                    name="contant_type" id="">
                                <span class="material-icons">
                                    mail
                                </span>
                            </div>
                            <div class="flex">
                                <input wire:model="new_user_contant_type_message" value="phone" required
                                    class="bg-gray-100 rounded-md h-14 border-none w-6 mb-2" type="radio"
                                    name="contant_type" id="">
                                <span class="material-icons">
                                    phone
                                </span>
                            </div>
                            @error('new_user_contant_type_message')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-end w-10/12 mt-10">
                    <textarea wire:model="new_user_message" class=" rounded-t-2xl w-full" cols="30"
                        rows="10"></textarea>
                    @error('new_user_message')
                        <span>{{ $message }}</span>
                    @enderror
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
                class="popup fixed w-screen h-screen flex top-0 left-0 bg-gray-800 min-full-screen-height items-center">
                <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0"
                    onclick="@this.popupToLogin_false()">
                </div>

                <div class="w-5/12 flex flex-col mx-auto items-center bg-white rounded-xl z-10 goup overflow-hidden">
                    <div class="flex justify-center w-11/12">
                        <div class="flex flex-col w-6/12">
                            <h1 class="py-3 text-lg text-blue-600 p-5 bg-blue-100 bg-opacity-30 rounded-lg m-1">انت فعلا
                                مسجل لديا باسم <span class="bg-blue-200 rounded-lg m-1">
                                    {{ $login_user_name }}</span></h1>
                            <h1 class="py-3 text-md text-yellow-600 p-5 bg-yellow-100 bg-opacity-30 rounded-lg m-1"
                                bg-yellow-100>قم بادخال كلمة المرور المسجلة بهذا الرقم <span
                                    class="bg-white text-gray-400 rounded-lg m-1">{{ $new_user_phone }}</span></h1>


                            <form wire:submit.prevent="submit" method="POST" method="POST" id="form" class="m-2"
                                dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                                @csrf

                                <div class="mt-4">
                                    <x-jet-label for="password" class="py-3 text-lg text-gray-700 "
                                        value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                        wire:model="password" required autocomplete="current-password" />
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request', config('app.locale')) }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

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
        <div class="popup fixed w-screen h-screen flex top-0 left-0 bg-gray-800 min-full-screen-height items-center">
            <div class="popup_clouse fixed w-screen h-screen  top-0 left-0 z-0" onclick="@this.popupToCreate_false()">
            </div>

            <div class="w-5/12 flex flex-col mx-auto items-center bg-white rounded-xl z-10 goup overflow-hidden">
                <div class="flex justify-center w-11/12">
                    <div class="flex flex-col w-6/12">

                        <form wire:submit.prevent="submit" method="POST" method="POST" id="form" class="m-2"
                            dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
                            @csrf

                            <div class="mt-4">
                                <x-jet-label for="name" class="py-3 text-lg text-gray-700 "
                                    value="{{ __('Name') }}" />
                                <input id="name" wire:model="new_user_name" type="text" />
                                @error($new_user_name)
                                    <span> {{ $message }} </span>
                                @enderror

                            </div>


                            <div class="mt-4">
                                <x-jet-label for="phone" class="py-3 text-lg text-gray-700 "
                                    value="{{ __('phone') }}" />
                                <input id="phone" wire:model="new_user_phone" type="text" />
                                @error($new_user_phone)
                                    <span> {{ $message }} </span>
                                @enderror

                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" class="py-3 text-lg text-gray-700 "
                                    value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                    wire:model="password" required />

                                @error($password)
                                    <span> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" class="py-3 text-lg text-gray-700 "
                                    value="{{ __('password_confirmation') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    wire:model="password_confirmation" required autocomplete="current-password" />
                                <span
                                    class="text-sm py-1 px-3 {{ $confirmation ? 'bg-green-300' : 'bg-gray-300' }}">{{ $confirmation ? 'كلمة المرور متطابقة' : 'يجب ان تتطابق كلمة المرور' }}</span>


                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('password.request', config('app.locale')) }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

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
