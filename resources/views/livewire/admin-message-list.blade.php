<div>
    <div class="w-full bg-white p-4 flex flex-col">
        <div class="flex justify-between px-2 py-1 ">
            <div class="">
               عدد الرسائل:  {{count($user_messages)}}  
            </div>
            <div class="">
                <select wire:model="filter_section">
                    <option value="0">الكل</option>
                    @foreach ($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
                <button wire:click="filter_reply(true)" class="m-1 py-2 px-5 rounded-lg bg-gray-900 text-white text-xs">
                    تم الرد
                </button>
                <button wire:click="filter_reply(false)" class="m-1 py-2 px-5 rounded-lg bg-gray-900 text-white text-xs">لم يتم الرد
                </button>
            </div>
        </div>
        @foreach ($user_messages as $user_message)
        <div class="flex w-full mb-2">
         <div class="message_list h-24 flex rounded-md rounded-l-none justify-between   flex-grow">

             <div class="flex flex-col justify-between items-start p-2 py-3">
                 <h1>{{ $user_message->user_name }}</h1>
                 <h1>{{ $user_message->service_name }}</h1>
             </div>

             <div
                 class="message_part flex justify-center items-center  p-3 w-80 text-center mx-5 my-2 text-gray-500 select-none cursor-pointer hover:text-blue-500">
                 <p class=" text-right text-sm ">{{ $user_message->message }}</p>
             </div>
             @if (!is_null($user_message->file_name))
             <div class=" flex justify-center items-center w-16 bg-gray-50 rounded-lg">
                <span wire:click="download('{{$user_message->file_name}}')"
                class=" material-icons text-gray-300 text-lg p-1 rounded-md cursor-pointer select-none hover:text-indigo-500"
                style="font-size: 28px">
                file_download
            </span>
             </div>
             @endif

             <div class="flex flex-col gap-1 justify-around py-2 mx-5">
                 <div class="flex rounded-md  p-1 items-center justify-between ">
                     <div
                         class="material-icons {{ $user_message->contant_type == 'phone' ? 'text-indigo-500' : 'text-gray-300' }} md-24 select-none">
                         phone_iphone
                     </div>
                     <p class=" text-gray-500 text-xs">
                         {{ $user_message->user_phone }}
                     </p>
                     <div class="flex gap-1">
                         <div class="flex justify-center items-center rounded-md bg-white">
                             <a href="https://wa.me/966{{ (int) $user_message->user_phone }}" target="_blank">
                                 <span
                                     class="material-icons text-gray-300 text-sm p-1 rounded-md cursor-pointer select-none hover:text-indigo-500"
                                     style="font-size: 15px ">
                                     send
                                 </span>
                             </a>
                         </div>
                         <div class="flex justify-center items-center rounded-md bg-white">
                             <span
                                 class="copy_num material-icons text-gray-300 text-lg p-1 rounded-md cursor-pointer select-none hover:text-indigo-500"
                                 style="font-size: 15px">
                                 file_copy
                             </span>
                         </div>
                     </div>
                 </div>

                 <div class="flex rounded-md  p-1 items-center justify-between  w-64">
                     <div
                         class="material-icons {{ $user_message->contant_type != 'phone' ? 'text-indigo-500' : 'text-gray-300' }} text-md select-none">
                         mail
                     </div>
                     <p class=" text-gray-500 text-xs">
                         {{ $user_message->user_email }}
                     </p>

                     <div class="flex gap-1">
                         <div class="flex justify-center items-center rounded-md bg-white">
                             <a href="mailto:{{ $user_message->user_email }}">
                                 <span
                                     class="material-icons text-gray-300 text-sm p-1 rounded-md cursor-pointer select-none hover:text-indigo-500"
                                     style="font-size: 15px">
                                     send
                                 </span>
                             </a>
                         </div>
                         <div class="flex justify-center items-center rounded-md bg-white">
                             <span
                                 class="copy_num material-icons text-gray-300 p-1 rounded-md cursor-pointer select-none hover:text-indigo-500"
                                 style="font-size: 15px">
                                 file_copy
                             </span>

                         </div>
                     </div>
                 </div>
             </div>

         </div>
         <div wire:click="reply({{ $user_message->id }},{{ $user_message->reply }})"
             class="send_b flex justify-center items-center {{ $user_message->reply ? 'bg-indigo-500' : 'bg-yellow-500' }} text-white rounded-l-md w-28 select-none cursor-pointer {{ $user_message->reply ? 'shadow-indigo-700' : 'shadow-yellow-700' }} ">
             <p class=" text-xs font-bold ">{{ $user_message->reply ? 'تم الرد' : 'لم يتم الرد' }}</p>
         </div>
     </div>
        @endforeach
     </div>
</div>
