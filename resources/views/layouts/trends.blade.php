<div class="container">
    <div class="pb-10 mt-32 md:pb-14 lg:pb-16">
        <div class="mb-12 flex flex-col items-center justify-between sm:mb-10 sm:flex-row sm:pb-4 lg:pb-0">
            <div class="text-center sm:text-left">
            <h2 class="font-gowunbatang text-3xl text-primary md:text-4xl lg:text-4.5xl">
                트렌드 상품
            </h2>
            <p class="pt-2 font-dohyeon text-lg md:text-xl text-secondary">
                요즘 이게 제일 잘 팔려요!
            </p>
            </div>
            <a href="/collection-grid" class="group flex items-center border-b border-primary pt-1 font-dohyeon text-xl text-primary transition-colors hover:border-secondary sm:pt-0">
            더보기
            <i class="bx bx-chevron-right pl-3 pt-2 text-xl text-primary transition-colors group-hover:text-secondary"></i>
            </a>
        </div>

    <!-- 가로 슬라이더 -->
    <div class="product-slider relative" x-data
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
        <div class="splide__arrow--prev group absolute left-25 top-50 z-30 -translate-y-1/2 transform cursor-pointer rounded-full border border-grey-dark bg-grey shadow-md transition-all hover:bg-secondary sm:left-35 md:left-0">
            <div class="flex h-12 w-12 items-center justify-center">
            <i class="bx bx-chevron-left text-3xl leading-none text-primary transition-colors group-hover:text-white"></i>
            </div>
        </div>
        <div class="splide__arrow--next group absolute right-25 top-50 z-30 -translate-y-1/2 transform cursor-pointer rounded-full border border-grey-dark bg-grey shadow-md transition-all hover:bg-secondary sm:right-35 md:right-0">
            <div class="flex h-12 w-12 items-center justify-center">
            <i class="bx bx-chevron-right text-3xl leading-none text-primary transition-colors group-hover:text-white"></i>
            </div>
        </div>
        </div>

        <div class="splide__track">
        <div class="splide__list relative pt-12">
            
        @foreach ($trends as $trend)
            <div class="splide__slide group relative pt-16 md:pt-0">
            <div class="sm:px-5 lg:px-4">
                <div class="relative flex items-center justify-center rounded">
                <div class="aspect-w-1 aspect-h-1 w-full">
                    @foreach ($trend->images as $img)
                        @if ($img->type == 'main')
                        <img
                        src="{{ asset('storage/'.$img->filename) }}"
                        alt="product image"
                        class="object-cover"/>
                        @endif
                    @endforeach
                </div>
                <div
                    class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                    <p
                    class="text-v-blue font-dohyeon font-bold text-sm uppercase tracking-wide">
                    Trend
                    </p>
                </div>
                <div
                    class="absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
                    <a href="/cart/{{ $trend->id }}" class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                    <img src="{{ asset('assets/theme/icons/cart.svg') }}" class="h-6 w-6" alt="icon cart"/>
                    </a>
                    <a href="/product/{{ $trend->id }}" class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                    <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                        class="h-6 w-6"
                        alt="icon search"/>
                    </a>
                    <a
                    href="/account/wishlist/{{ $trend->id }}"
                    class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                    <img
                        src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                        class="h-6 w-6"
                        alt="icon heart"/>
                    </a>
                </div>
                </div>
                <a href="/product/{{ $trend->id }}" class="flex items-center justify-start pt-6">
                <!-- <div> -->
                    <h3 class="font-dohyeon text-base text-secondary">
                   {{ $trend->name }}
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
                <!-- </div> -->
            </a>
            <span class="flex justify-end font-dohyeon text-sm text-primary">{{ number_format($trend->selling_price) }}원</span>
            </div>
            </div>
        @endforeach
           
            
        </div>
        </div>

    </div>
    </div>
</div>
