@include('layouts.head')

<div class="container border-t border-grey-dark">
  <div class="flex flex-col items-top justify-between pt-10 pb-16 sm:pt-12 sm:pb-20 lg:flex-row lg:pb-24">
    <div class="lg:w-full lg:pr-16 xl:pr-20">

      <!-- 상단 타이틀 -->
      <div class="flex flex-wrap items-center">
        <h1 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
          주문 > 결제 완료
        </h1>
      </div>
    
      <!-- 결제정보 표시 -->
      <div class="flex flex-wrap justify-center">
        <div class="mt-10 xs:w-full sm:w-full lg:w-2/3 rounded border border-grey-darker px-4 py-3 sm:px-5 md:mt-12">
          <div class="flex border-b border-grey-dark pb-2">
            <div class="w-1/5">
              <p class="font-hk text-secondary">연락처</p>
            </div>
            <div class="w-4/5">
              <p class="font-hk text-secondary text-sm lg:text-base">{{ $payment->order->user->user_addresses->phone }}</p>
            </div>
          </div>
          <div class="flex border-b border-grey-dark pt-2 pb-2">
            <div class="w-1/5">
              <p class="font-hk text-secondary">배송지</p>
            </div>
            <div class="w-4/5">
              <p class="font-hk text-secondary text-sm lg:text-base">{{ $payment->order->user->user_addresses->zipcode }}
                {{ $payment->order->user->user_addresses->address1 }}
                {{ $payment->order->user->user_addresses->address2 }}
                </p>
            </div>
          </div>
          <div class="flex pt-2 pb-2">
            <div class="w-1/5">
              <p class="font-hk text-secondary">결제정보</p>
            </div>
            <div class="w-4/5">
              <p class="font-hk text-secondary text-sm lg:text-base">무통장입금 | 입금자명: {{ $payment->detail['remittor'] }}</p>
            </div>
          </div>
        </div>
      </div>     
      <!-- 결제정보 표시 End -->
     
      <!-- 버튼 출력 -->
      <div class="flex flex-col items-center justify-center pt-8 sm:flex-row sm:pt-12">
       
        <a href="/account/dashboard" class="btn btn-outline mr-0 sm:mr-5">주문 확인하기</a>
        <a href="/" class="btn btn-primary">쇼핑 계속하기</a>
      </div>
    </div>

   
  </div>
</div>


@include('layouts.foot')