@include('layouts.head')

<div>

<div class="container border-t border-grey-dark pt-10 sm:pt-12">

  <div class="flex flex-col-reverse justify-between pb-16 sm:pb-20 lg:flex-row lg:pb-24">
    <div class="lg:w-3/5 mt-10 lg:mt-0">
        <h1 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
          장바구니
        </h1>

        <div class="pt-8">

          @if (empty($cartList))
            <div class="mb-0 hidden flex-row items-center justify-center border-b border-grey-dark py-3 md:flex">
              <p>비어있어요.</p>
            </div>
          @else

            <div class="hidden sm:block">
              <div class="flex justify-between border-b border-grey-darker">
                <div class="w-1/2 pl-8 pb-2 sm:pl-12 lg:w-3/5 xl:w-1/2">
                  <span class="font-hkbold text-sm uppercase text-secondary">상품명</span>
                </div>
                <div class="w-1/4 pb-2 text-right sm:mr-2 sm:w-1/6 md:mr-18 lg:mr-12 lg:w-1/5 xl:mr-18 xl:w-1/4">
                  <span class="font-hkbold text-sm uppercase text-secondary">수량</span>
                </div>
                <div class="w-1/4 pb-2 text-right md:pr-10 lg:w-1/5 xl:w-1/4">
                  <span class="font-hkbold text-sm uppercase text-secondary">가격</span>
                </div>
              </div>
            </div>
        
            <!-- PC용 -->
            @foreach ($cartList as $cart)
              @php
                $product = \App\Models\Product::find($cart[0]);
              @endphp
              <div 
                x-data="{
                    productQuantity: {{ $cart[1] }}, 
                    price : {{ $product->selling_price }}
              }">
                <div class="mb-0 hidden flex-row items-center justify-between border-b border-grey-dark py-3 md:flex">
                  <i class="bx bx-x mr-6 cursor-pointer text-2xl text-grey-darkest sm:text-3xl"></i>
                  <div class="flex w-1/2 flex-row items-center border-b-0 border-grey-dark pt-0 pb-0 text-left lg:w-3/5 xl:w-1/2">
                    <div class="relative mx-0 w-20 pr-0">
                      <div class="flex h-20 items-center justify-center rounded">
                        <div class="aspect-w-1 aspect-h-1 w-full">
                          <img src="{{ asset('storage/'.$product->images->pluck('image')->first()) }}" alt="product image" class="object-cover"/>
                        </div>
                      </div>
                    </div>
                    <span class="mt-2 ml-4 font-hk text-base text-secondary">{{ $product->name }}</span>
                  </div>
                  <div class="w-full border-b-0 border-grey-dark pb-0 text-center sm:w-1/5 xl:w-1/4">
                    <div class="mx-auto mr-8 xl:mr-4">
                      <div class="flex justify-center">
                        <input class="form-quantity form-input w-16 rounded-r-none py-0 px-2 text-center"
                                type="number" 
                                id="quantity-form-desktop"
                                x-model="productQuantity" 
                                min="1" />
                        <div class="flex flex-col">
                          <span class="flex-1 cursor-pointer rounded-tr border border-l-0 border-grey-darker bg-white px-1"
                                @click="productQuantity++">
                            <i class="bx bxs-up-arrow pointer-events-none text-xs text-primary"></i>
                          </span>
                          <span class="flex-1 cursor-pointer rounded-br border border-t-0 border-l-0 border-grey-darker bg-white px-1"
                                @click="productQuantity> 1 ? productQuantity-- : productQuanity=1">
                            <i class="bx bxs-down-arrow pointer-events-none text-xs text-primary"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="w-1/4 pr-10 pb-4 text-right lg:w-1/5 xl:w-1/4 xl:pr-10">
                    <p class="font-hk text-secondary" id="price"><span x-text="(productQuantity * price).toLocaleString()"></span> 원</p>
                  </div>
                </div>
                <!-- PC용 End -->

                <!-- 모바일용 -->
                <div class="mb-5 flex items-center justify-center border-b border-grey-dark pb-5 md:hidden">
                  <div class="relative w-1/3">
                    <div class="aspect-w-1 aspect-h-1 w-full">
                      <img src="{{ asset('storage/'.$product->images->pluck('image')->first()) }}" alt="product image" class="object-cover"/>
                    </div>
                    <div class="absolute top-0 right-0 -mt-2 -mr-2 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full border border-grey-dark bg-white shadow">
                      <i class="bx bx-x text-xl text-grey-darkest"></i>
                    </div>
                  </div>
                  <div class="pl-4">
                    <span class="mt-2 font-hk text-base font-bold text-secondary">{{ $product->name }}</span>
                    <p class="block font-hk text-secondary"><span x-text="(productQuantity * price).toLocaleString()"></span> 원</p>
                    <div class="mt-2 flex w-2/3 sm:w-5/6">
                      <input class="form-quantity form-input w-12 rounded-r-none py-1 px-2 text-center"
                        type="number"
                        id="quantity-form-mobile"
                        x-model="productQuantity"
                        min="1"/>
                      <div class="flex flex-row">
                        <span class="flex flex-1 cursor-pointer items-center justify-center border border-l-0 border-grey-darker bg-white px-2"
                              @click="productQuantity> 1 ? productQuantity-- : productQuanity=1">
                          <i class="bx bxs-down-arrow pointer-events-none text-xs text-primary"></i></span>
                        <span class="flex flex-1 cursor-pointer items-center justify-center rounded-r border border-l-0 border-grey-darker bg-white px-2"
                              @click="productQuantity++">
                          <i class="bx bxs-up-arrow pointer-events-none text-xs text-primary"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- 모바일용 End -->
              </div>
              @endforeach
          @endif
        </div>
      
      <div class="flex flex-col pt-8 sm:flex-row sm:items-center sm:justify-between sm:pt-12">
        <a href="javascript:history.back();" class="btn btn-outline text-xl">쇼핑 계속하기</a>
        <a href="/" class="btn btn-primary mt-5 sm:mt-0 text-xl">수정</a>
      </div>
    </div>
    
    <div class="mt-auto mb-0 sm:w-2/3 md:w-full lg:mx-0 lg:mb-0 lg:w-1/3">
      <div class="bg-grey-light py-8 px-8">
        <h4 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
          계산하기
        </h4>
        
        <!-- <div class="pt-4">
          <p class="font-hkbold pt-1 pb-4 text-secondary">쿠폰</p>
          <div class="flex justify-between">
            <label for="discount_code" class="relative block h-0 w-0 overflow-hidden">할인코드 입력</label>
            <input class="form-input w-3/5 xl:w-2/3"
              type="text"
              placeholder="Discount code"
              id="discount_code"/>
            <button class="btn btn-outline btn-sm ml-4 w-2/5 lg:ml-2 xl:ml-4 xl:w-1/3" aria-label="Apply button">
              확인
            </button>
          </div>
        </div> -->
        <div class="mb-12 pt-4">
          <p class="font-hkbold pt-1 pb-2 text-secondary">합계</p>
          <div class="flex justify-between border-b border-grey-darker pb-1">
            <span class="font-hk text-secondary">주문금액</span>
            <span class="font-hk text-secondary" id="totalPrice"></span>
          </div>
          <!-- <div class="flex justify-between border-b border-grey-darker pt-2 pb-1">
            <span class="font-hk text-secondary">할인</span>
            <span class="font-hk text-secondary">-$36</span>
          </div> -->
          <div class="flex justify-between border-b border-grey-darker pt-2 pb-1">
            <span class="font-hk text-secondary">배송비</span>
            <span class="font-hk text-secondary"></span>
          </div>
          <div class="flex justify-between pt-3">
            <span class="font-hkbold text-secondary">총 합계</span>
            <span class="font-hkbold text-secondary"></span>
          </div>
        </div>
        <a href="/cart/customer-info" class="btn btn-primary text-2xl w-full">주문하기</a>
      </div>
    </div>
  </div>
</div>

<script>
/**
 * 주문금액 계산 부분
 */
document.addEventListener('DOMContentLoaded', () => {
  checkTotalPrice();

  let quantityInputs = document.querySelectorAll("#quantity-form-desktop + div > .cursor-pointer");
  quantityInputs.forEach(qInputs => {
    console.log(qInputs);
    qInputs.addEventListener('click', checkTotalPrice);
  });
});


function checkTotalPrice() {
  let els = document.querySelectorAll("#price");
  let temp = 0;
  els.forEach(el => {
    temp += Number(el.firstChild.innerText.split(",").join(""));
  });

  console.log(temp);
  let el = document.querySelector("#totalPrice");
  el.innerText = temp.toLocaleString() + " 원";
}
</script>

@include('layouts.foot')