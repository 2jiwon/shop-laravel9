@include('layouts.head')

<!-- 컨텐츠 -->
<div class="container">

  <!-- 검색 입력 -->
  <div class="flex">
    <div class="top-0 left-0 h-40 w-full md:h-40">
      <div class="py-8 px-4 text-center sm:px-10 lg:px-10">
        
        <form class="flex justify-center pt-6 md:pt-8">
          <input
            type="text"
            placeholder="Search our store"
            class="w-3/5 rounded-l px-6 md:w-2/5 lg:w-1/3 xl:w-1/4"/>
          <button class="coursor-pointer rounded-r border-transparent btn-outline px-8 py-3 transition-all focus:outline-none">
            <img src="{{ asset('assets/theme/icons/watch.svg') }}"
              class="h-5 w-5 sm:h-6 sm:w-6 md:h-8 md:w-8"
              alt="icon search"/>
          </button>
        </form>

      </div>
    </div>
  </div>
  <!-- 검색 입력 End -->

  <!-- 검색 상품 목록 -->
  <div class="py-16">
    <!-- 상품 grid -->
    <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      
      <div class="group relative w-full lg:last:hidden xl:last:block">
        <div class="relative flex items-center justify-center rounded">
          <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
            style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/sunglass-1.png)"></div>
          <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-v-green text-sm uppercase tracking-wide">New</span>

          <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-opacity group-hover:opacity-100">
            <a href="/cart"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">
              Cat eye
            </h3>
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
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">
              Floral Chick
            </h3>
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
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">
              Coffee Cream
            </h3>
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
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="/account/wishlist/"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">
              Black Blake
            </h3>
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
  <!-- 검색 상품 목록 End -->

</div>
<!-- 컨텐츠 End -->     

@include('layouts.foot')