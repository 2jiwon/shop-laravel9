@include('layouts.head')

  @include('layouts.account.side')

    <!-- 메인 컨텐츠 -->
    <div class="mt-12 lg:mt-0 lg:w-3/4">
      <div class="bg-grey-light py-8 px-5 md:px-8">
        <h1 class="font-hkbold pb-6 text-center text-2xl text-secondary sm:text-left">
          주문 현황
        </h1>
        <div class="hidden sm:block">
          <div class="flex justify-between pb-3">
            <div class="w-1/3 pl-4 md:w-2/5">
              <span class="font-hkbold text-sm uppercase text-secondary">상품명</span>
            </div>
            <div class="w-1/4 text-center xl:w-1/5">
              <span class="font-hkbold text-sm uppercase text-secondary">수량</span>
            </div>
            <div class="mr-3 w-1/6 text-center md:w-1/5">
              <span class="font-hkbold text-sm uppercase text-secondary">가격</span>
            </div>
            <div class="w-3/10 text-center md:w-1/5">
              <span class="font-hkbold pr-8 text-sm uppercase text-secondary md:pr-16 xl:pr-8">상태</span>
            </div>
          </div>
        </div>

        @php
          $perPage = 5;
          $currentPage = empty(request()->page) ? 1 : request()->page;
          $total = count($orders);
          $target = ($currentPage - 1) * $perPage;
          $total_pages = ceil($total / $perPage);
        @endphp

        @for ($i = 0; $i < $perPage; $i++)
          @if (($target + $i) < $total)

            @php
              $order = $orders[$target + $i];
            @endphp
              <div class="mb-3 flex flex-col items-center justify-between rounded bg-white px-4 py-5 shadow sm:flex-row sm:py-4">
                <div class="flex w-full flex-col border-b border-grey-dark pb-4 text-center sm:w-1/3 sm:border-b-0 sm:pb-0 sm:text-left md:w-2/5 md:flex-row md:items-center">
                  <span class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary">
                    {{ $order->updated_at }}
                  </span>
                </div>
              </div>
              
              @php
                $product = $products[$order->id];
                $quantity = $quantities[$order->id];
              @endphp

              @for ($j = 0; $j < count($product); $j++)
                @php
                  $image = \App\Models\ProductImage::where('product_id', $product[$j]->id)->where('type', 'main')->value('image');
                @endphp
              <div class="mb-3 flex flex-col items-center justify-between rounded bg-white px-4 py-5 shadow sm:flex-row sm:py-4">
                <div class="flex w-full flex-col border-b border-grey-dark pb-4 text-center sm:w-1/3 sm:border-b-0 sm:pb-0 sm:text-left md:w-2/5 md:flex-row md:items-center">
                  <span class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">상품명</span>
                  <div class="relative mx-auto w-20 sm:mx-0 sm:mr-3 sm:pr-0">
                    <div class="aspect-w-1 aspect-h-1 w-full">
                      <img src="{{ asset('storage/'.$image) }}"
                        alt="product image"
                        class="object-cover"/>
                    </div>
                  </div>
                  <span class="mt-2 font-hk text-base text-secondary">{{ $product[$j]->name }}</span>
                </div>
                <div class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/5 sm:border-b-0 sm:pb-0">
                  <span class="font-hkbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">수량</span>
                  <span class="font-hk text-secondary">{{ $quantity[$j] }}</span>
                </div>
                <div class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/6 sm:border-b-0 sm:pr-6 sm:pb-0 sm:text-right xl:w-1/5 xl:pr-16">
                  <span class="font-hkbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">가격</span>
                  <span class="font-hk text-secondary">{{ $product[$j]->selling_price }}</span>
                </div>
                <div class="w-full text-center sm:w-3/10 sm:text-right md:w-1/4 xl:w-1/5">
                  <div class="pt-3 sm:pt-0">
                    <p class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">
                      상태
                    </p>
                    <x-spanbox status="{{ $order->status }}">{{ \App\Models\Order::$status[$order->status] }}</x-spanbox>
                  </div>
                </div>
              </div>
              @endfor
          
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