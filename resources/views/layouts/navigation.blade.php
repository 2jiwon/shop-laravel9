<div class="container relative">
    <div class="relative z-50 py-3 shadow-xs lg:py-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <button x-data="{usedKeyboard: false}"
                    @keydown.window.tab="usedKeyboard = true"
                    @click="$dispatch('open-menu', { open: true })"
                    :class="{'focus:outline-none': !usedKeyboard}">
                    <i class="bx bx-menu text-4xl text-primary"></i>
                </button>
                <a href="/search" class="group ml-2 hidden cursor-pointer rounded-full border-2 border-transparent p-2 transition-colors hover:border-secondary focus:outline-none sm:ml-3 sm:p-4 md:ml-5 lg:mr-8 lg:block">
                    <img src="{{ asset('assets/theme/icons/search.svg') }}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8 opacity-70" alt="icon search"/>
                    <img src="{{ asset('assets/theme/icons/search.svg') }}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon search hover"/>
                </a>

                <button @click="mobileSearch = !mobileSearch" class="group ml-2 block cursor-pointer rounded-full border-2 border-transparent p-2 transition-colors hover:border-secondary focus:outline-none sm:ml-3 sm:p-4 md:ml-5 lg:mr-8 lg:hidden">
                    <img src="{{ asset('assets/theme/icons/search.svg') }}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8 opacity-70" alt="icon search"/>
                    <img src="{{ asset('assets/theme/icons/search.svg') }}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon search hover"/>
                </button>

                <a href="/account/wishlist" class="group hidden rounded-full border-2 border-transparent p-2 transition-all hover:border-secondary sm:p-4 lg:block">
                    <img src="{{ asset('assets/theme/icons/wishlist.svg') }}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8 opacity-70" alt="icon heart"/>
                    <img src="{{ asset('assets/theme/icons/wishlist.svg') }}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon heart hover"/>
                </a>
            </div>

            <!-- 타이틀 로고 -->
            <a href="/">
                <!-- <img src="https://elyssi.redpixelthemes.com/assets/img/logo-elyssi.svg" class="h-auto w-28 sm:w-48" alt="logo"/> -->
                <div class="text-teal-800 font-dohyeon font-extrabold text-xl lg:text-4xl">
                    <h1>FANCYTANK SHOP</h1>
                </div>
            </a>
            
            <div class="flex items-center">
                <a href="/account/dashboard" class="group rounded-full border-2 border-transparent py-2 pr-0 transition-all hover:border-secondary sm:p-4">
                    <img src="{{ asset('assets/theme/icons/profile.svg') }}" class="block h-6 w-6 sm:h-3 sm:w-3 md:h-8 md:w-8 opacity-70" alt="icon user"/>
                    <img src="{{ asset('assets/theme/icons/profile.svg') }}" class="hidden h-6 w-6 sm:h-3 sm:w-3 md:h-8 md:w-8" alt="icon user hover"/>
                </a>

                <a href="/cart" class="group ml-2 hidden rounded-full border-2 border-transparent p-2 transition-all hover:border-secondary sm:ml-3 sm:p-4 md:ml-5 lg:ml-8 lg:block">
                    <img src="{{ asset('assets/theme/icons/cart.svg') }}" class="block h-6 w-6 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8 opacity-70" alt="icon cart"/>
                    <img src="{{ asset('assets/theme/icons/cart.svg') }}" class="hidden h-6 w-6 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon cart hover"/>
                </a>

                <span @click="mobileCart = !mobileCart"
                      class="group ml-2 block rounded-full border-2 border-transparent p-2 transition-all hover:border-secondary sm:ml-3 sm:p-4 md:ml-5 lg:ml-8 lg:hidden">
                    <img src="{{ asset('assets/theme/icons/cart.svg') }}" class="block h-6 w-6 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8 opacity-70" alt="icon cart"/>
                    <img src="{{ asset('assets/theme/icons/cart.svg') }}" class="hidden h-6 w-6 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon cart hover"/>
                </span>
            </div>
        
        </div>
    </div>
</div>
<!-- 로고 & 메뉴 End -->

<section
	x-data="slideout()"
	x-cloak
	@open-menu.window="open = $event.detail.open"
	@keydown.window.tab="usedKeyboard = true"
	@keydown.escape="open = false"
	x-init="init()">
	<div x-show.transition.opacity.duration.500="open"
		@click="open = false"
		class="fixed inset-0 bg-black bg-opacity-25"></div>
	<div class="fixed transition duration-300 left-0 top-0 transform w-full max-w-xs h-screen bg-gray-100 overflow-hidden z-50"
		:class="{'-translate-x-full': !open}">
		<button @click="open = false"
			x-ref="closeButton"
			:class="{'focus:outline-none': !usedKeyboard}"
			class="fixed top-0 right-0 mr-0 mt-2 z-50">
            <i class="bx bx-x mr-6 cursor-pointer text-2xl text-grey-darkest sm:text-3xl"></i>
        </button>
		<div class="p-16 px-6 absolute top-0 w-full h-full overflow-hidden">
            <div class="container font-dohyeon text-3xl text-grey mx-auto px-2 py-2">
                     
                <h2 class="text-2xl font-bold">카테고리 선택</h2>

                <div class="leading-loose text-2xl mt-6">
                    @foreach ($main as $m)
                        <div x-data="{ m: {{ $m }}, isOpen1: false }">
                            <button class="w-full px-3 py-3 flex justify-between items-center mt-4 border-b border-gray-400 hover:bg-secondary hover:text-white" @click="isOpen1 = !isOpen1">
                                
                                <a href="/category/{{ $m->id }}"><div x-text="m.name"></div></a>

                                <svg x-show="!isOpen1" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                                </svg>
                                <svg x-show="isOpen1" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                                </svg>
                            </button>

                            @foreach ($sub1 as $s1)
                                @if ($s1->parent1 == $m->id)
                                <div x-data="{ s1: {{ $s1 }}, isOpen2: false }" x-show="isOpen1">
                                    <button class="w-full pr-3 pl-6 py-3 flex justify-between items-center border-b border-gray-400 hover:bg-secondary hover:text-white" @click="isOpen2 = !isOpen2">

                                        <a href="/category/{{ $s1->id }}"><div class="text-xl hover:text-white" x-text="s1.name"></div></a>

                                        <svg x-show="!isOpen2" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                            <path class="heroicon-ui" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                                        </svg>
                                        <svg x-show="isOpen2" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                            <path class="heroicon-ui" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                                        </svg>
                                    </button>

                                    @foreach ($sub2 as $s2)
                                        @if ($s2->parent1 == $m->id && $s2->parent2 == $s1->id)
                                        <div x-data="{ s2: {{ $s2 }}}" x-show="isOpen2" class="pr-3 pl-12 hover:bg-secondary hover:text-white">
                                             <a href="/category/{{ $s2->id }}"><div class="text-lg mt-2 hover:text-white" x-text="s2.name"></div></a>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            @endforeach

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
	</div>
</section>

<script>
function slideout() {
	return {
		open: false,
		usedKeyboard: false,
		init() {
			this.$watch('open', value => {
				value && this.$refs.closeButton.focus()
				this.toggleOverlay()
			})
			this.toggleOverlay()
		},
		toggleOverlay() {
			document.body.classList[this.open ? 'add' : 'remove']('h-screen', 'overflow-hidden')
		}
	}
}
</script>