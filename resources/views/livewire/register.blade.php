<section id="message" class="mx-auto rounded-lg bg-white w-full h-[100vh] lg:w-[360px] lg:mt-5">

    <div id="header" class="flex items-center justify-center px-[16px] w-full h-[56px] bg-[#FAAE2B]">
        <h1 class="font-semibold text-[#00473E] text-[16px]">Register</h1>
    </div>

    <form wire:submit.prevent="register">
        <div class="p-[16px]">
            <input wire:model="name" class="border-2 border-[#00332C] p-[16px] rounded-[20px] h-[40px] box-border w-full" type="text" name="name" placeholder="name">
            @error('name')
                <span class="text-red-500 text-[12px]">{{$message}}</span>
            @enderror
        </div>
        <div class="p-[16px]">
            <input wire:model="email" class="border-2 border-[#00332C] p-[16px] rounded-[20px] h-[40px] box-border w-full" type="text" name="email" placeholder="email">
            @error('email')
                <span class="text-red-500 text-[12px]">{{$message}}</span>
            @enderror
        </div>
        <div class="p-[16px]">
            <input wire:model="password" class="border-2 border-[#00332C] p-[16px] rounded-[20px] h-[40px] box-border w-full" type="password"  placeholder="password">
        </div>
        <div class="p-[16px]">
            <input wire:model="password_confirmation" class="border-2 border-[#00332C] p-[16px] rounded-[20px] h-[40px] box-border w-full" type="password" placeholder="confirm password">
            @error('password')
                <span class="text-red-500 text-[12px]">{{$message}}</span>
            @enderror
        </div>
        <div class="p-[16px]">
            <button type="submit" class="w-full bg-[#00332C] text-white rounded-[20px] p-3">Sign Up</button>
        </div>
        <div class="flex justify-center">
            <a href="/login" class="text-center">Login</a>
        </div>
    </form>
</section>
