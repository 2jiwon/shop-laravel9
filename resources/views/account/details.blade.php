@include('layouts.head')

  @include('layouts.account.side')

    <!-- 메인 컨텐츠 -->
     <div class="mt-12 lg:mt-0 lg:w-3/4">
      <div class="bg-grey-light py-10 px-6 sm:px-10">
        <h1 class="font-hkbold mb-12 text-2xl text-secondary sm:text-left">
          Account Details
        </h1>
        <div class="mb-12">
          <imgsrc="/assets/img/unlicensed/blog-author.jpg"
            alt="user image"
            class="h-40 w-40 overflow-hidden rounded-full object-cover"/>
        </div>

        <form>
          <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div class="">
              <label for="first_name" class="mb-2 block font-hk text-secondary">First Name</label>
              <input
                type="text"
                class="form-input"
                value=""
                id="first_name"/>
            </div>
            <div class="">
              <label for="last_name" class="mb-2 block font-hk text-secondary">Last Name</label>
              <input
                type="text"
                class="form-input"
                value=""
                id="last_name"/>
            </div>
          </div>
          <div class="mt-5 grid grid-cols-1 gap-5 md:mt-8 md:grid-cols-2">
            <div class="">
              <label
                for="name_displayed"
                class="mb-2 block font-hk text-secondary">Name Displayed</label>
              <input
                type="text"
                class="form-input"
                value=""
                id="name_displayed"/>
            </div>
            <div class="">
              <label for="email" class="mb-2 block font-hk text-secondary">Email Address</label>
              <input
                type="email"
                class="form-input"
                value=""
                id="email"/>
            </div>
          </div>

          <div class="mt-5 w-full sm:w-1/2 md:pr-5">
            <label for="password" class="mb-2 block font-hk text-secondary">Password</label>
            <input
              type="password"
              class="form-input"
              value="password"
              id="password"/>
          </div>

          <div class="my-8">
            <div>
              <h4 class="font-hkbold mb-2 text-xl text-secondary sm:text-left">
                Shipping Address
              </h4>
              <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div class="w-full">
                  <label for="street" class="mb-2 block font-hk text-secondary">Street</label>
                  <input type="text" class="form-input" id="street"/>
                </div>
                <div class="w-full">
                  <label for="street2" class="mb-2 block font-hk text-secondary">Street 2</label>
                  <input type="email" class="form-input" id="street2"/>
                </div>
              </div>
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
              <div class="mt-5">
                <label for="country" class="mb-2 block font-hk text-secondary">Country</label>
                <select class="form-select" id="country">
                  <option></option>
                  <option value="us">United States</option>
                </select>
              </div>
            </div>
            <div class="mt-8">
              <h4 class="font-hkbold mb-2 text-xl text-secondary sm:text-left">
                Billing Address
              </h4>
              <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div class="w-full">
                  <label for="bstreet" class="mb-2 block font-hk text-secondary">Street</label>
                  <input type="text" class="form-input" id="bstreet"/>
                </div>
                <div class="w-full">
                  <label
                    for="bstreet2"
                    class="mb-2 block font-hk text-secondary">Street 2</label>
                  <input type="email" class="form-input" id="bstreet2"/>
                </div>
              </div>
              <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
                <div class="">
                  <label for="bcity" class="mb-2 block font-hk text-secondary">City</label>
                  <input type="text" class="form-input" id="bcity"/>
                </div>
                <div class="">
                  <label for="bstate" class="mb-2 block font-hk text-secondary">State</label>
                  <input type="email" class="form-input" id="bstate"/>
                </div>
                <div class="">
                  <label for="bzip" class="mb-2 block font-hk text-secondary">Zip Code</label>
                  <input type="email" class="form-input" id="bzip"/>
                </div>
              </div>
              <div class="mt-5">
                <label for="bcountry" class="mb-2 block font-hk text-secondary">Country</label>
                <select class="form-select" id="bcountry">
                  <option></option>
                  <option value="us">United States</option>
                </select>
              </div>
            </div>
          </div>

          <div>
            <button class="btn btn-primary" aria-label="Save button">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
    <!-- 메인 컨텐츠 End -->
  
    @include('layouts.account.foot')