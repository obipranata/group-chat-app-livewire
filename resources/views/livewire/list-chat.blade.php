<section id="message" class="relative w-full h-[100%] lg:w-[360px]  mx-auto bg-white lg:mt-5 overflow-y-scroll pb-[100px]">
    <div id="header" class="fixed top-0 w-full lg:w-[360px] flex items-center justify-between px-[16px] h-[56px] bg-[#FAAE2B]">
        <div class="flex gap-[16px] items-center">
            <a href="">
            <img src="./assets/icons/arrow.svg" alt="">
            </a>
            <div class="avatar">
            <img class="w-[40px] h-[40px] rounded-full" src="https://www.sacode.web.id/assets/img/logo/logo-sacode.png" alt="">
            </div>
            <h1 class="font-semibold text-[#00473E] text-[16px]">Sa Code</h1>
        </div>
        <div class="flex gap-[16px]">
            <div>
                <a href="">
                <img src="./assets/icons/search.svg" alt="">
                </a>
            </div>
            <div class="relative" x-data="{isOpen : false}">
                <button @click="isOpen = !isOpen">
                    <img src="./assets/icons/three dots.svg" alt="">
                </button>
                <div 
                    x-cloak 
                    x-show="isOpen" 
                    @click.away="isOpen = false" 
                    class="absolute w-[100px] bg-[#201B84] rounded-lg right-0"
                >
                    <ul class="text-center py-3">
                        <li class="px-3 ">
                            <a wire:click="logout" href="#" class="text-white">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class=" px-[16px] mt-[80px]" wire:poll="getChat">
        @foreach ($listChat as $message)
            {{-- @if (date('Y-m-d') !== $message->created_at->format('Y-m-d'))
                <h3 class="text-center  mb-[28px] text-[12px]">
                    {{$message->created_at->format('l')}}, {{$message->created_at->format('F')}}, {{$message->created_at->format('d')}}, {{$message->created_at->format('Y')}}
                </h3>
            @else
                    <h3 class="text-center mt-[24px] mb-[28px] text-[12px]">
                        Today
                    </h3>
            @endif --}}
            @if ($message->user->id == session()->get('idPengguna'))
                <div class="flex items-center justify-end gap-[16px] mb-[8px]">
                    <span class="text-[10px] text-[##000000]">{{$message->created_at->format('H:i A')}}</span>
                    <div class="w-[145px] bg-[#FAAE2B] px-[16px] py-[12px] rounded-[20px] box-border">
                    <p class="text-[12px]">{{$message->message}}</p>
                    </div>
                    <div class="avatar">
                    <img class="w-[40px] h-[40px] rounded-full" src="{{$message->user->getAvatar()}}" alt="">
                    </div>
                </div>
            @else
                <div class="mb-[8px]">
                    <div class="flex items-center justify-start gap-[16px]">
                        <div class="avatar">
                        <img class="w-[40px] h-[40px] rounded-full" src="{{$message->user->getAvatar()}}" alt="">
                        </div>
                        <div class="w-[145px] bg-[#FAAE2B] px-[16px] py-[12px] rounded-[20px] box-border">
                        <p class="text-[12px]">{{$message->message}}</p>
                        </div>
                        <span class="text-[10px] text-[##000000]">{{$message->created_at->format('H:i A')}}</span>
                    </div>
                    <p class="text-[12px]">{{$message->user->name}}</p>
                </div>
            @endif
        @endforeach
    </div>
        <form wire:submit.prevent="send"  class="fixed bottom-0 w-full lg:w-[360px] ">
            <div class="p-[16px] flex justify-between gap-[2px]">
                <input wire:model="message" class="border-2 border-[#00332C] p-[16px] rounded-[20px] h-[40px] box-border w-full" type="text" name="" id="">
                <button type="submit" class="bg-[#FAAE2B] p-2 rounded-[18px] text-white text-[12px]">Send</button>
            </div>
        </form>
</section>