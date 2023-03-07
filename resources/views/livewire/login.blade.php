<section id="message" class="mx-auto rounded-lg bg-white w-full h-[100vh] lg:w-[360px] lg:mt-5">

    <div id="header" class="flex items-center justify-center px-[16px] w-full h-[56px] bg-[#FAAE2B]">
        <h1 class="font-semibold text-[#00473E] text-[16px]">Login</h1>
    </div>

    <form wire:submit.prevent="login">
        <div class="p-[16px]">
            <input wire:model="email" class="border-2 border-[#00332C] p-[16px] rounded-[20px] h-[40px] box-border w-full" type="text" name="email" placeholder="email">
        </div>
        <div class="p-[16px]">
            <input wire:model="password" class="border-2 border-[#00332C] p-[16px] rounded-[20px] h-[40px] box-border w-full" type="password" name="password" placeholder="password">
            @if(session()->get('messageError'))
                <span class="text-[12px] text-red-500">{{session()->get('messageError')}}</span>
            @endif
        </div>
        <div class="p-[16px]">
            <button type="submit" class="w-full bg-[#00332C] text-white rounded-[20px] p-3">Login</button>
        </div>
        <div class="flex justify-center">
            <a href="/register" class="text-center">Register</a>
        </div>
    </form>
</section>
