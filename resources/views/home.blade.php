@include('layouts.head')

<div>

  <!-- collectionSliders -->
  <div class="container" x-data x-init="collectionSliders">

    <!-- 상단 슬라이더 -->
    <div class="hero-slider relative" x-cloak x-data x-init="new Splide('.hero-slider', { type: 'loop', arrows: false, pagination: true, autoplay: true, interval: 5000, perMove: 1}).mount()">
      <div class="splide__track">
        <ul class="splide__list">
          @foreach ($main_banners as $m_banner)
          <li class="splide__slide">
            <div class="bg-cover bg-left bg-no-repeat sm:bg-center" style="background-image:url({{ asset('storage/'.$m_banner->image) }})">
              <div class="py-48 px-5 text-center sm:w-5/6 sm:px-10 sm:text-left md:px-12 lg:w-3/4 xl:w-2/3 xl:px-24">
                <h3 class="font-gowunbatang text-3xl font-medium text-primary sm:text-3xl md:text-4xl lg:text-5xl">
                  {{ $m_banner->title }}
                </h3>
                <a href="/category/3/grid" class="btn btn-primary btn-lg mt-8">확인하러 가기</a>
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
  @include('layouts.two-sliders')
  <!-- 2단 슬라이더 End -->

  <!-- big box banner -->
  <div class="container">
    <div class="bg-cover bg-left bg-no-repeat sm:bg-center" style="background-image:linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url({{ asset('storage/banners/onnskm.jpg') }});">
      <div class="py-48 px-5 text-center sm:w-5/6 sm:px-10 sm:text-left md:px-12 lg:w-3/4 xl:w-2/3 xl:px-24">
        <h3 class="font-gowunbatang text-3xl font-medium text-primary sm:text-3xl md:text-4xl lg:text-5xl">
          Blouses & Jeans Up to 70% Off
        </h3>
        <a href="/category/12/grid" class="btn btn-primary btn-lg mt-8">보러가기</a>
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
                    <p class="text-orange-400 font-dohyeon font-bold text-sm uppercase tracking-wide">
                      Sale
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
            <div class="relative h-56 bg-cover bg-left bg-no-repeat px-10 sm:h-80 sm:bg-center opacity-70 hover:opacity-100" style="background-image:url({{ asset('storage/'.$cl_banner->image) }})">
              <div class="absolute inset-0 w-2/3 px-6 py-14 md:px-10">
                <h3 class="font-dohyeon text-xl font-semibold text-teal-900 sm:text-2xl md:text-3xl">
                  {{ $cl_banner->title }}
                </h3>
                <a href="/category/1/grid" class="group flex items-center pt-5">
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