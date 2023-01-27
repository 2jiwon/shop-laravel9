<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Uid -->
        <div>
            <x-input-label for="uid" :value="__('아이디')" />
            <x-text-input id="uid" class="block mt-1 w-full" type="text" name="uid" :value="old('uid')" required autofocus />
            <x-input-error :messages="$errors->get('uid')" class="mt-2" />
        </div>

        <!-- Nickname -->
        <div class="mt-4">
            <x-input-label for="nickname" :value="__('이름')" />
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" required autofocus />
            <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('이메일 주소')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('비밀번호')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('비밀번호 확인')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="nickname" :value="__('핸드폰 번호')" />
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        
         <div class="flex items-center justify-start mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('기존 계정이 있으신가요?') }}
            </a>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
