<div class="relative w-full">
    <div class="absolute inset-y-0 justify-center w-13/14 bg-cover bg-center bg-no-repeat" style=""></div>
    <div class="2xl:max-w-screen-xxl relative z-10 mx-auto w-5/6 md:max-w-screen-sm lg:mx-auto lg:max-w-full xl:mr-16 xl:w-5/6 2xl:mx-auto">
      <div class="flex flex-col-reverse items-center py-16 lg:flex-row">
        <div class="relative mt-8 ml-6 w-full bg-white px-4 pt-8 pb-6 sm:ml-10 lg:mt-0 lg:ml-0 lg:w-3/5 2xl:w-3/4">
          <div class="collection-slider">
            <div class="splide__track">
              <div class="splide__list">
                
                @foreach ($news as $new)
                <div class="splide__slide">
                  <div class="group mx-auto flex flex-col 2xl:w-88">
                    <div class="relative rounded">
                      <div class="aspect-w-1 aspect-h-1">
                        @foreach ($new->images as $image)
                          @if ($image->type == 'main')
                        <img src="{{ asset('storage/'.$image->image) }}"
                          alt="{{ $new->name }}"
                          class="object-cover"/>
                          @endif
                        @endforeach
                      </div>
                      <span class="text-v-green absolute top-0 right-0 bg-white px-5 py-1 my-4 mx-4 rounded-full font-dohyeon font-bold text-sm uppercase tracking-wide">
                        New
                      </span>
                      <div class="absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
                        <a href="javascript:addTo('cart',{{ $new->id }}, 1);"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                            class="h-6 w-6"
                            alt="icon cart"/>
                        </a>
                        <a href="/product/{{ $new->id }}"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                            class="h-6 w-6"
                            alt="icon search"/>
                        </a>
                        <a href="/account/wishlist/{{ $new->id }}"
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
                          {{ $new->name }}
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
                      <span class="flex justify-end font-dohyeon text-sm text-primary">{{ number_format($new->selling_price )}}</span>
                    </div>
                  </div>
                </div>
                @endforeach

              
              </div>
            </div>
          </div>
        </div>

        <div class="py-6 px-6 w-full bg-teal-400 sm:ml-10 lg:ml-12 lg:w-1/3 lg:pl-6 xl:pl-8 2xl:w-1/4">
          <div class="text-center lg:text-right">
            <h2
              class="font-dohyeon bold text-2xl tracking-wide text-white lg:text-xl xl:text-2xl 2xl:text-3xl">
              새로 들어왔어요!
            </h2>
            <p class="pt-1 font-dohyeon text-lg text-secondary">
              따끈따끈한 신상
            </p>
            <div class="block lg:hidden">
              <a href="/collection/new/grid" class="mt-4 inline-block rounded bg-primary px-5 py-4 font-dohyeon text-lg uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">
                확인하러 가기
              </a>
            </div>
          </div>
          <div class="group relative hidden lg:block">
            <div class="ml-auto mb-auto mt-8 h-56  xl:mt-10 xl:h-68 2xl:mt-14 2xl:h-88"></div>
            <div class="pointer-events-none absolute inset-0 overflow-hidden transition-all group-hover:pointer-events-auto group-hover:opacity-75"></div>
            <div class="group absolute inset-0 mx-auto flex items-center justify-center transition-opacity group-hover:opacity-100">
              <a href="/collection/new/grid" class="inline-block rounded bg-primary px-5 py-4 font-dohyeon text-lg uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">
                확인하러 가기
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col items-center pb-16 lg:flex-row">
        <div class="mx-6 py-6 px-6 w-full bg-yellow-400 sm:ml-10 lg:ml-0 lg:w-1/3 lg:pr-6 xl:pr-8 2xl:w-1/4">
          <div class="text-center lg:text-right">
            <h2 class="font-dohyeon bold text-2xl tracking-wide text-white lg:text-xl xl:text-2xl 2xl:text-3xl">
              지금 제일 많이 팔리는 상품
            </h2>
            <p class="pt-1 font-dohyeon text-lg text-secondary">
              인기상품 만나보세요!
            </p>
            <div class="block lg:hidden">
              <a href="/collection/best/grid" class="mt-4 inline-block rounded bg-primary px-5 py-4 font-dohyeon text-lg uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">
                확인하러 가기
              </a>
            </div>
          </div>
          <div class="group relative hidden lg:block">
            <div class="ml-auto mb-auto mt-8 h-56 xl:mt-10 xl:h-68 2xl:mt-14 2xl:h-88"></div>
            <div class="pointer-events-none absolute inset-0 overflow-hidden transition-all group-hover:pointer-events-auto group-hover:opacity-75"></div>
            <div class="group absolute inset-0 mx-auto flex items-center justify-center transition-opacity group-hover:opacity-100">
              <a href="/collection/best/grid" class="inline-block rounded bg-primary px-5 py-4 font-dohyeon text-lg uppercase tracking-wide text-white transition-colors hover:bg-secondary focus:outline-none md:px-8 md:py-5">
                확인하러 가기
              </a>
            </div>
          </div>
        </div>

        <div class="relative mt-8 ml-6 w-full bg-white px-4 pt-8 pb-6 sm:ml-10 lg:mt-0 lg:ml-auto lg:w-3/5 2xl:w-3/4">
          <div class="collection-slider">
            <div class="splide__track">
              <div class="splide__list">
                
                @foreach ($bests as $best)
                <div class="splide__slide">
                  <div class="group mx-auto flex flex-col 2xl:w-88">
                    <div class="relative rounded">
                      <div class="aspect-w-1 aspect-h-1">
                        @foreach ($best->images as $image)
                          @if ($image->type == 'main')
                          <img src="{{ asset('storage/'.$image->image) }}"
                            alt="{{ $best->name }}"
                            class="object-cover"/>
                          @endif
                        @endforeach
                      </div>
                      <span class="text-v-red absolute top-0 right-0 bg-white px-5 py-1 my-4 mx-4 rounded-full font-dohyeon font-bold text-sm uppercase tracking-wide">
                        Best
                      </span>
                      <div class="absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
                        <a href="javascript:addTo('cart',{{ $best->id }}, 1);"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                            class="h-6 w-6"
                            alt="icon cart"/>
                        </a>
                        <a href="/product/{{ $best->id }}"
                          class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                          <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                            class="h-6 w-6"
                            alt="icon search"/>
                        </a>
                        <a href="/account/wishlist/{{ $best->id }}"
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
                          {{ $best->name }}
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
                      <span class="flex justify-end font-dohyeon text-sm text-primary">{{ number_format($best->selling_price )}}</span>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>