@include('layouts.head')

        <div class="min-h-screen flex flex-col sm:justify-top items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="{{ request()->routeIs('login') ? '' : 'hidden' }} w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <a href="/register">
                    아직 회원이 아니신가요?
                    <x-primary-button class="ml-3 btn-primary">
                        {{ __('회원가입') }}
                     </x-primary-button>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

@include('layouts.foot')
