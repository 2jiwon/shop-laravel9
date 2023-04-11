@include('layouts.head')

<!-- 컨텐츠 -->
<div class="container">

  <!-- 검색 입력 -->
  <div class="flex">
    <div class="top-0 left-0 h-40 w-full md:h-40">
      <div class="py-8 px-4 text-center sm:px-10 lg:px-10">
        
        <form class="flex justify-center pt-6 md:pt-8" method="POST" action="{{ route('search') }}">
          @csrf
          <input
            type="text"
            name="word"
            placeholder="어떤 상품을 찾으시나요?"
            class="w-3/5 rounded-l px-6 md:w-2/5 lg:w-1/3 xl:w-1/4"/>
          <button type="submit" class="coursor-pointer rounded-r border-transparent btn-outline px-8 py-3 transition-all focus:outline-none">
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
      

    @if (isset($products))
      @if (is_array($products))
      @foreach ($products as $product)
      <div class="group relative w-full lg:last:hidden xl:last:block">
        <div class="relative flex items-center justify-center rounded">
          @foreach ($product->images as $image)
            @if ($image->type == 'main')
          <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
            style="background-image:url({{ asset('storage/'.$image->image) }})"></div>
            @endif
          @endforeach

          <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-v-green text-sm uppercase tracking-wide">
            {{ $product->type }}
          </span>

          <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-opacity group-hover:opacity-100">
            <a href="javascript:addTo('cart',{{ $product->id }}, 1);"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a href="/product/{{ $product->id }}"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a href="javascript:addTo('wishlist',{{ $product->id }}, 1);"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-hk text-base text-secondary">
             {{ $product->name }}
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
          <span class="font-hk text-xl font-bold text-primary">{{ $product->selling_price }} 원</span>
        </div>
      </div>
      @endforeach
    @elseif ($products == "empty")
        <div class="relative flex items-center justify-center rounded">
          <p>찾으시는 상품이 없습니다.</p>
        </div>
    @endif
    @endif
      
     
      
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