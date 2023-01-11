<div class="pb-20 md:pb-24 lg:pb-32">
    <div class="mb-12 flex flex-col items-center justify-between sm:mb-10 sm:flex-row sm:pb-4 lg:pb-0">
        <div class="text-center sm:text-left">
        <h2 class="font-gowunbatang text-3xl text-secondary md:text-4xl lg:text-4.5xl">
            트렌드 상품
        </h2>
        <p class="pt-2 font-dohyeon text-lg text-secondary-lighter md:text-xl">
            요즘 이게 제일 잘 팔려요!
        </p>
        </div>
        <a href="/collection-grid" class="group flex items-center border-b border-primary pt-1 font-dohyeon text-xl text-primary transition-colors hover:border-primary-light sm:pt-0">
        더보기
        <i class="bx bx-chevron-right pl-3 pt-2 text-xl text-primary transition-colors group-hover:text-primary-light"></i>
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
    <div class="splide__arrow--prev group absolute left-25 top-50 z-30 -translate-y-1/2 transform cursor-pointer rounded-full border border-grey-dark bg-grey shadow-md transition-all hover:bg-[#118ab2] sm:left-35 md:left-0">
        <div class="flex h-12 w-12 items-center justify-center">
        <i class="bx bx-chevron-left text-3xl leading-none text-primary transition-colors group-hover:text-white"></i>
        </div>
    </div>
    <div class="splide__arrow--next group absolute right-25 top-50 z-30 -translate-y-1/2 transform cursor-pointer rounded-full border border-grey-dark bg-grey shadow-md transition-all hover:bg-[#118ab2] sm:right-35 md:right-0">
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
                <img
                src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/backpack-2.png"
                alt="product image"
                class="object-cover"/>
            </div>
            <div
                class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                <p
                class="text-v-green font-dohyeon font-bold text-sm uppercase tracking-wide">
                New
                </p>
            </div>
            <div
                class="absolute inset-0 flex items-center justify-center bg-secondary bg-opacity-85 opacity-0 transition-opacity group-hover:opacity-100">
                <a
                href="/cart"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                    class="h-6 w-6"
                    alt="icon cart"/>
                </a>
                <a
                href="/product"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                    class="h-6 w-6"
                    alt="icon search"/>
                </a>
                <a
                href="/account/wishlist/"
                class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
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
                <div class="flex items-center">
                <div class="flex items-center">
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                </div>
                <span class="ml-2 font-dohyeon text-sm text-secondary">45</span>
                </div>
            </div>
            <span class="font-dohyeonbold text-xl text-primary">$115.0</span>
            </a>
        </div>
        </div>
        
        <div class="splide__slide group relative pt-16 md:pt-0">
        <div class="sm:px-5 lg:px-4">
            <div class="relative flex items-center justify-center rounded">
            <div class="aspect-w-1 aspect-h-1 w-full">
                <img
                src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/purse-1.png"
                alt="product image"
                class="object-cover"/>
            </div>
            <div
                class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                <p
                class="text-v-blue font-dohyeon font-bold text-sm uppercase tracking-wide">
                trend
                </p>
            </div>
            <div
                class="absolute inset-0 flex items-center justify-center bg-secondary bg-opacity-85 opacity-0 transition-opacity group-hover:opacity-100">
                <a
                href="/cart"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                    class="h-6 w-6"
                    alt="icon cart"/>
                </a>
                <a
                href="/product"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                    class="h-6 w-6"
                    alt="icon search"/>
                </a>
                <a
                href="/account/wishlist/"
                class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                    class="h-6 w-6"
                    alt="icon heart"/>
                </a>
            </div>
            </div>
            <a href="/product" class="flex items-center justify-between pt-6">
            <div>
                <h3 class="font-dohyeon text-base text-secondary">
                Beautiful Brown
                </h3>
                <div class="flex items-center">
                <div class="flex items-center">
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                </div>
                <span class="ml-2 font-dohyeon text-sm text-secondary">45</span>
                </div>
            </div>
            <span class="font-dohyeonbold text-xl text-primary">$55.0</span>
            </a>
        </div>
        </div>
        
        <div class="splide__slide group relative pt-16 md:pt-0">
        <div class="sm:px-5 lg:px-4">
            <div class="relative flex items-center justify-center rounded">
            <div class="aspect-w-1 aspect-h-1 w-full">
                <img
                src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/watch-1.png"
                alt="product image"
                class="object-cover"/>
            </div>
            <div
                class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                <p
                class="text-v-red font-dohyeon font-bold text-sm uppercase tracking-wide">
                Hot
                </p>
            </div>
            <div
                class="absolute inset-0 flex items-center justify-center bg-secondary bg-opacity-85 opacity-0 transition-opacity group-hover:opacity-100">
                <a
                href="/cart"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                    class="h-6 w-6"
                    alt="icon cart"/>
                </a>
                <a
                href="/product"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                    class="h-6 w-6"
                    alt="icon search"/>
                </a>
                <a
                href="/account/wishlist/"
                class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-[#118ab2]">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                    class="h-6 w-6"
                    alt="icon heart"/>
                </a>
            </div>
            </div>
            <a href="/product" class="flex items-center justify-between pt-6">
            <div>
                <h3 class="font-dohyeon text-base text-secondary">
                Submarine Watch
                </h3>
                <div class="flex items-center">
                <div class="flex items-center">
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                </div>
                <span class="ml-2 font-dohyeon text-sm text-secondary">45</span>
                </div>
            </div>
            <span class="font-dohyeonbold text-xl text-primary">$120.0</span>
            </a>
        </div>
        </div>   
        
        <div class="splide__slide group relative pt-16 md:pt-0">
        <div class="sm:px-5 lg:px-4">
            <div class="relative flex items-center justify-center rounded">
            <div class="aspect-w-1 aspect-h-1 w-full">
                <img
                src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/shoes-4.png"
                alt="product image"
                class="object-cover"/>
            </div>
            <div
                class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                <p
                class="text-primary-light font-dohyeon font-bold text-sm uppercase tracking-wide">
                20%
                </p>
            </div>
            <div
                class="absolute inset-0 flex items-center justify-center bg-secondary bg-opacity-85 opacity-0 transition-opacity group-hover:opacity-100">
                <a
                href="/cart"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-primary-light">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                    class="h-6 w-6"
                    alt="icon cart"/>
                </a>
                <a
                href="/product"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-primary-light">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                    class="h-6 w-6"
                    alt="icon search"/>
                </a>
                <a
                href="/account/wishlist/"
                class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-primary-light">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                    class="h-6 w-6"
                    alt="icon heart"/>
                </a>
            </div>
            </div>
            <a href="/product" class="flex items-center justify-between pt-6">
            <div>
                <h3 class="font-dohyeon text-base text-secondary">
                Siberian Boots
                </h3>
                <div class="flex items-center">
                <div class="flex items-center">
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                </div>
                <span class="ml-2 font-dohyeon text-sm text-secondary">45</span>
                </div>
            </div>
            <span class="font-dohyeonbold text-xl text-primary">$67.0</span>
            </a>
        </div>
        </div>
        
        <div class="splide__slide group relative pt-16 md:pt-0">
        <div class="sm:px-5 lg:px-4">
            <div class="relative flex items-center justify-center rounded">
            <div class="aspect-w-1 aspect-h-1 w-full">
                <img
                src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/watch-3.png"
                alt="product image"
                class="object-cover"/>
            </div>
            <div
                class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                <p
                class="text-v-red font-dohyeon font-bold text-sm uppercase tracking-wide">
                Hot
                </p>
            </div>
            <div
                class="absolute inset-0 flex items-center justify-center bg-secondary bg-opacity-85 opacity-0 transition-opacity group-hover:opacity-100">
                <a
                href="/cart"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-primary-light">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-cart.svg "
                    class="h-6 w-6"
                    alt="icon cart"/>
                </a>
                <a
                href="/product"
                class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-primary-light">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-search.svg"
                    class="h-6 w-6"
                    alt="icon search"/>
                </a>
                <a
                href="/account/wishlist/"
                class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-primary-light">
                <img
                    src="https://elyssi.redpixelthemes.com/assets/img/icons/icon-heart.svg"
                    class="h-6 w-6"
                    alt="icon heart"/>
                </a>
            </div>
            </div>
            <a href="/product" class="flex items-center justify-between pt-6">
            <div>
                <h3 class="font-dohyeon text-base text-secondary">
                Silver One
                </h3>
                <div class="flex items-center">
                <div class="flex items-center">
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                    <i class="bx bxs-star text-primary"></i>
                </div>
                <span class="ml-2 font-dohyeon text-sm text-secondary">45</span>
                </div>
            </div>
            <span class="font-dohyeonbold text-xl text-primary">$137.0</span>
            </a>
        </div>
        </div>
        
    </div>
    </div>

</div>
</div>