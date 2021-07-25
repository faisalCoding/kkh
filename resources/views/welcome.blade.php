<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <header>
        <div class="white-header w-full flex justify-end items-center  flex-col">
            <img class=" mb-10 w-48" src="{{ asset('assets/main_logo.png') }}">


            <div class="flex bg-main-grd w-full  justify-center items-center main-search relative">
                 <ion-icon name="ios-search" class=" text-gray-400 h-12 bg-white px-3 text-lg text-gray-500"></ion-icon>
                <input type="text" class="w-80 h-12 bg-white border-none pr-0" placeholder="ابحث عن القسم">
                <select class="w-28 h-12 border-none  bg-gray-100" dir="ltr">
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
        </div>
    </nav>
    <div class="container-sections w-8/12 mx-auto flex mt-10 gap-4 flex-wrap">
        @foreach (App\Models\Section::get() as $section)

        <div class="card flex flex-col w-52 overflow-hidden">
            <div class="bg-img w-full relative">
                <img class="w-full up-img-bg-card h-24 object-cover" src="{{ asset('/sections_images/' . $section->image_name) }}" alt="">
                <div class="up-img-bg-card blue-stckr bg-indigo-600 opacity-20 absolute top-0"></div>
            </div>
            <div class="title w-full items-center justify-center flex py-4 ">
                <ion-icon name="git-merge"></ion-icon>
                <h1 class="text-lg text-gray-900">{{  $section->name }}</h1>
            </div>
            <h1 class="text-md text-gray-500">{{  $section->description }}</h1>

            <div class="button">
                <button class=" w-full bg-main-grd-button h-10 flex justify-center items-center ">
                    <h1 class="text-white font-bold">مراسلة</h1>
                </button>
            </div>
        </div>
            
        @endforeach
        
        
    </div>


    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>
