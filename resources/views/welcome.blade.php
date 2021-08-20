<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ config('app.locale') == 'ar' ? 'rtl' : 'ltr' }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <span class=" bg-yellow-400 bg-green-400"></span>
    @livewire('main-page')



    <footer
        class="footer bg-white relative pt-1 border-b-2 text-white border-blue-700 mt-10 w-12/12 md:w-12/12 rounded-md mx-auto flex flex-col pt-10">
        <div class="container mx-auto px-6 flex flex-col">
            
            <div class="flex justify-around items-center flex-col sm:mt-8 sm:flex-col lg:flex-row ">



                <div class="flex justify-around  bg-gradient-to-r from-white to-gray-200 text-gray-600 p-3 py-2 rounded-md border-r-white border-r-2 border-b-white border-b-2">

                    <div class="flex flex-col px-3 h-12 justify-center items-center">
                        <span class="material-icons text-lg anim-del-600">
                            feedback
                        </span>
                        <h1 class='text-sm font-bold'>التغذية الراجعة</h1>
                    </div>
    
                    <div class="flex flex-col px-3 h-12 justify-center items-center border-r-2 border-l-2 border-gray-700 rounded-md">
                        <span class="material-icons text-lg anim-del-600">
                            headset_mic
                        </span>
                        <h1 class='text-sm font-bold'>الدعم الفني</h1>
                    </div>
    
                    <div class="flex flex-col px-3 h-12 justify-center items-center">
                        <span class="material-icons text-lg anim-del-600">
                            location_on
                        </span>
                        <h1 class='text-sm font-bold'>موقع المستشفى</h1>
                    </div>
    
                </div>
    




                <div class="flex flex-col justify-center items-center my-12 border-r-2 border-l-2 border-gray-700 px-5">
                    <div class=" font-bold">وسائط التواصل الاجتماعي</div>
                    <div class="  my-3 h-1 w-full bg-opacity-10"></div>
                    <div class="flex justify-around w-full">
                        <ion-icon name="logo-facebook" class=" text-blue-500" size="large"></ion-icon>
                        <ion-icon name="logo-twitter" size="large" class=" text-blue-300"></ion-icon>
                         <ion-icon name="logo-youtube" size="large" class=" text-red-400"></ion-icon>
                    </div>
                </div>



           


            </div>
        </div>


        <div
        class="link-box mt-8 sm:w-col sm:min-w-min sm:mt-0 rounded-lg items-center lg:w-auto text-center sm:px-4 flex flex-col md:flex-col justify-between  text-white py-4">
        <div class="flex text-white items-start flex-wrap">

            <span class=" rounded-sm p-2 text-sm bg-white bg-opacity-5 m-1   text-white">
                <span class="p-1  bg-white bg-opacity-5 rounded-md">فكرة :</span> فهد صغير الشمر
            </span>
            <span class=" rounded-sm p-2 text-sm bg-white bg-opacity-5 m-1  ">
                <span class="p-1  bg-white bg-opacity-5 rounded-md">إشراف عام :</span> وليد منسي الشمر
            </span>
            <span class=" rounded-sm p-2 text-sm bg-white bg-opacity-5 m-1  ">
                <span class="p-1  bg-white bg-opacity-5 rounded-md">إعداد و اشراف :</span> يزيد سعود الطوير
            </span>

            <span class=" rounded-sm p-2 text-sm bg-white bg-opacity-5 m-1  ">
                <span class="p-1  bg-white bg-opacity-5 rounded-md">إشراف تقني :</span> محمد دعيع الرشيد
            </span>
        </div>
    </div>


        <div class="container mx-auto px-6">
            <div class="mt-5 border-t-2 border-gray-300 flex flex-col items-center">
                <div class="sm:w-11/12 text-center py-6 flex flex-col justify-center">
                    <div class=""><img class=" mb-10 w-48 filter invert" src="{{ asset('assets/seehah.png') }}"></div>
                    <p class="text-sm mb-2">
                        © 2021 مستشفى الملك خالد بحائل
                    </p>
                    <p class="text-sm   mb-2 flex-grow flex justify-end self-start leading-loose">
                        تطوير: فيصل عنايةالله بخش - بكج
                    </p>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>
