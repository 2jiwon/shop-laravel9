@include('layouts.head')

<div>

  <!-- container 시작 -->
  <div class="container">

    <!-- collection 배너 -->
    <div class="relative flex">
      <div class="ml-auto h-36 w-3/4 bg-cover bg-center bg-no-repeat lg:h-48"
        style=""></div>
      <div class="bg-primary absolute top-0 left-0 h-36 w-full bg-cover bg-no-repeat lg:h-48">
        <div class="py-20 px-6 sm:px-12 lg:px-20">
          <h1 class="font-gowunbatang text-xl text-white sm:text-2xl md:text-3.5xl lg:text-4xl">
            카테고리 :: 
             @foreach ($category as $index => $cate)
                @if ($index == (count($category)-1))
                  {{ $cate }} 
                @else
                  {{ $cate }} ·
                @endif
              @endforeach
          </h1>
          <div class="flex pt-2">
            <!-- <span class="font-dohyeon text-base text-white">Collection Grid</span> -->
          </div>
        </div>
      </div>
    </div>
    <!-- collection 배너 End -->

    <!-- filter, sort -->
    <div class="flex flex-col justify-between py-10 sm:flex-row">
      <div class="flex items-center justify-start">
        <i class="bx bxs-filter-alt text-xl text-primary"></i>
        <p class="block px-2 font-dohyeon leading-none text-secondary md:text-lg">
          Filter
        </p>
        <div class="flex items-center rounded border border-grey-darker p-2">
          <a href="/category/{{$id}}/list">
            <i class="bx bx-menu block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i>
          </a>
          <div class="mx-2 h-4 w-px bg-grey-darker"></div>
          <a href="/category/{{$id}}/grid">
            <i class="bx bxs-grid block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i>
          </a>
        </div>
      </div>

      <div class="mt-6 flex w-80 items-center justify-start sm:mt-0 sm:justify-end">
        <span class="mr-2 -mt-2 inline-block font-dohyeon text-secondary md:text-lg">Sort by:</span>
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

    @foreach ($products as $product)
      <!-- 상품 블록 한개 -->
      <div class="w-full">
        <div class="shadow-none rounde group flex flex-col items-center border border-grey-dark transition-shadow hover:shadow-lg sm:flex-row">
          <div class="relative w-full sm:w-2/5 lg:w-5/11">
            <div class="relative rounded-l">
              @foreach ($product->images as $image)
                @if ($image->type == 'main')
              <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
                style="background-image:url({{ asset('storage/'.$image->image) }})"></div>
                @endif
              @endforeach 
              
              <div class="group absolute inset-0 flex items-center justify-center bg-primary bg-opacity-50 py-28 opacity-0 transition-all hover:shadow-lg group-hover:opacity-100">
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
                <a href="/account/wishlist/{{ $product->id }}"
                  class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
                  <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                    class="h-6 w-6"
                    alt="icon heart"/>
                </a>
              </div>
            </div>
          </div>
          <div class="w-full px-6 py-6 sm:w-3/5 sm:py-0 lg:w-6/11">
            <h3 class="font-hk text-xl text-grey-darkest xl:text-2xl">
              {{ $product->name }}
            </h3>
            <span class="block pt-1 font-hk text-xl font-bold text-secondary">{{ number_format($product->selling_price ) }} 원</span>
            <!-- <span class="block pt-4 font-hk text-base font-bold text-v-green">In Stock</span> -->
            <p class="pt-2 font-hk text-sm text-grey-darkest xl:text-base">
              {{ mb_substr($product->detail, 0, 100) }}
            </p>
            <!-- <div class="flex items-center pt-3 xl:pt-5">
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
            </div> -->
          </div>
        </div>
      </div>
    @endforeach
      
    </div>
    <!-- 상품 grid End -->
    
    <!-- pagination -->
    <div class="mx-auto flex justify-center py-16" id="paginate">
      {{ $products->links() }}
    </div>
    <!-- pagination End -->

  </div>
  <!-- container End  -->

  <style>
  #paginate nav:nth-child(1) p {
      display: none !important;
  }
  </style>
@include('layouts.foot')