@include('layouts.head')

<div>

  <!-- container 시작 -->
  <div class="container">

    <!-- collection 배너 -->
    <div class="relative flex">
      <div class="ml-auto h-56 w-3/4 bg-cover bg-center bg-no-repeat lg:h-68"
        style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/hero-image-04.jpg)"></div>
      <div class="c-hero-gradient-bg absolute top-0 left-0 h-56 w-full bg-cover bg-no-repeat lg:h-68">
        <div class="py-20 px-6 sm:px-12 lg:px-20">
          <h1 class="font-butler text-2xl text-white sm:text-3xl md:text-4.5xl lg:text-5xl">
            Collection Grid
          </h1>
          <div class="flex pt-2">
            <a href="/"
              class="font-hk text-base text-white transition-colors hover:text-primary">Home</a>
            <span class="px-2 font-hk text-base text-white">.</span>
            <span class="font-hk text-base text-white">Collection Grid</span>
          </div>
        </div>
      </div>
    </div>
    <!-- collection 배너 End -->

    <!-- filter, sort -->
    <div class="flex flex-col justify-between py-10 sm:flex-row">
      <div class="flex items-center justify-start">
        <i class="bx bxs-filter-alt text-xl text-primary"></i>
        <p class="block px-2 font-hk leading-none text-secondary md:text-lg">
          Filter
        </p>
        <div class="flex items-center rounded border border-grey-darker p-2">
          <a href="/collection-list">
            <i class="bx bx-menu block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i>
          </a>
          <div class="mx-2 h-4 w-px bg-grey-darker"></div>
          <a href="/collection-grid">
            <i class="bx bxs-grid block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i>
          </a>
        </div>
      </div>

      <div class="mt-6 flex w-80 items-center justify-start sm:mt-0 sm:justify-end">
        <span class="mr-2 -mt-2 inline-block font-hk text-secondary md:text-lg">Sort by:</span>
        <select class="form-select w-2/3">
          <option value="0">Best Match</option>
          <option value="1">Price: Low - High</option>
          <option value="2">Price: High - Low</option>
        </select>
      </div>
    </div>
    <!-- filter, sort End -->


    <!-- 상품 grid  -->
    <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      
      <!-- 상품 블록 한개 -->
      <div class="group relative w-full lg:last:hidden xl:last:block">
        <div class="relative flex items-center justify-center rounded">
          <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
            style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/sunglass-1.png)"></div>
          <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-v-green text-sm uppercase tracking-wide">New</span>

          <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-85 py-28 opacity-0 transition-opacity group-hover:opacity-100">
            <a href="/cart"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">Cat eye</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
              </div>
              <p class="ml-2 font-hk text-sm text-secondary">
                (45)
              </p>
            </div>
          </div>
          <span class="font-hk text-xl font-bold text-primary">$75.0</span>
        </div>
      </div>
      
      <div class="group relative w-full lg:last:hidden xl:last:block">
        <div class="relative flex items-center justify-center rounded">
          <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
            style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/sunglass-2.png)"></div>
          <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-v-blue text-sm uppercase tracking-wide">trend</span>

          <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-opacity group-hover:opacity-100">
            <a href="/cart"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">Floral Chick</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
              </div>
              <p class="ml-2 font-hk text-sm text-secondary">
                (45)
              </p>
            </div>
          </div>
          <span class="font-hk text-xl font-bold text-primary">$50.0</span>
        </div>
      </div>
      
      <div class="group relative w-full lg:last:hidden xl:last:block">
        <div class="relative flex items-center justify-center rounded">
          <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
            style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/sunglass-3.png)"></div>
          <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-primary-light text-sm uppercase tracking-wide">25%</span>

          <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-opacity group-hover:opacity-100">
            <a href="/cart"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">Coffee Cream</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
              </div>
              <p class="ml-2 font-hk text-sm text-secondary">
                (45)
              </p>
            </div>
          </div>
          <span class="font-hk text-xl font-bold text-primary">$65.0</span>
        </div>
      </div>
      
      <div class="group relative w-full lg:last:hidden xl:last:block">
        <div class="relative flex items-center justify-center rounded">
          <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
            style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/backpack-1.png)"></div>
          <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-v-red text-sm uppercase tracking-wide">Hot</span>

          <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-opacity group-hover:opacity-100">
            <a href="/cart"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">Black Blake</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
              </div>
              <p class="ml-2 font-hk text-sm text-secondary">
                (45)
              </p>
            </div>
          </div>
          <span class="font-hk text-xl font-bold text-primary">$115.0</span>
        </div>
      </div>

    </div>
    <!-- 상품 grid End -->
    
    <!-- pagination -->
    <div class="mx-auto flex justify-center py-16">
      <span class="cursor-pointer pr-5 font-hk font-semibold text-grey-darkest transition-colors hover:text-black">이전</span>
      <span class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-hk text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">1</span>
      <span class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-hk text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">2</span>
      <span class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-hk text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">3</span>
      <span class="cursor-pointer pl-2 font-hk font-semibold text-grey-darkest transition-colors hover:text-black">다음</span>
    </div>
    <!-- pagination End -->

  </div>
  <!-- container End  -->

@include('layouts.foot')