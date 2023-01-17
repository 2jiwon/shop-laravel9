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
            Collection List
          </h1>
          <div class="flex pt-2">
            <a href="/"
              class="font-hk text-base text-white transition-colors hover:text-primary">Home</a>
            <span class="px-2 font-hk text-base text-white">.</span>
            <span class="font-hk text-base text-white">Collection List</span>
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
          <a href="/collection-list"><i class="bx bx-menu block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i></a>
          <div class="mx-2 h-4 w-px bg-grey-darker"></div>
          <a href="/collection-grid"><i class="bx bxs-grid block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i></a>
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
    <div class="grid grid-cols-1 gap-10 lg:grid-cols-2 lg:gap-10 xl:gap-10">
      
      <!-- 상품 블록 한개 -->
      <div class="w-full">
        <div class="shadow-none rounde group flex flex-col items-center border border-grey-dark transition-shadow hover:shadow-lg sm:flex-row">
          <div class="relative w-full sm:w-2/5 lg:w-5/11">
            <div class="relative rounded-l">
              <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
                style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/sunglass-1.png)"></div>
              <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-v-green text-sm uppercase tracking-wide">New</span>
              <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-all hover:shadow-lg group-hover:opacity-100">
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
          </div>
          <div class="w-full px-6 py-6 sm:w-3/5 sm:py-0 lg:w-6/11">
            <h3 class="font-hk text-xl text-grey-darkest xl:text-2xl">
              Cat eye
            </h3>
            <span class="block pt-1 font-hk text-xl font-bold text-secondary">$75.0</span>
            <span class="block pt-4 font-hk text-base font-bold text-v-green">In Stock</span>
            <p class="pt-2 font-hk text-sm text-grey-darkest xl:text-base">
              Elyssi sunglasses provides a new way to protect your eyes from the sun’s UV light, because of its polarized lenses.
            </p>
            <div class="flex items-center pt-3 xl:pt-5">
              <div class="flex items-center">
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
              </div>
              <p class="ml-2 font-hk text-sm text-secondary">
                45
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="w-full">
        <div class="shadow-none rounde group flex flex-col items-center border border-grey-dark transition-shadow hover:shadow-lg sm:flex-row">
          <div class="relative w-full sm:w-2/5 lg:w-5/11">
            <div class="relative rounded-l">
              <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
                style="background-image:url(https://elyssi.redpixelthemes.com/assets/img/unlicensed/sunglass-3.png)"></div>
              <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-v-red text-sm uppercase tracking-wide">Hot</span>
              <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-all hover:shadow-lg group-hover:opacity-100">
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
          </div>
          <div class="w-full px-6 py-6 sm:w-3/5 sm:py-0 lg:w-6/11">
            <h3 class="font-hk text-xl text-grey-darkest xl:text-2xl">
              Coffee cream
            </h3>
            <span class="block pt-1 font-hk text-xl font-bold text-secondary">$65.0</span>
            <span class="block pt-4 font-hk text-base font-bold text-v-green">In Stock</span>
            <p class="pt-2 font-hk text-sm text-grey-darkest xl:text-base">
              Its style and design brings you an elegant, practical and authentic look to conquer every task.
            </p>
            <div class="flex items-center pt-3 xl:pt-5">
              <div class="flex items-center">
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
              </div>
              <p class="ml-2 font-hk text-sm text-secondary">
                45
              </p>
            </div>
          </div>
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

</div>

@include('layouts.foot')