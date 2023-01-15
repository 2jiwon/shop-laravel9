<div class="container border-t border-grey-dark">
  <div class="flex flex-col justify-between pt-10 pb-12 sm:pt-12 sm:pb-20 lg:flex-row lg:pb-24">

    <!-- 왼쪽 사이드 메뉴 -->
    <div class="lg:w-1/4">
      <p class="pb-6 font-dohyeon text-2xl text-secondary sm:text-3xl lg:text-4xl">
        {{ __('내 쇼핑') }}
      </p>
      <nav class="flex flex-col pl-3">
        <x-nav-link :href="route('account.dashboard')" :active="request()->routeIs('account.dashboard')">
          {{ __('주문현황') }}
        </x-nav-link>
        <x-nav-link :href="route('account.orders')" :active="request()->routeIs('account.orders')">
          {{ __('주문내역') }}
        </x-nav-link>
         <x-nav-link :href="route('account.cart')" :active="request()->routeIs('account.cart')">
          {{ __('장바구니') }}
        </x-nav-link>
        <x-nav-link :href="route('account.wishlist')" :active="request()->routeIs('account.wishlist')">
          {{ __('위시리스트') }}
        </x-nav-link>
         <x-nav-link :href="route('account.reviews')" :active="request()->routeIs('account.reviews')">
          {{ __('리뷰관리') }}
        </x-nav-link>
         <x-nav-link :href="route('account.details')" :active="request()->routeIs('account.details')">
          {{ __('내 정보관리') }}
        </x-nav-link>
      </nav>

      <a href="/logout" class="mt-24 hidden md:inline-block rounded border border-primary px-8 py-3 font-nanumgothic font-bold text-primary transition-all hover:bg-primary hover:text-white">로그아웃</a>
    </div>
    <!-- 왼쪽 사이드 메뉴 End -->