@include('layouts.head')

<div>

  <!-- collectionSliders -->
  <div class="container" x-data x-init="collectionSliders">

    <!-- 상단 슬라이더 -->
    <div class="hero-slider relative" x-data x-init="new Splide('.hero-slider', { type: 'loop', arrows: false, pagination: true, autoplay: true, interval: 5000, perMove: 1}).mount()">
      <div class="splide__track">
        <ul class="splide__list">
          @foreach ($main_banners as $m_banner)
          <li class="splide__slide">
            <div class="bg-cover bg-left bg-no-repeat sm:bg-center" style="background-image:url({{ asset('storage/'.$m_banner->filename) }})">
              <div class="py-48 px-5 text-center sm:w-5/6 sm:px-10 sm:text-left md:px-12 lg:w-3/4 xl:w-2/3 xl:px-24">
                <h3 class="font-gowunbatang text-3xl font-medium text-primary sm:text-3xl md:text-4xl lg:text-5xl">
                  {{ $m_banner->title }}
                </h3>
                <a href="/collection-grid" class="btn btn-primary btn-lg mt-8">확인하러 가기</a>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>   
    <!-- 상단 슬라이더 End -->
  </div>
  <!-- collectionSliders End -->
    

  <!-- 트렌드 상품 -->
  @include('layouts.trends')
  <!-- 트렌드 상품 End -->


  <!-- 2단 슬라이더  -->
  <div class="relative w-full">
    <div class="absolute inset-y-0 justify-center w-13/14 bg-cover bg-center bg-no-repeat" style=""></div>
    <div class="2xl:max-w-screen-xxl relative z-10 mx-auto w-5/6 md:max-w-screen-sm lg:mx-auto lg:max-w-full xl:mr-16 xl:w-5/6 2xl:mx-auto">
      <div class="flex flex-col-reverse items-center py-16 lg:flex-row">
        <div class="relative mt-8 ml-6 w-full bg-white px-4 pt-8 pb-6 sm:ml-10 lg:mt-0 lg:ml-0 lg:w-3/5 2xl:w-3/4">
          <div class="collection-slider">
            <div class="splide__track">
              <div class="splide__list">
                
                <div class="splide__slide">
                  <div class="group mx-auto flex flex-col 2xl:w-88">
                    <div class="relative rounded">
                      <div class="aspect-w-1 aspect-h-1">
                        <img src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/shoes-1.png"
                          alt=""
                          class="object-cover"/>
                      </div>
                      <span class="text-v-green absolute top-0 right-0 bg-white px-5 py-1 my-4 mx-4 rounded-full font-dohyeon font-bold text-sm uppercase tracking-wide">New</span>
                      <div class="absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
                        <a href="/"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                            class="h-6 w-6"
                            alt="icon cart"/>
                        </a>
                        <a href="/"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                            class="h-6 w-6"
                            alt="icon search"/>
                        </a>
                        <a href="/"
                          class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                            class="h-6 w-6"
                            alt="icon heart"/>
                        </a>
                      </div>
                    </div>
                    <div class="flex items-center justify-between pt-6">
                      <div>
                        <p class="font-dohyeon text-base text-secondary">
                          Cocktail Vans
                        </p>
                        <!-- <div class="flex items-center">
                          <div class="flex items-center">
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                          </div>
                          <p class="ml-2 font-dohyeon text-sm text-secondary">
                            45
                          </p>
                        </div> -->
                      </div>
                      <span class="flex justify-end font-dohyeon text-sm text-primary">$33.0</span>
                    </div>
                  </div>
                </div>
                

                
              </div>
            </div>
          </div>
        </div>

        <div class=" py-6 w-full bg-teal-400 sm:ml-10 lg:ml-12 lg:w-1/3 lg:pl-6 xl:pl-8 2xl:w-1/4">
          <div class="text-center lg:text-right">
            <h2
              class="font-dohyeonbold text-2xl tracking-wide text-white lg:text-xl xl:text-2xl 2xl:text-3xl">
              New season, matching shoes
            </h2>
            <p class="pt-1 font-dohyeon text-lg text-secondary">
              Featured Collection
            </p>
            <div class="block lg:hidden">
              <a href="/" class="mt-4 inline-block rounded bg-primary px-5 py-4 font-dohyeon text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">
                View All Shoes
              </a>
            </div>
          </div>
          <div class="group relative hidden lg:block">
            <div class="ml-auto mb-auto mt-8 h-56  xl:mt-10 xl:h-68 2xl:mt-14 2xl:h-88"></div>
            <div class="pointer-events-none absolute inset-0 overflow-hidden transition-all group-hover:pointer-events-auto group-hover:opacity-75"></div>
            <div class="group absolute inset-0 mx-auto flex items-center justify-center transition-opacity group-hover:opacity-100">
              <a href="/" class="inline-block rounded bg-primary px-5 py-4 font-dohyeon text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">
                View All Product
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col items-center pb-16 lg:flex-row">
        <div class="mx-6 py-6 w-full bg-yellow-400 sm:ml-10 lg:ml-0 lg:w-1/3 lg:pr-6 xl:pr-8 2xl:w-1/4">
          <div class="text-center lg:text-right">
            <h2 class="font-dohyeonbold text-2xl tracking-wide text-white lg:text-xl xl:text-2xl 2xl:text-3xl">
              Stylish Backpacks, Only For You
            </h2>
            <p class="pt-1 font-dohyeon text-lg text-secondary">
              Featured Collection
            </p>
            <div class="block lg:hidden">
              <a href="/" class="mt-4 inline-block rounded bg-primary px-5 py-4 font-dohyeon text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">
                View All Backpacks
              </a>
            </div>
          </div>
          <div class="group relative hidden lg:block">
            <div class="ml-auto mb-auto mt-8 h-56 xl:mt-10 xl:h-68 2xl:mt-14 2xl:h-88"></div>
            <div class="pointer-events-none absolute inset-0 overflow-hidden transition-all group-hover:pointer-events-auto group-hover:opacity-75"></div>
            <div class="group absolute inset-0 mx-auto flex items-center justify-center transition-opacity group-hover:opacity-100">
              <a href="/" class="inline-block rounded bg-primary px-5 py-4 font-dohyeon text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">View All Product</a>
            </div>
          </div>
        </div>

        <div class="relative mt-8 ml-6 w-full bg-white px-4 pt-8 pb-6 sm:ml-10 lg:mt-0 lg:ml-auto lg:w-3/5 2xl:w-3/4">
          <div class="collection-slider">
            <div class="splide__track">
              <div class="splide__list">
                
                <div class="splide__slide">
                  <div class="group mx-auto flex flex-col 2xl:w-88">
                    <div class="relative rounded">
                      <div class="aspect-w-1 aspect-h-1">
                        <img src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/backpack-4.png"
                          alt=""
                          class="object-cover"/>
                      </div>
                      <span class="text-v-green absolute top-0 right-0 bg-white px-5 py-1 my-4 mx-4 rounded-full font-dohyeon font-bold text-sm uppercase tracking-wide">New</span>
                      <div class="absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
                        <a href="/"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                            class="h-6 w-6"
                            alt="icon cart"/>
                        </a>
                        <a href="/"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                            class="h-6 w-6"
                            alt="icon search"/>
                        </a>
                        <a href="/"
                          class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                            class="h-6 w-6"
                            alt="icon heart"/>
                        </a>
                      </div>
                    </div>
                    <div class="flex items-center justify-between pt-6">
                      <div>
                        <p class="font-dohyeon text-base text-secondary">
                          Not Ballerina Blake
                        </p>
                        <!-- <div class="flex items-center">
                          <div class="flex items-center">
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                          </div>
                          <p class="ml-2 font-dohyeon text-sm text-secondary">
                            45
                          </p>
                        </div> -->
                      </div>
                      <span class="flex justify-end font-dohyeon text-sm text-primary">$115.0</span>
                    </div>
                  </div>
                </div>
                
                
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- 2단 슬라이더 End -->

  <!-- big box banner -->
  <div class="container">
    <div class="bg-cover bg-left bg-no-repeat sm:bg-center" style="background-image:linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url({{ asset('storage/banners/onnskm.jpg') }});">
      <div class="py-48 px-5 text-center sm:w-5/6 sm:px-10 sm:text-left md:px-12 lg:w-3/4 xl:w-2/3 xl:px-24">
        <h3 class="font-gowunbatang text-3xl font-medium text-primary sm:text-3xl md:text-4xl lg:text-5xl">
          Blouses & Jeans Up to 70% Off
        </h3>
        <a href="/collection-grid" class="btn btn-primary btn-lg mt-8">보러가기</a>
      </div>
    </div>
  </div>
  <!-- big box banner End -->

  <!-- Sale 슬라이더 -->
  <div class="container">
    <div class="mt-32 pb-20 md:pb-32">
      <div class="pb-12 text-center">
        <h2 class="font-gowunbatang text-3xl text-primary md:text-4xl lg:text-4.5xl">
          세일 중이예요!
        </h2>
        <p class="font-dohyeon text-lg text-secondary md:text-xl">
          특별한 가격에 만나보세요
        </p>
      </div>
      <div class="product-slider relative"
            x-data
            x-init="
                  new Splide($el, {
                      type: 'loop',
                      start: 1,
                      perPage: 4,
                      gap: 0,
                      perMove: 1,
                      rewind: true,
                      pagination: false,
                      padding: {
                          left: 50,
                          right: 50,
                      },
                      breakpoints: {
                          1024: {
                              perPage: 3,
                              padding: {
                                  left: 20,
                                  right: 20,
                              },
                          },
                          768: {
                              perPage: 2,
                              padding: {
                                  left: 10,
                                  right: 10,
                              },
                          },
                          600: {
                              perPage: 1,
                              padding: {
                                  left: 0,
                                  right: 0,
                              },
                          },
                      },
                  })
                  .mount();
              ">
        <div class="splide__arrows">
          <div class="splide__arrow--prev group absolute left-25 top-50 z-30 -translate-y-1/2 transform cursor-pointer rounded-full border border-grey-dark bg-grey shadow-md transition-all hover:bg-primary sm:left-35 md:left-0">
            <div class="flex h-12 w-12 items-center justify-center">
              <i class="bx bx-chevron-left text-3xl leading-none text-primary transition-colors group-hover:text-white"></i>
            </div>
          </div>
          <div class="splide__arrow--next group absolute right-25 top-50 z-30 -translate-y-1/2 transform cursor-pointer rounded-full border border-grey-dark bg-grey shadow-md transition-all hover:bg-primary sm:right-35 md:right-0">
            <div class="flex h-12 w-12 items-center justify-center">
              <i class="bx bx-chevron-right text-3xl leading-none text-primary transition-colors group-hover:text-white"></i>
            </div>
          </div>
        </div>
      
        <div class="splide__track">
          <div class="splide__list relative pt-12">
            
            <div class="splide__slide group relative pt-16 md:pt-0">
              <div class="sm:px-5 lg:px-4">
                <div class="relative flex items-center justify-center rounded">
                  <div class="aspect-w-1 aspect-h-1 w-full">
                    <img src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/backpack-2.png"
                      alt="product image"
                      class="object-cover"/>
                  </div>
                  <div class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                    <p class="text-v-green font-dohyeon font-bold text-sm uppercase tracking-wide">
                      New
                    </p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
                    <a href="/cart"
                      class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                      <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                        class="h-6 w-6"
                        alt="icon cart"/>
                    </a>
                    <a href="/product"
                      class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                      <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                        class="h-6 w-6"
                        alt="icon search"/>
                    </a>
                    <a href="/account/wishlist/"
                      class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                      <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                        class="h-6 w-6"
                        alt="icon heart"/>
                    </a>
                  </div>
                </div>
                <a href="/product" class="flex items-center justify-between pt-6">
                  <div>
                    <h3 class="font-dohyeon text-base text-secondary">
                      Woodie Blake
                    </h3>
                    <!-- <div class="flex items-center">
                      <div class="flex items-center">
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                      </div>
                      <span class="ml-2 font-dohyeon text-sm text-secondary">45</span>
                    </div> -->
                  </div>
                  <span class="flex justify-end font-dohyeon text-sm text-primary">$115.0</span>
                </a>
              </div>
            </div>
            
            
            
          </div>
        </div>  
      </div>
    </div>
  </div>
  <!-- Sale 슬라이더 End -->

  <div class="container">
     
      <!-- 컬렉션 -->
      <div class="grid grid-cols-1 gap-10 pb-20 md:pb-24 lg:grid-cols-2 lg:pb-32">
        @if (count($collection_banners) < 2)
        <div class="mx-auto px-10 text-center lg:mx-0 lg:text-left border-2">
          <div class="pb-4 md:pb-10 lg:w-3/4 lg:pt-10 xl:w-2/3">
            <h1 class="font-gowunbatang text-3xl text-secondary md:text-4xl lg:text-4.5xl">
              컬렉션
            </h1>
            <p class="pt-4 font-dohyeon text-lg text-secondary">
              지금 우리 샵에서 가장 잘 나가는 상품은?
            </p>
          </div>
        </div>
        @else
          @foreach ($collection_banners as $cl_banner)
          <div class="mt-6 sm:mt-10 lg:mt-0">
            <div class="relative h-56 bg-cover bg-left bg-no-repeat px-10 sm:h-80 sm:bg-center opacity-70 hover:opacity-100" style="background-image:url({{ asset('storage/'.$cl_banner->filename) }})">
              <div class="absolute inset-0 w-2/3 px-6 py-14 md:px-10">
                <h3 class="font-dohyeon text-xl font-semibold text-teal-900 sm:text-2xl md:text-3xl">
                  {{ $cl_banner->title }}
                </h3>
                <a href="/collection-list" class="group flex items-center pt-5">
                  <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white">
                    <i class="bx bx-chevron-right text-xl text-primary transition-colors group-hover:text-secondary"></i>
                  </div>
                  <span class="-mt-1 pl-3 font-dohyeon font-semibold leading-none text-primary transition-colors group-hover:text-secondary sm:pl-5 sm:text-lg">
                    지금 확인하기
                  </span>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        @endif
      </div>
      <!-- 컬렉션 End -->

       <!-- 3칸 쇼핑몰 홍보 문구 -->
      <div class="flex flex-col py-20 md:flex-row md:py-24">
        <div class="mx-auto flex w-4/5 items-start justify-start pb-3 last:border-r-0 sm:w-1/2 md:w-2/5 md:flex-col md:items-center md:justify-center md:border-r-2 md:border-primary md:pb-0 md:text-center lg:mx-0 lg:w-1/3 lg:flex-row lg:text-left">
          <div>
            <img src="{{ asset('assets/theme/icons/shipping-package.svg') }}" class="h-12 w-12 opacity-70 object-contain object-center" alt="icon"/>
          </div>
          <div class="ml-6 md:mt-3 lg:mt-0">
            <h3 class="font-dohyeon text-xl font-semibold tracking-wide text-primary">
              무료배송
            </h3>
            <p class="font-dohyeon text-sm lg:text-base tracking-wide text-secondary">
              30,000원 이상 구매시 무료배송
            </p>
          </div>
        </div>

        <div class="mx-auto flex w-4/5 items-start justify-start pb-3 last:border-r-0 sm:w-1/2 md:w-2/5 md:flex-col md:items-center md:justify-center md:border-r-2 md:border-secondary md:pb-0 md:text-center lg:mx-0 lg:w-1/3 lg:flex-row lg:text-left">
          <div>
            <img src="{{ asset('assets/theme/icons/service.svg') }}" class="h-12 w-12 opacity-70 object-contain object-center" alt="icon"/>
          </div>
          <div class="ml-6 md:mt-3 lg:mt-0">
            <h3 class="font-dohyeon text-xl font-semibold tracking-wide text-primary">
              고객만족 최우선
            </h3>
            <p class="font-dohyeon text-sm lg:text-base tracking-wide text-secondary">
              7일 이내 상품 불만족시 환불보장
            </p>
          </div>
        </div>

        <div class="mx-auto flex w-4/5 items-start justify-start pb-3 last:border-r-0 sm:w-1/2 md:w-2/5 md:flex-col md:items-center md:justify-center md:border-r-2 md:border-primary md:pb-0 md:text-center lg:mx-0 lg:w-1/3 lg:flex-row lg:text-left">
          <div>
            <img src="{{ asset('assets/theme/icons/shipping-fast.svg') }}" class="h-12 w-12 opacity-70 object-contain object-center" alt="icon"/>
          </div>
          <div class="ml-6 md:mt-3 lg:mt-0">
            <h3 class="font-dohyeon text-xl font-semibold tracking-wide text-primary">
              당일배송 원칙
            </h3>
            <p class="font-dohyeon text-sm lg:text-base tracking-wide text-secondary">
              14시 이전 구매시 당일배송
            </p>
          </div>
        </div>
      </div>
      <!-- 3칸 쇼핑몰 홍보 문구 End -->

  </div>

@include('layouts.foot')