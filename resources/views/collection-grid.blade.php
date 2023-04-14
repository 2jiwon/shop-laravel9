@include('layouts.head')

<div>

  <!-- container 시작 -->
  <div class="container">

    <!-- collection 배너 -->
    <div class="relative flex">
      <div class="ml-auto h-36 w-3/4 bg-cover bg-center bg-no-repeat lg:h-48" style=""></div>
      <div class="bg-primary absolute top-0 left-0 h-36 w-full bg-cover bg-no-repeat lg:h-48">
        <div class="flex flex-row py-14 px-5 xl:py-20 md:px-10 xl:px-20">
          <div class="w-1/4 xl:w-1/6 justify-start items-center">
            <h1 class="font-gowunbatang text-xl text-white sm:text-2xl md:text-3.5xl lg:text-4xl">
              {{ $title }}
            </h1>
          </div>
          <div class="w-3/4 xl:w-2/3 pt-0 md:pt-3 justify-end items-center">
            <h3 class="font-dohyeon text-sm md:text-xl text-secondary">
              {{ $sub }}
            </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- collection 배너 End -->

    <div x-data="{
        products : [
            @foreach ($products as $product)
              { 
                id: '{{ $product->id }}',
                name: '{{ $product->name }}',
                price: '{{ number_format($product->selling_price) }}',
                origin_price: '{{ $product->selling_price }}',
            @foreach ($product->images as $image)
              @if ($image->type == 'main')
                image: '{{ $image->image }}',
              @endif
            @endforeach
                cnt: '{{ $product->view_cnt }}'
              },
            @endforeach
          ],
        sort (priority) {
          if (priority == 1) 
              this.products.sort((a, b) => (parseInt(a.origin_price) > parseInt(b.origin_price)) ? 1 : -1);
          else if (priority == 2)
              this.products.sort((a, b) => (parseInt(a.origin_price) < parseInt(b.origin_price)) ? 1 : -1);
          else
              this.products.sort((a, b) => (parseInt(a.cnt) > parseInt(b.cnt)) ? -1 : 1);
          
              console.log(this.products);
        }
      }">
     


    <!-- filter, sort -->
      <div class="flex flex-col justify-between py-10 sm:flex-row">
        <div class="flex items-center justify-start">
          <i class="bx bxs-filter-alt text-xl text-primary"></i>
          <p class="block px-2 font-dohyeon leading-none text-secondary md:text-lg">
            보기
          </p>
          <div class="flex items-center rounded border border-grey-darker p-2">
            <a href="/collection/{{ $type }}/list">
              <i class="bx bx-menu block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i>
            </a>
            <div class="mx-2 h-4 w-px bg-grey-darker"></div>
            <a href="/collection/{{ $type }}/grid">
              <i class="bx bxs-grid block text-xl leading-none text-grey-darker transition-colors hover:text-secondary-light"></i>
            </a>
          </div>
        </div>

        <div class="mt-6 flex w-80 items-center justify-start sm:mt-0 sm:justify-end">
          <span class="mr-2 -mt-2 inline-block font-dohyeon text-secondary md:text-lg">정렬</span>
          <select class="form-select w-2/3" @change="sort($event.target.value)">
            <option value="0">정확도 순</option>
            <option value="1">가격 낮은순</option>
            <option value="2">가격 높은순</option>
          </select>
        </div>
      </div>
    <!-- filter, sort End -->


    <!-- 상품 grid  -->
    <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      
    <template x-for="pd in products" :key="pd.id">
      <!-- 상품 블록 한개 -->
      <div class="group relative w-full lg:last:hidden xl:last:block">
        <div class="relative flex items-center justify-center rounded">
          
          <div class="h-68 w-full bg-cover bg-center bg-no-repeat"
            :style="{ backgroundImage: 'url(/storage/' + pd.image + ')' }"></div>
          <span class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-dohyeon font-bold  text-v-green text-sm uppercase tracking-wide">
            {{ $type }}
          </span>

          <div class="group absolute inset-0 flex items-center justify-center bg-primary py-28 bg-opacity-50 opacity-0 transition-opacity group-hover:opacity-100">
            <a :href="'javascript:addTo(\'cart\', ' + pd.id +', 1)'"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/cart.svg') }}"
                class="h-6 w-6"
                alt="icon cart"/>
            </a>
            <a :href="'/product/'+pd.id"
              class="mr-3 flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/watch.svg') }}"
                class="h-6 w-6"
                alt="icon search"/>
            </a>
            <a :href="'javascript:addTo(\'wishlist\', '+pd.id+', 1)'"
              class="flex items-center rounded-full bg-white px-3 py-3 transition-all hover:bg-secondary">
              <img src="{{ asset('assets/theme/icons/wishlist.svg') }}"
                class="h-6 w-6"
                alt="icon heart"/>
            </a>
          </div>
        </div>
        <div class="flex items-center justify-between pt-6">
          <div>
            <h3 class="font-dohyeon text-base text-secondary" x-text="pd.name"></h3>
            <!-- <div class="flex items-center">
              <div class="flex items-center">
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
                <i class="bx bxs-star text-primary"></i>
              </div>
              <p class="ml-2 font-dohyeon text-sm text-secondary">
                (45)
              </p>
            </div> -->
          </div>
          <span class="font-dohyeon text-xl font-bold text-primary" x-text="pd.price + ' 원'"></span>
        </div>
      </div>
     </template> 
    
    
    </div>
    <!-- x-data end -->


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