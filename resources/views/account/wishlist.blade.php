@include('layouts.head')

  @include('layouts.account.side')

    <!-- 메인 컨텐츠 -->
    <div class="mt-12 lg:mt-0 lg:w-3/4">
      <div class="bg-grey-light py-8 px-5 md:px-8">
        <h1 class="font-hkbold pb-6 text-center text-2xl text-secondary sm:text-left">
          위시리스트
        </h1>
        <div class="hidden sm:block">
          <div class="flex justify-between pb-3">
            <div class="w-1/3 pl-4 md:w-2/5">
              <span class="font-hkbold text-sm uppercase text-secondary">상품명</span>
            </div>
            <div class="mr-3 w-1/6 text-center md:w-1/5">
              <span class="font-hkbold text-sm uppercase text-secondary">가격</span>
            </div>
            <div class="w-3/10 text-center md:w-1/12">
              <span class="font-hkbold pr-8 text-sm uppercase text-secondary md:pr-16 xl:pr-8">액션</span>
            </div>
            <div class="w-3/10 text-center md:w-1/12">
              <span class="font-hkbold pr-8 text-sm uppercase text-secondary md:pr-16 xl:pr-8">삭제</span>
            </div>
          </div>
        </div>
        
        @php
          $perPage = 3;
          $currentPage = empty(request()->page) ? 1 : request()->page;
          $total = count($wishlist);
          $target = ($currentPage - 1) * $perPage;
          $total_pages = ceil($total / $perPage);
        @endphp

        @for ($i = 0; $i < $perPage; $i++)
          @if (($target + $i) < $total)
            @php
              $product = \App\Models\Product::find($wishlist[$target + $i][0]);
            @endphp
            <div class="mb-3 flex flex-col items-center justify-between rounded bg-white px-4 py-5 shadow sm:flex-row sm:py-4">
              <a href="/product/{{ $product->id }}" class="flex w-full flex-col border-b border-grey-dark pb-4 text-center sm:w-1/3 sm:border-b-0 sm:pb-0 sm:text-left md:w-2/5 md:flex-row md:items-center">
                <span class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">상품명</span>
                <div class="relative mx-auto w-20 sm:mx-0 sm:mr-3 sm:pr-0">
                  <div class="aspect-w-1 aspect-h-1 w-full">
                    <img src="{{ asset('storage/'.$product->images->pluck('image')->first()) }}" alt="product image" class="object-cover"/>
                  </div>
                </div>
                <span class="mt-2 font-hk text-base text-secondary">{{ $product->name }}</span>
              </a>
              <div class="w-full pb-4 text-center sm:w-1/6 sm:pr-6 sm:pb-0 sm:text-right xl:w-1/5 xl:pr-16">
                <span class="font-hkbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">가격</span>
                <span class="font-hk text-secondary">{{ number_format($product->selling_price) }} 원</span>
              </div>
              <a href="javascript:addTo('cart', {{ $product->id }}, 1);" class="btn btn-primary whitespace-nowrap">장바구니에 담기</a>
              <i class="bx bx-x mr-6 cursor-pointer text-2xl text-grey-darkest sm:text-3xl" onclick="deleteFromWishlist({{ $product->id }});"></i>
            </div>
          @endif
        @endfor
      
        <!-- pagination -->
        <div class="flex justify-center pt-6 md:justify-end">
          <span class="cursor-pointer pr-5 font-nanumgothic font-semibold text-grey-darkest transition-colors hover:text-black">이전</span>
          @for ($i = 1; $i <= $total_pages; $i++)
          <a href="?page={{ $i }}" target="_self">
            <span class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-gowunbatang text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">{{ $i }}</span>
          </a>
          @endfor
          <span class="cursor-pointer pl-2 font-nanumgothic font-semibold text-grey-darkest transition-colors hover:text-black">다음</span>
        </div>
        <!-- pagination End -->
        
      </div>
    </div>
    <!-- 메인 컨텐츠 End -->

  @include('layouts.account.foot')