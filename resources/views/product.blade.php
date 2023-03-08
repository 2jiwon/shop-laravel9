@include('layouts.head')

<div>

  <!-- container -->
  <div class="container">
    
    <!-- 상품 상단 -->
    <div class="-mx-5 flex flex-col justify-between pt-16 pb-24 lg:flex-row">

      <!-- 상품 이미지 -->
      @foreach ($product->images as $image)
        @if ($image->type == 'main')
        <div class="flex flex-col-reverse justify-between px-5 sm:flex-row-reverse lg:w-1/2 lg:flex-row"
             x-data="{ selectedImage: '{{ asset('storage/'.$image->image) }}' }">
        @endif
      @endforeach  
      
        <!-- 세로 상품 이미지 -->
        <div class="flex flex-row sm:flex-col sm:pl-5 md:pl-4 lg:pl-0 lg:pr-2 xl:pr-3">
          
          @foreach ($product->images as $image)
          <div class="relative mr-3 w-28 pb-5 sm:w-32 sm:pr-0 lg:w-24 xl:w-28">
            <div class="relative flex w-full items-center justify-center rounded border border-grey bg-v-pink">
              <img class="cursor-pointer object-cover"
                @click="selectedImage = $event.target.src"
                alt="product image"
                src="{{ asset('storage/'.$image->image) }}"/>
            </div>
          </div>
          @endforeach
        </div>         

        <!-- 상품 큰 이미지 -->
        <div class="relative w-full pb-5 sm:pb-0">
          <div class="aspect-w-1 aspect-h-1 relative flex items-center justify-center rounded border border-grey bg-v-pink">
            <img class="object-cover" alt="product image" :src="selectedImage"/>
          </div>
        </div>

      </div>
      <!-- 상품 이미지 End -->

      <!-- 상품 상단 기본 정보 -->
      <div class="px-5 pt-8 lg:w-1/2 lg:pt-0">
        <div class="mb-8 border-b border-grey-dark">
          <div class="flex items-center">
            <h2 class="font-butler text-3xl md:text-4xl lg:text-4.5xl">
              {{ $product->name }}
            </h2>
            <p class="ml-8 rounded-full bg-primary px-5 py-2 font-dohyeon text-sm font-bold uppercase leading-none text-white">
              20% off
            </p>
          </div>
          <div class="flex items-center pt-3">
            <span class="font-dohyeon text-2xl text-secondary">{{ number_format($product->selling_price) }} 원</span>
            <span class="pl-5 font-dohyeon text-xl text-grey-darker line-through"></span>
          </div>
          <div class="flex items-center pt-3 pb-8">
            <div class="flex items-center">
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
            </div>
            <span class="ml-2 font-dohyeon text-sm text-secondary">(45)</span>
          </div>
        </div>
        <div class="flex pb-5">
          <p class="font-dohyeon text-secondary">상태</p>
          @if ($product->is_selling == 'Y')
            <p class="font-dohyeonbold pl-3 text-v-green">구매 가능</p>
          @else
            <p class="font-dohyeonbold pl-3 text-v-red">구매 불가</p>
          @endif
        </div>

        <!-- <p class="pb-5 font-dohyeon text-secondary"></p>
        <div class="flex justify-between pb-4">
          <div class="w-1/3 sm:w-1/5">
            <p class="font-dohyeon text-secondary">Color</p>
          </div>
          <div class="flex w-2/3 items-center sm:w-5/6">
            <div class="mr-2 cursor-pointer rounded-full border-2 border-transparent bg-primary px-2 py-2 transition-colors hover:border-black"></div>
            <div class="mr-2 cursor-pointer rounded-full border-2 border-transparent bg-secondary-light px-2 py-2 transition-colors hover:border-black"></div>
            <div class="mr-2 cursor-pointer rounded-full border-2 border-transparent bg-v-green px-2 py-2 transition-colors hover:border-black"></div>
            <div class="cursor-pointer rounded-full border-2 border-transparent bg-v-blue px-2 py-2 transition-colors hover:border-black"></div>
          </div>
        </div>
        <div class="flex items-center justify-between pb-4">
          <div class="w-1/3 sm:w-1/5">
            <p class="font-dohyeon text-secondary">Size</p>
          </div>
          <div class="w-2/3 sm:w-5/6">
            <select class="form-select w-2/3">
              <option value="0">Small</option>
              <option value="1">Medium</option>
              <option value="2">Large</option>
            </select>
          </div>
        </div> -->

      <div x-data="{ productQuantity: 1 }">
        <div class="flex items-center justify-between pb-8" >
          <div class="w-1/3 sm:w-1/5">
            <p class="font-dohyeon text-secondary">수량</p>
          </div>
          <div class="flex w-2/3 sm:w-5/6">
            <label
              for="quantity-form"
              class="relative block h-0 w-0 overflow-hidden">Quantity form</label>
            @if ($product->is_selling == 'N')
            <input
              type="number"
              class="form-quantity form-input w-16 rounded-r-none py-0 px-2 text-center"
              disabled />
            @else
            <input
              type="number"
              id="quantity-form"
              class="form-quantity form-input w-16 rounded-r-none py-0 px-2 text-center"
              x-model="productQuantity"
              min="1"/>
            @endif
            <div class="flex flex-col">
              <span class="flex-1 cursor-pointer rounded-tr border border-l-0 border-grey-darker bg-white px-1"
                @click="productQuantity++">
                <i class="bx bxs-up-arrow pointer-events-none text-xs text-primary"></i>
              </span>
              <span class="flex-1 cursor-pointer rounded-br border border-t-0 border-l-0 border-grey-darker bg-white px-1"
                @click="productQuantity> 1 ? productQuantity-- : productQuantity=1"
              >
                <i class="bx bxs-down-arrow pointer-events-none text-xs text-primary"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="group flex pb-8">
          @unless ($product->is_selling == 'N' || $product->stock_amount == 0)
          <a x-bind:href="'/cart/{{ $product->id }}/' + productQuantity" class="btn btn-outline mr-4 md:mr-6">장바구니에 담기</a>
          <a x-bind:href="'/order/{{ $product->id }}/' + productQuantity" class="btn btn-primary">바로 구매</a>
          @endunless
        </div>
      </div>

        <p class="font-dohyeon text-secondary">
          <span class="pr-2">카테고리: </span>
          @foreach ($category as $index => $cate)
              @if ($index == (count($category)-1))
                {{ $cate }} 
              @else
                {{ $cate }} > 
              @endif
          @endforeach
        </p>
      </div>
      <!-- 상품 상단 기본 정보 End -->

    </div>
    <!-- 상품 상단 End -->

    <!-- 상품 설명 -->
    <div class="pb-16 sm:pb-20 md:pb-24" x-data="{ activeTab: 'description' }">

      <!-- 탭  -->
      <div class="tabs flex flex-col sm:flex-row" role="tablist">
        <span @click="activeTab = 'description'"
          class="tab-item cursor-pointer border-t-2 border-transparent bg-white px-10 py-5 text-center font-dohyeon font-bold text-secondary transition-colors hover:bg-grey-light sm:text-left"
          :class="{ 'active': activeTab=== 'description' }">
          상품 상세
        </span>
        
        <span @click="activeTab = 'additional-information'"
          class="tab-item cursor-pointer border-t-2 border-transparent bg-white px-10 py-5 text-center font-dohyeon font-bold text-secondary transition-colors hover:bg-grey-light sm:text-left"
          :class="{ 'active': activeTab=== 'additional-information' }">
          추가 정보
        </span>
        
        <span @click="activeTab = 'reviews'"
          class="tab-item cursor-pointer border-t-2 border-transparent bg-white px-10 py-5 text-center font-dohyeon font-bold text-secondary transition-colors hover:bg-grey-light sm:text-left"
          :class="{ 'active': activeTab=== 'reviews' }">
          상품 후기
        </span>

        <span @click="activeTab = 'qna'"
          class="tab-item cursor-pointer border-t-2 border-transparent bg-white px-10 py-5 text-center font-dohyeon font-bold text-secondary transition-colors hover:bg-grey-light sm:text-left"
          :class="{ 'active': activeTab=== 'qna' }">
          상품 문의
        </span>
      </div>
      <!-- 탭 End  -->

      <!-- 탭 contents -->
      <div class="tab-content relative">

        <!-- 상품 상세 -->
        <div :class="{ 'active': activeTab=== 'description' }"
          class="tab-pane bg-grey-light py-10 transition-opacity md:py-16"
          role="tabpanel">
          <div class="mx-auto w-5/6 text-center sm:text-left">
            <div class="font-dohyeon text-base text-secondary">
              {{ $product->detail }}
            </div>
          </div>
        </div>

        <!-- 추가 정보 -->
        <div :class="{ 'active': activeTab=== 'additional-information' }"
          class="tab-pane bg-grey-light py-10 transition-opacity md:py-16"
          role="tabpanel">
          <div class="mx-auto w-5/6">
            <div class="font-dohyeon text-base text-secondary">
              On the main compartment has multiple pockets available for your tools, chargers, make up, keys, etc. <br/><br/>  
              Size::13.4”Lx 6.5”W x 15.4”H. <br/> Weight: 1.57pounds. <br/> Color: light brown.
            </div>
          </div>
        </div>

        <!-- 상품 후기 -->
        <div :class="{ 'active': activeTab=== 'reviews' }"
          class="tab-pane bg-grey-light py-10 transition-opacity md:py-16"
          role="tabpanel">
          
          <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
            <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
            </div>
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
              Perfect for everyday use
            </p>
            <p class="pt-4 font-dohyeon text-secondary lg:w-5/6 xl:w-2/3">
              I loooveeeee this product!!! It feels so soft and smells like real leather!!! I ordered this fancy backpack looking for something that can be used at work and, at the same time, after work; and I found it.  Honestly.. Amazing!!
            </p>
            <div class="flex items-center justify-center pt-3 sm:justify-start">
              <p class="font-dohyeon text-sm text-grey-darkest">
                <span>By</span> Melanie Ashwood
              </p>
              <span class="block px-4 font-dohyeon text-sm text-grey-darkest">.</span>
              <p class="font-dohyeon text-sm text-grey-darkest">6 days ago</p>
            </div>
          </div>
          
          <div class="w-5/6 mx-auto border-b border-transparent pb-8 text-center sm:text-left">
            <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
            </div>
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
              Gift for my girlfriend
            </p>
            <p class="pt-4 font-dohyeon text-secondary lg:w-5/6 xl:w-2/3">
              I paid this thing thinking about my girlfriend’s birthday present, however I had my doubts cuz’ she is kind of picky. But Seriously, from now on, Elyssi is my best friend! She loved it!! She’s crazy about it!  DISCLAIMER: It is smaller than it appears. 
            </p>
            <div class="flex items-center justify-center pt-3 sm:justify-start">
              <p class="font-dohyeon text-sm text-grey-darkest">
                <span>By</span> Jake Houston
              </p>
              <span class="block px-4 font-dohyeon text-sm text-grey-darkest">.</span>
              <p class="font-dohyeon text-sm text-grey-darkest">4 days ago</p>
            </div>
          </div>
          
          <form class="mx-auto w-5/6">
            <div class="grid grid-cols-1 gap-x-10 gap-y-5 pt-10 sm:grid-cols-2">
              <div class="w-full">
                <label class="mb-2 block font-dohyeon text-sm text-secondary" for="name">Name</label>
                <input
                  type="text"
                  placeholder="Enter your Name"
                  class="form-input"
                  id="name"/>
              </div>
              <div class="w-full pt-10 sm:pt-0">
                <label class="mb-2 block font-dohyeon text-sm text-secondary" for="email">Email address</label>
                <input
                  type="email"
                  placeholder="Enter your email"
                  class="form-input"
                  id="email"/>
              </div>
            </div>
            <div class="grid grid-cols-1 gap-x-10 gap-y-5 pt-10 sm:grid-cols-2">
              <div class="w-full">
                <label class="mb-2 block font-dohyeon text-sm text-secondary" for="review_title">Review Title</label>
                <input
                  type="text"
                  placeholder="Enter your review title"
                  class="form-input"
                  id="review_title"/>
              </div>
              <div class="w-full pt-10 sm:pt-0">
                <label class="mb-2 block font-dohyeon text-sm text-secondary">Rating</label>
                <div class="flex pt-4">
                  <i class="bx bxs-star pr-1 text-xl text-grey-darker"></i>
                  <i class="bx bxs-star pr-1 text-xl text-grey-darker"></i>
                  <i class="bx bxs-star pr-1 text-xl text-grey-darker"></i>
                  <i class="bx bxs-star pr-1 text-xl text-grey-darker"></i>
                  <i class="bx bxs-star text-xl text-grey-darker"></i>
                </div>
              </div>
            </div>
            <div class="sm:w-12/25 pt-10">
              <label for="message" class="mb-2 block font-dohyeon text-sm text-secondary">Review Message</label>
              <textarea
                placeholder="Write your review here"
                class="form-textarea h-28"
                id="message"></textarea>
            </div>
          </form>

          <div class="mx-auto w-5/6 pt-8 pb-4 text-center sm:text-left md:pt-10">
            <a href="/" class="btn btn-primary">Submit Review</a>
          </div>
        </div>

        <!-- 상품 문의 -->
        <div :class="{ 'active': activeTab=== 'qna' }"
          class="tab-pane bg-grey-light py-10 transition-opacity md:py-16"
          role="tabpanel">
          
          <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
            <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
            </div>
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
              Perfect for everyday use
            </p>
            <p class="pt-4 font-dohyeon text-secondary lg:w-5/6 xl:w-2/3">
              I loooveeeee this product!!! It feels so soft and smells like real leather!!! I ordered this fancy backpack looking for something that can be used at work and, at the same time, after work; and I found it.  Honestly.. Amazing!!
            </p>
            <div class="flex items-center justify-center pt-3 sm:justify-start">
              <p class="font-dohyeon text-sm text-grey-darkest">
                <span>By</span> Melanie Ashwood
              </p>
              <span class="block px-4 font-dohyeon text-sm text-grey-darkest">.</span>
              <p class="font-dohyeon text-sm text-grey-darkest">6 days ago</p>
            </div>
          </div>
          
          <div class="w-5/6 mx-auto border-b border-transparent pb-8 text-center sm:text-left">
            <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
              <i class="bx bxs-star text-primary"></i>
            </div>
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
              Gift for my girlfriend
            </p>
            <p class="pt-4 font-dohyeon text-secondary lg:w-5/6 xl:w-2/3">
              I paid this thing thinking about my girlfriend’s birthday present, however I had my doubts cuz’ she is kind of picky. But Seriously, from now on, Elyssi is my best friend! She loved it!! She’s crazy about it!  DISCLAIMER: It is smaller than it appears. 
            </p>
            <div class="flex items-center justify-center pt-3 sm:justify-start">
              <p class="font-dohyeon text-sm text-grey-darkest">
                <span>By</span> Jake Houston
              </p>
              <span class="block px-4 font-dohyeon text-sm text-grey-darkest">.</span>
              <p class="font-dohyeon text-sm text-grey-darkest">4 days ago</p>
            </div>
          </div>
          
          <div class="mx-auto w-5/6 pt-8 pb-4 text-center sm:text-left md:pt-10">
            <a href="/" class="btn btn-primary">Submit Review</a>
          </div>
        </div>

      </div>
      <!-- 탭 contents End -->
    </div>
    <!-- 상품 설명 End -->

    <!-- 연관 상품  -->
    <div class="pb-20 md:pb-32">
      <div class="mb-12 text-center">
        <h2 class="font-butler text-3xl text-secondary md:text-4xl lg:text-4.5xl">
          이 상품과 비슷한 상품
        </h2>
        <p class="pt-2 pb-6 font-dohyeon text-lg text-secondary-lighter sm:pb-8 md:text-xl lg:pb-0">
          {{ \App\Models\Category::find($product->category)->name }}를 찾으시나요?
        </p>
      </div>

      <!-- 상품 슬라이드 -->
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
          <div class="splide__arrow--prev group absolute left-25 top-50 z-30 -translate-y-1/2 transform cursor-pointer rounded-full border border-grey-dark bg-grey shadow-md transition-all hover:bg-secondary sm:left-35 md:left-0">
            <div class="flex h-12 w-12 items-center justify-center">
              <i class="bx bx-chevron-left text-3xl leading-none text-secobg-secondary transition-colors group-hover:text-white"></i>
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
            
          @foreach ($others as $other)
            <div class="splide__slide group relative pt-16 md:pt-0">
              <div class="sm:px-5 lg:px-4">
                <div class="relative flex items-center justify-center rounded">
                  <div class="aspect-w-1 aspect-h-1 w-full">
                    @foreach ($other->images as $image)
                      @if ($image->type == 'main')
                    <img src="{{ asset('storage/'.$image->image) }}"
                      alt="product image"
                      class="object-cover"/>
                      @endif
                    @endforeach
                  </div>
                  <div class="absolute top-0 right-0 m-4 rounded-full bg-white px-5 py-1">
                    <p class="text-v-green font-dohyeon font-bold text-sm uppercase tracking-wide">
                      New
                    </p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
                    <a href="/cart/{{ $other->id }}"
                      class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                      <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                        class="h-6 w-6"
                        alt="icon cart"/>
                    </a>
                    <a href="/product/{{ $other->id }}"
                      class="mr-3 flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                      <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                        class="h-6 w-6"
                        alt="icon search"/>
                    </a>
                    <a href="/account/wishlist/{{ $other->id }}"
                      class="flex items-center rounded-full bg-white p-3 transition-all hover:bg-secondary">
                      <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                        class="h-6 w-6"
                        alt="icon heart"/>
                    </a>
                  </div>
                </div>
                <a href="/product/{{ $other->id }}" class="flex items-center justify-between pt-6">
                  <div>
                    <h3 class="font-dohyeon text-base text-secondary">
                      {{ $other->name }}
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
                  <span class="flex justify-end font-dohyeon text-sm text-primary">{{ number_format($product->selling_price) }} 원</span>
                </a>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
      
      </div>
      <!-- 상품 슬라이드 End -->

    </div>
    <!-- 연관 상품 End -->

  </div>
  <!-- container End  -->

</div>

@include('layouts.foot')