@include('layouts.head')

<div class="container border-t border-grey-dark">
  <div
    class="flex flex-col items-center justify-between pt-10 pb-16 sm:pt-12 sm:pb-20 lg:flex-row lg:pb-24">
    <div class="lg:w-2/3 lg:pr-16 xl:pr-20">
      <div class="flex flex-wrap items-center">
   
  <a href="/cart/index"
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
  <i class="bx bx-chevron-right text-sm text-transparent px-2"></i>
  
</div>

      <div
        class="mt-10 rounded border border-grey-darker px-4 py-3 sm:px-5 md:mt-12">
        <div class="flex border-b border-grey-dark pb-2">
          <div class="w-1/5">
            <p class="font-hk text-secondary">Contact</p>
          </div>
          <div class="w-3/5">
            <p class="font-hk text-secondary">test@gmail.com</p>
          </div>
          <div class="w-1/5 text-right">
            <a href="/cart/customer-info" class="font-hk text-primary underline">Change</a>
          </div>
        </div>
        <div class="flex border-b border-grey-dark pt-2 pb-2">
          <div class="w-1/5">
            <p class="font-hk text-secondary">Ship to</p>
          </div>
          <div class="w-3/5">
            <p class="font-hk text-secondary">10813 NW 30th St Suite 115 Doral, Florida 33192 USA</p>
          </div>
          <div class="w-1/5 text-right">
            <a href="/cart/customer-info" class="font-hk text-primary underline">Change</a>
          </div>
        </div>
        <div class="flex pt-2">
          <div class="w-1/5">
            <p class="font-hk text-secondary">Method</p>
          </div>
          <p class="font-hk text-secondary">International Shipping · $20.00</p>
        </div>
      </div>
      <div class="pt-8 md:pt-10">
        <h1
          class="text-center font-hk text-xl font-medium text-secondary sm:text-left md:text-2xl">
          Payment method
        </h1>
        <p class="pt-2 font-hk text-secondary">
          All transactions are secure and encrypted
        </p>
        <div class="mt-6 rounded border border-grey-darker px-4 py-3 sm:px-5">
          <p class="font-hkbold text-sm text-secondary">Credit card info</p>
          <div class="pt-4">
            <div class="grid grid-cols-2 gap-5">
              <div class="w-full">
                <input
                  type="number"
                  placeholder="Card Number"
                  class="form-input"
                  id="card"/>
              </div>
              <div class="w-full">
                <input
                  type="text"
                  placeholder="Name on Card"
                  class="form-input"
                  id="name"/>
              </div>
              <div class="w-full">
                <input
                  type="number"
                  placeholder="Expiration date (MM/YY)"
                  class="form-input"
                  id="expiration_date"/>
              </div>
              <div class="w-full">
                <input
                  type="number"
                  placeholder="Security code"
                  class="form-input"
                  id="code"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pt-10">
        <h4
          class="text-center font-hk text-xl font-medium text-secondary sm:text-left md:text-2xl">
          Billing address
        </h4>
        <div class="mt-6 rounded border border-grey-darker px-4 pt-3 sm:px-5">
          <div class="border-b border-grey-dark">
            <div class="mb-2 flex items-center">
              <input type="checkbox" class="form-checkbox" id="shipping_same"/>
              <p class="pl-3 font-hk text-secondary">
                Same as shipping address
              </p>
            </div>
          </div>
          <div class="pt-2">
            <div class="mb-2 flex items-center">
              <input
                type="checkbox"
                class="form-checkbox"
                id="add_billing_address"/>
              <p class="pl-3 font-hk text-secondary">Add new billing address</p>
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
    Your Order
  </h3>
  <p class="font-hkbold text-center uppercase text-secondary sm:text-left">
    PRODUCTS
  </p>
  <div class="mt-5 mb-8">
    
    <div class="mb-5 flex items-center">
      <div class="relative mr-3 w-20 sm:pr-0">
        <div class="flex h-20 items-center justify-center rounded">
          <img
            src="/assets/img/unlicensed/purse-1.png"
            alt="Beautiful Brown image"
            class="h-16 w-12 object-cover object-center"/>
          <span
            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span>
        </div>
      </div>
      <p class="font-hk text-lg text-secondary">Beautiful Brown</p>
    </div>
    
    <div class="mb-5 flex items-center">
      <div class="relative mr-3 w-20 sm:pr-0">
        <div class="flex h-20 items-center justify-center rounded">
          <img
            src="/assets/img/unlicensed/backpack-2.png"
            alt="Woodie Blake image"
            class="h-16 w-12 object-cover object-center"/>
          <span
            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span>
        </div>
      </div>
      <p class="font-hk text-lg text-secondary">Woodie Blake</p>
    </div>
    
    <div class="mb-5 flex items-center">
      <div class="relative mr-3 w-20 sm:pr-0">
        <div class="flex h-20 items-center justify-center rounded">
          <img
            src="/assets/img/unlicensed/watch-4.png"
            alt="Princess image"
            class="h-16 w-12 object-cover object-center"/>
          <span
            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span>
        </div>
      </div>
      <p class="font-hk text-lg text-secondary">Princess</p>
    </div>
    
    <div class="mb-5 flex items-center">
      <div class="relative mr-3 w-20 sm:pr-0">
        <div class="flex h-20 items-center justify-center rounded">
          <img
            src="/assets/img/unlicensed/shoes-4.png"
            alt="Siberian Boots image"
            class="h-16 w-12 object-cover object-center"/>
          <span
            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span>
        </div>
      </div>
      <p class="font-hk text-lg text-secondary">Siberian Boots</p>
    </div>
    
    <div class="mb-5 flex items-center">
      <div class="relative mr-3 w-20 sm:pr-0">
        <div class="flex h-20 items-center justify-center rounded">
          <img
            src="/assets/img/unlicensed/backpack-1.png"
            alt="Black Blake image"
            class="h-16 w-12 object-cover object-center"/>
          <span
            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span>
        </div>
      </div>
      <p class="font-hk text-lg text-secondary">Black Blake</p>
    </div>
    
  </div>
  <h4 class="font-hkbold pt-1 pb-2 text-secondary">Cart Totals</h4>
  <div class="flex justify-between border-b border-grey-darker py-3">
    <span class="font-hk leading-none text-secondary">Subtotal</span>
    <span class="font-hk leading-none text-secondary">$236</span>
  </div>
  <div class="flex justify-between border-b border-grey-darker py-3">
    <span class="font-hk leading-none text-secondary">Coupon apply</span>
    <span class="font-hk leading-none text-secondary">-$36</span>
  </div>
  <div class="flex justify-between py-3">
    <span class="font-hkbold leading-none text-secondary">Total</span>
    <span class="font-hkbold leading-none text-secondary">$200</span>
  </div>
</div>

    </div>
  </div>
</div>

<script>
function paynow() {
  alert("결제");

  const url = `{{ route('order.store') }}`;
  axios
  .post(url)
  .then((res) => {
      console.log(res);
      if (res.status === 200) {
          alert("등록 완료");
          // const target = document.querySelector('#toast-success');
          // target.classList.remove('hidden');
          // const msg = document.querySelector('#toast-message');
          // msg.innerText = "message here";
          // location.reload();
      }
  })
  .catch((err) => {
      console.log("에러 발생 " + err);
  });
}
</script>

@include('layouts.foot')