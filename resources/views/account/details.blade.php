@include('layouts.head')

  @include('layouts.account.side')

    <!-- 메인 컨텐츠 -->
     <div class="mt-12 lg:mt-0 lg:w-3/4">
      <div class="bg-grey-light py-10 px-6 sm:px-10">
        <h1 class="font-hkbold mb-12 text-2xl text-secondary sm:text-left">
          내 정보
        </h1>

        <form>
          <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div class="">
              <label for="uid" class="mb-2 block font-hk text-secondary">아이디</label>
              <input type="text" class="form-input" value="" id="uid" disabled />
            </div>
            <div class="">
              <label for="nickname" class="mb-2 block font-hk text-secondary">닉네임</label>
              <input
                type="text"
                class="form-input"
                value=""
                id="nickname"/>
            </div>
          </div>
          <div class="mt-5 grid grid-cols-1 gap-5 md:mt-8 md:grid-cols-2">
            <div class="">
              <label for="email" class="mb-2 block font-hk text-secondary">Email Address</label>
              <input
                type="email"
                class="form-input"
                value=""
                id="email"/>
            </div>
            <div class="">
              <label for="password" class="mb-2 block font-hk text-secondary">Password</label>
              <input
                type="password"
                class="form-input"
                value="password"
                id="password"/>
            </div>
          </div>

          <div class="my-8 border-t-2 pt-6">
            <div>
              <h4 class="font-hkbold mb-4 text-xl text-secondary sm:text-left">
                배송지
              </h4>
              <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
                <div class="">
                  <label for="city" class="mb-2 block font-hk text-secondary">City</label>
                  <input type="text" class="form-input" id="city"/>
                </div>
                <div class="">
                  <label for="state" class="mb-2 block font-hk text-secondary">State</label>
                  <input type="email" class="form-input" id="state"/>
                </div>
                <div class="">
                  <label for="zip" class="mb-2 block font-hk text-secondary">Zip Code</label>
                  <input type="email" class="form-input" id="zip"/>
                </div>
              </div>
              <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">
                <div class="w-full">
                  <label for="street" class="mb-2 block font-hk text-secondary">주소1</label>
                  <input type="text" class="form-input" id="address1"/>
                </div>
                <div class="w-full">
                  <label for="street2" class="mb-2 block font-hk text-secondary">주소2</label>
                  <input type="email" class="form-input" id="address2"/>
                </div>
              </div>
               <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
                <div class="">
                  <label for="phone" class="mb-2 block font-hk text-secondary">핸드폰 번호</label>
                  <input type="text" class="form-input" id="phone"/>
                </div>
              </div>
            </div>
          </div>

          <div class="grid justify-end">
            <button class="btn btn-primary" aria-label="Save button">
              Save
            </button>
          </div>
        </form>

      </div>
    </div>
    <!-- 메인 컨텐츠 End -->
  
@include('layouts.account.foot')