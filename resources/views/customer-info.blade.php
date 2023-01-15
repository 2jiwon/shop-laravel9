@include('layouts.head')

<div class="container border-t border-grey-dark pt-10 sm:pt-12">

  <div class="flex flex-col-reverse justify-between pb-16 sm:pb-20 lg:flex-row lg:pb-24">
    
    <div class="lg:w-3/5 mt-10 lg:mt-0">
      <h1 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
        주문 2단계 > 배송 정보 확인
      </h1>
        
      <div class="pt-8">
        <div class="flex flex-col-reverse items-center justify-between sm:flex-row">
          <h1 class="font-hk text-xl font-medium text-secondary md:text-2xl">
            연락처
          </h1>
        </div>
        <div class="pt-4 md:pt-5">
          <input
            type="email"
            placeholder="Enter your email address"
            class="form-input"
            id="email"/>
          <div class="flex items-center pt-4">
            <input type="checkbox" class="form-checkbox" id="offers"/>
            <p class="pl-3 font-hk text-sm text-secondary">
              Keep me up to date on news and exclusive offers
            </p>
          </div>
        </div>
      </div>

      <div class="pt-4 pb-10">
        <h4 class="text-center font-hk text-xl font-medium text-secondary sm:text-left md:text-2xl">
          Shipping address
        </h4>
        <div class="pt-4 md:pt-5">
          <div class="flex justify-between">
            <input
              type="text"
              placeholder="First Name"
              class="form-input mb-4 mr-2 sm:mb-5"
              id="first_name"/>
            <input
              type="text"
              placeholder="Last Name"
              class="form-input mb-4 ml-1 sm:mb-5"
              id="last_name"/>
          </div>

          <input
            type="text"
            placeholder="You address"
            class="form-input mb-4 sm:mb-5"
            id="address"/>

          <input
            type="text"
            placeholder="Apartment, Suite, etc"
            class="form-input mb-4 sm:mb-5"
            id="address2"/>
          <input
            type="text"
            placeholder="City"
            class="form-input mb-4 sm:mb-5"
            id="city"/>
          <div class="flex justify-between">
            <input
              type="text"
              placeholder="Country/Region"
              class="form-input mb-4 mr-2 sm:mb-5"
              id="country"/>
            <input
              type="number"
              placeholder="Post code"
              class="form-input mb-4 ml-1 sm:mb-5"
              id="post_code"/>
          </div>
          <div class="flex items-center pt-2">
            <input type="checkbox" class="form-checkbox" id="save_info"/>
            <p class="pl-3 font-hk text-sm text-secondary">
              Save this information for next time
            </p>
          </div>
        </div>

        <div class="flex flex-col items-center justify-between pt-8 sm:flex-row sm:pt-12">
          <a href="/cart"
            class="group mb-3 flex items-center font-hk text-sm text-secondary transition-all hover:text-primary group-hover:font-bold sm:mb-0">
            <i class="bx bx-chevron-left -mb-1 pr-2 text-2xl text-secondary transition-colors group-hover:text-primary"></i>
            뒤로가기
          </a>
          <a href="/cart/shipping-method" class="btn btn-primary text-xl">계속</a>
        </div>
      </div>
    </div>


    <div class="mx-auto mt-16 sm:w-2/3 md:w-full lg:mx-0 lg:mt-0 lg:w-1/3">
      <div class="bg-grey-light py-8 px-8">
        <h4 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
          주문 내역
        </h3>
        <p class="font-hkbold text-center uppercase text-secondary sm:text-left">
          상품
        </p>
        <div class="mt-5 mb-8">
          <div class="mb-5 flex items-center">
            <div class="relative mr-3 w-20 sm:pr-0">
              <div class="flex h-20 items-center justify-center rounded">
                <img src="/assets/img/unlicensed/purse-1.png"
                  alt="Beautiful Brown image"
                  class="h-16 w-12 object-cover object-center"/>
                <span class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span>
              </div>
            </div>
            <p class="font-hk text-lg text-secondary">Beautiful Brown</p>
          </div>
        </div>

        <h4 class="font-hkbold pt-1 pb-2 text-secondary">총 합계</h4>
        <div class="flex justify-between border-b border-grey-darker py-3">
          <span class="font-hk leading-none text-secondary">주문 금액</span>
          <span class="font-hk leading-none text-secondary">$236</span>
        </div>
        <div class="flex justify-between border-b border-grey-darker py-3">
          <span class="font-hk leading-none text-secondary">할인 금액</span>
          <span class="font-hk leading-none text-secondary">-$36</span>
        </div>
        <div class="flex justify-between py-3">
          <span class="font-hkbold leading-none text-secondary">합계</span>
          <span class="font-hkbold leading-none text-secondary">$200</span>
        </div>
      </div>
    </div>

  </div>
</div>

@include('layouts.foot')