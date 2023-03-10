@include('layouts.head')

  @include('layouts.account.side')

    <!-- 메인 컨텐츠 -->
     <div class="mt-12 lg:mt-0 lg:w-3/4">
      <div class="bg-grey-light py-8 px-5 md:px-8">
        <h1 class="font-hkbold pb-6 text-center text-2xl text-secondary sm:text-left">
          장바구니
        </h1>

        <div class="hidden sm:block">
          <div class="flex justify-between pb-3">
            <div class="w-1/2 pl-8 pb-2 sm:pl-12 lg:w-3/5 xl:w-1/2">
              <span class="font-hkbold text-sm uppercase text-secondary">상품명</span>
            </div>
            <div class="w-1/6 pb-2 text-center sm:mr-2 sm:w-1/6 md:mr-18 lg:mr-12 lg:w-1/5 xl:mr-18 xl:w-1/6">
              <span class="font-hkbold text-sm uppercase text-secondary">수량</span>
            </div>
            <div class="w-1/6 pb-2 text-right md:pr-10 lg:w-1/5 xl:w-1/6">
              <span class="font-hkbold text-sm uppercase text-secondary">가격</span>
            </div>
            <div class="w-1/6 pb-2 text-right md:pr-10 lg:w-1/5 xl:w-1/6">
              <span class="font-hkbold text-sm uppercase text-secondary"></span>
            </div>
          </div>
        </div>
        
        <div class="mb-3 flex flex-col items-center justify-between rounded bg-white px-4 py-5 shadow sm:flex-row sm:py-4">
          <div class="flex w-full flex-col border-b border-grey-dark pb-4 text-center sm:w-1/3 sm:border-b-0 sm:pb-0 sm:text-left md:w-2/5 md:flex-row md:items-center">
            <span class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">상품명</span>
              <div class="relative mx-auto w-20 sm:mx-0 sm:mr-3 sm:pr-0">
                <div class="aspect-w-1 aspect-h-1 w-full">
                  <img src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/shoes-3.png"
                  alt="product image"
                  class="object-cover"/>
                </div>
              </div>
              <span class="mt-2 ml-4 font-hk text-base text-secondary">Classic Beige</span>
            </div>
            <div class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/5 sm:border-b-0 sm:pb-0">
              <div class="mx-auto mr-8 xl:mr-4 my-4">
                <div class="flex justify-center" x-data="{ productQuantity: 1 }">
                  <input class="form-quantity form-input w-16 rounded-r-none py-0 px-2 text-center"
                    type="number" id="quantity-form-desktop"
                    x-model="productQuantity" min="1"/>
                  <div class="flex flex-col">
                    <span class="flex-1 cursor-pointer rounded-tr border border-l-0 border-grey-darker bg-white px-1"
                      @click="productQuantity++">
                      <i class="bx bxs-up-arrow pointer-events-none text-xs text-primary"></i></span>
                    <span class="flex-1 cursor-pointer rounded-br border border-t-0 border-l-0 border-grey-darker bg-white px-1"
                      @click="productQuantity> 1 ? productQuantity-- : productQuanity=1">
                      <i class="bx bxs-down-arrow pointer-events-none text-xs text-primary"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-1/4 my-4 pr-10 pb-4 text-center lg:w-1/5 xl:w-1/4 xl:pr-10">
              <span class="font-hk text-secondary">$1045</span>
            </div>
            <i class="bx bx-x mr-6 cursor-pointer text-2xl text-grey-darkest sm:text-3xl"></i>
          </div>



        </div>
      
      <div class="flex flex-col pt-8 sm:flex-row sm:items-center sm:justify-between sm:pt-12">
        <a href="/collection-list" class="btn btn-outline text-xl">쇼핑 계속하기</a>
        <a href="/" class="btn btn-primary mt-5 sm:mt-0 text-xl">수정</a>
      </div>
    </div>
  
    </div>
    <!-- 메인 컨텐츠 End -->
    
@include('layouts.account.foot')