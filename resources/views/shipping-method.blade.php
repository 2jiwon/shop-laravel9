@include('layouts.head')

<div class="container border-t border-grey-dark">
  <form>
  <div class="flex flex-col items-center justify-between pt-10 pb-16 sm:pt-12 sm:pb-20 lg:flex-row lg:pb-24">
    <div class="lg:w-2/3 lg:pr-16 xl:pr-20">
      <div class="flex flex-wrap items-center">
        <h1 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
          주문 > 결제 정보 입력
        </h1>
  <!-- <a href="/cart/index"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
        ">
        Cart
    </a>
  <i class="bx bx-chevron-right text-sm text-secondary px-2"></i>
   
  <a href="/cart/customer-info"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
        ">
        Customer information
    </a>
  <i class="bx bx-chevron-right text-sm text-secondary px-2"></i>
   
  <a href="/cart/shipping-method"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
        ">
        Shipping method
    </a>
  <i class="bx bx-chevron-right text-sm text-secondary px-2"></i>
   
  <a href="/cart/payment-method"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
         font-bold ">
        Payment method
    </a>
  <i class="bx bx-chevron-right text-sm text-transparent px-2"></i> -->
  
      </div>

      <div
        class="mt-10 rounded border border-grey-darker px-4 py-3 sm:px-5 md:mt-12">
        <div class="flex border-b border-grey-dark pb-2">
          <div class="w-1/5">
            <p class="font-hk text-secondary">연락처</p>
          </div>
          <div class="w-3/5">
            <p class="font-hk text-secondary">{{ $order->user->user_addresses->phone }}</p>
          </div>
          <!-- <div class="w-1/5 text-right">
            <a href="/cart/customer-info" class="font-hk text-primary underline">Change</a>
          </div> -->
        </div>
        <div class="flex border-b border-grey-dark pt-2 pb-2">
          <div class="w-1/5">
            <p class="font-hk text-secondary">배송지</p>
          </div>
          <div class="w-3/5">
            <p class="font-hk text-secondary">{{ $order->user->user_addresses->zipcode }}
               {{ $order->user->user_addresses->address1 }}
               {{ $order->user->user_addresses->address2 }}
              </p>
          </div>
          <!-- <div class="w-1/5 text-right">
            <a href="/cart/customer-info" class="font-hk text-primary underline">Change</a>
          </div> -->
        </div>
        <div class="flex pt-2">
          <div class="w-1/5">
            <p class="font-hk text-secondary">배송비</p>
          </div>
          <p class="font-hk text-secondary">택배 ({{ number_format($product->delivery_fee) }}원)</p>
        </div>
      </div>
      
      <div class="pt-8 md:pt-10">
        <h1
          class="text-center font-hk text-xl font-medium text-secondary sm:text-left md:text-2xl">
          결제 정보
        </h1>
        <p class="pt-2 font-hk text-secondary">
          모든 결제 정보는 안전하게 암호화되어 처리됩니다.
        </p>

        <div x-data="{ bank:true }" x-init="$refs.pay_bank.click()">
          <div class="mt-6 py-5 grid grid-cols-2 gap-5 rounded border border-grey-darker px-4 pt-3 sm:px-5">
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
              <input @click="bank=false" disabled id="pay_card" type="radio" value="card" name="pay_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="pay_card" class="py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                신용카드 결제
              </label>
            </div>
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
              <!-- <input checked="checked" x-ref="pay_bank" id="pay_bank" type="radio" value="Y" name="pay_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> -->
              <input @click="bank=true" x-ref="pay_bank" id="pay_bank" type="radio" value="bank" name="pay_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="pay_bank" class="py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                무통장 입금 결제
              </label>
            </div>
          </div>

          <div x-show="bank" class="mt-6 rounded border border-grey-darker px-4 py-3 sm:px-5">
            <p class="font-hkbold text-sm text-secondary">입금자 정보</p>
            <div class="pt-4">
              <div class="grid grid-cols-2 gap-5">
                <!-- <div class="w-full">
                  <input
                    type="number"
                    placeholder="Card Number"
                    class="form-input"
                    id="card"/>
                </div> -->
                <div class="w-full">
                  <input
                    type="text"
                    placeholder="입금자명"
                    class="form-input"
                    name="remittor"/>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <div
        class="flex flex-col items-center justify-between pt-8 sm:flex-row sm:pt-12">
        <a
          href="/cart"
          class="group mb-3 flex items-center font-hk text-sm text-secondary transition-colors hover:text-primary group-hover:font-bold sm:mb-0">
          <i
            class="bx bx-chevron-left -mb-1 pr-2 text-2xl text-secondary transition-colors group-hover:text-primary"></i>
          뒤로가기
        </a>
        <button class="btn btn-primary" onClick="paynow();">결제하기</button>
      </div>
    </div>

    <div class="mt-16 bg-grey-light sm:w-2/3 md:w-1/2 lg:mt-0 lg:w-1/3">
      <div class="p-8">
        <h3 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
          주문 정보
        </h3>
        <p class="font-hkbold text-center uppercase text-secondary sm:text-left">
          상품
        </p>
        <div class="mt-5 mb-8">
          <div class="mb-5 flex items-center">
            <div class="relative mr-3 w-20 sm:pr-0">
              <div class="flex h-20 items-center justify-center rounded">
                @foreach ($product->images as $image)
                  @if ($image->type == 'main')
                    <img src="{{ asset('storage/'.$image->filename) }}"
                  alt="Beautiful Brown image"
                  class="h-16 w-12 object-cover object-center"/>
                   @endif
                @endforeach
                <!-- <span class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span> -->
              </div>
            </div>
            <p class="font-hk text-lg text-secondary">{{ $product->name }}</p>
          </div>
        </div>

        <h4 class="font-hkbold pt-1 pb-2 text-secondary">총 결제금액</h4>
        <div class="flex justify-between border-b border-grey-darker py-3">
          <span class="font-hk leading-none text-secondary">상품 금액</span>
          <span class="font-hk leading-none text-secondary">{{ number_format($product->selling_price) }} 원</span>
        </div>
        <div class="flex justify-between border-b border-grey-darker py-3">
          <span class="font-hk leading-none text-secondary">할인 금액</span>
          <span class="font-hk leading-none text-secondary">-</span>
        </div>
        <div class="flex justify-between border-b border-grey-darker py-3">
          <span class="font-hk leading-none text-secondary">배송비</span>
          <span class="font-hk leading-none text-secondary">{{ number_format($product->delivery_fee) }} 원</span>
        </div>
        <div class="flex justify-between py-3">
          <span class="font-hkbold leading-none text-secondary">합계</span>
          <span class="font-hkbold leading-none text-secondary">{{ number_format(($product->selling_price * $order->quantities[0]) + $product->delivery_fee) }} 원</span>
          <input type="hidden" name="total_amount" value="{{ ($product->selling_price * $order->quantities[0]) + $product->delivery_fee }}" />
        </div>
      </div>

    </div>
  </div>
  </form>
</div>

<script>
var order_id = {{ $order->id }};
function paynow() {
   event.preventDefault();
  const form = document.querySelector("form");
  const formData = new FormData(form);
  formData.append('order_id', order_id);

  const url = `{{ route('pay.store') }}`;
  axios
  .post(url, formData)
  .then((res) => {
      console.log(res);
      if (res.status === 200) {
          //alert("등록 완료");
          // const target = document.querySelector('#toast-success');
          // target.classList.remove('hidden');
          // const msg = document.querySelector('#toast-message');
          // msg.innerText = "message here";

          location.href = "/pay/complete/" + res.data.pid;
      }
  })
  .catch((err) => {
      console.log("에러 발생 " + err);
  });
}
</script>

@include('layouts.foot')