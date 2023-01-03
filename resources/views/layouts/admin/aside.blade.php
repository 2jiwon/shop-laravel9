<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        </div>

        <!-- Navigation Links -->
        <nav class="text-white text-base font-semibold pt-3">
            <x-admin.nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                <x-slot:icon class="fa-tachometer-alt"></x-slot>
                {{ __('Dashboard') }}
            </x-admin.nav-link>

            <x-admin.nav-link :href="route('admin.products')" :active="request()->routeIs('admin.products')">
                <x-slot:icon class="fa-sticky-note"></x-slot>
                {{ __('상품 관리') }}
            </x-admin.nav-link>

            <x-admin.nav-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')">
                <x-slot:icon class="fa-table"></x-slot>
                {{ __('주문 관리') }}
            </x-admin.nav-link>

            <x-admin.nav-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')">
                <x-slot:icon class="fa-table"></x-slot>
                {{ __('카테고리 관리') }}
            </x-admin.nav-link>

            <x-admin.nav-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')">
                <x-slot:icon class="fa-table"></x-slot>
                {{ __('회원 관리') }}
            </x-admin.nav-link>
        </nav>

        <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Something button
        </a>
    </aside>