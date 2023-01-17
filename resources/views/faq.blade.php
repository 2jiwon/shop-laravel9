@include('layouts.head')

      <div>

<div class="container">
  

<div class="mt-20 pb-16 md:pb-20 lg:pb-24" id="faq">
    <div class="mx-auto text-center sm:w-5/6 md:mx-0 md:w-full">
      <h2
        class="font-butler text-2xl text-secondary sm:text-3xl md:text-4.5xl lg:text-5xl">
        이용가이드
      </h2>
      <p class="pt-2 font-hk text-lg text-secondary-lighter md:text-xl">
        자주 묻는 질문
      </p>

      <div class="pt-12" x-data="{ faqIndex: null }">
        
        <div
          class="faq-wrapper cursor-pointer border-t border-l border-r border-primary last:border-b">
          <div
            class="faq-question flex items-center justify-between border-primary bg-primary-lightest px-5 py-5 transition-all md:px-8"
            @click="faqIndex === 1 ? faqIndex=null : faqIndex=1"
            :class="{ 'border-b': faqIndex=== 1 }">
            <div class="w-5/6 text-left">
              <span
                class="font-hk font-medium uppercase text-secondary md:text-lg">How many days does the product takes to arrive?</span>
            </div>
            <div class="w-1/6 text-right">
              <i
                class="bx text-2xl text-primary"
                :class="faqIndex === 1 ? 'bx-minus' : 'bx-plus'"></i>
            </div>
          </div>
          <div
            class="cursor-text transition-all"
            :class="faqIndex === 1 ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
            <div class="px-5 py-5 md:px-8">
              <p class="text-left font-hk text-sm leading-loose text-secondary">
                It depends on the product, but it can take 3-5 days max.
              </p>
            </div>
          </div>
        </div>
        
        <div
          class="faq-wrapper cursor-pointer border-t border-l border-r border-primary last:border-b">
          <div
            class="faq-question flex items-center justify-between border-primary bg-primary-lightest px-5 py-5 transition-all md:px-8"
            @click="faqIndex === 2 ? faqIndex=null : faqIndex=2"
            :class="{ 'border-b': faqIndex=== 2 }">
            <div class="w-5/6 text-left">
              <span
                class="font-hk font-medium uppercase text-secondary md:text-lg">How much is shipping?</span>
            </div>
            <div class="w-1/6 text-right">
              <i
                class="bx text-2xl text-primary"
                :class="faqIndex === 2 ? 'bx-minus' : 'bx-plus'"></i>
            </div>
          </div>
          <div
            class="cursor-text transition-all"
            :class="faqIndex === 2 ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
            <div class="px-5 py-5 md:px-8">
              <p class="text-left font-hk text-sm leading-loose text-secondary">
                It depends on a lot of factors like where you're located and how many things you buy. We do have a free shipping special if you buy more than $50.
              </p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>




  <div
    class="flex flex-col justify-between pb-16 md:pb-20 lg:flex-row lg:pb-24">
    <div
      class="mx-auto w-full border border-grey-darker px-6 py-10 text-center shadow lg:mx-0 lg:w-3/8 lg:py-8 lg:text-left xl:w-1/3 xl:px-8">
      <h2
        class="border-b border-grey-dark pb-6 font-butler text-2xl text-secondary sm:text-3xl md:text-4xl">
        Quick contact
      </h2>

      <h4
        class="pt-8 font-hk text-lg font-bold uppercase text-secondary sm:text-xl">
        Email
      </h4>
      <p class="font-hk text-secondary">information@elyssi.com</p>

      <h4
        class="pt-8 font-hk text-lg font-bold uppercase text-secondary sm:text-xl">
        Phone
      </h4>
      <p class="font-hk text-secondary">+0 321-654-0987</p>

      <h4
        class="pt-8 font-hk text-lg font-bold uppercase text-secondary sm:text-xl">
        WORKING HOURS
      </h4>

      
      <p class="pt-3 font-hk text-lg font-bold text-secondary">
        Summer
      </p>
      <p class="font-hk text-secondary">
        <span class="text-primary">(May to Nov) :</span>Mon - Sat: 9.00 to 18.00
      </p>
      
      <p class="pt-3 font-hk text-lg font-bold text-secondary">
        Winter
      </p>
      <p class="font-hk text-secondary">
        <span class="text-primary">(Dic to Apr) :</span>Mon - Sat: 9.00 to 17.00
      </p>
      

      <div class="pt-8">
        <h4
          class="font-hk text-lg font-bold uppercase text-secondary sm:text-xl">
          Follow Us
        </h4>
        <div class="flex justify-center pt-3 lg:justify-start">
          <a
            href="/"
            class="mr-2 flex items-center rounded-full bg-secondary-lighter p-3 text-xl transition-colors hover:bg-primary">
            <i class="bx bxl-facebook text-white"></i>
          </a>
          <a
            href="/"
            class="mr-2 flex items-center rounded-full bg-secondary-lighter p-3 text-xl transition-colors hover:bg-primary"><i class="bx bxl-twitter text-white"></i></a>
          <a
            href="/"
            class="mr-2 flex items-center rounded-full bg-secondary-lighter p-3 text-xl transition-colors hover:bg-primary"><i class="bx bxl-google text-white"></i></a>
          <a
            href="/"
            class="flex items-center rounded-full bg-secondary-lighter p-3 text-xl transition-colors hover:bg-primary"><i class="bx bxl-linkedin text-white"></i></a>
        </div>
      </div>
    </div>

    <div
      class="mt-10 border border-grey-darker px-8 py-10 shadow md:mt-12 lg:mt-0 lg:w-3/5 lg:py-8">
      <form>
        <p class="pb-8 font-hk text-lg text-secondary">Any questions? Contact us through Whatsapp or on our contact from below.</p>
        <div
          class="mb-5 grid grid-cols-1 justify-between md:grid-cols-2 md:gap-10">
          <div class="mb-5 sm:mb-0">
            <label for="name" class="mb-2 block font-hk text-secondary">Name</label>
            <input
              type="text"
              placeholder="Enter your name"
              class="form-input"
              id="name"/>
          </div>
          <div class="">
            <label for="email" class="mb-2 block font-hk text-secondary">Email address</label>
            <input
              type="text"
              placeholder="Enter your email"
              class="form-input"
              id="email"/>
          </div>
        </div>
        <div class="mb-8 w-full">
          <label for="subject" class="mb-2 block font-hk text-secondary">Subject</label>
          <input
            type="text"
            placeholder="Enter your subject"
            class="form-input"
            id="subject"/>
        </div>
        <div class="mb-8 w-full">
          <label for="message" class="mb-2 block font-hk text-secondary">Message</label>
          <textarea
            rows="5"
            placeholder="Enter your message"
            class="form-textarea"
            id="message"></textarea>
        </div>
        <button class="btn btn-primary" aria-label="Submit button">
          SUBMIT
        </button>
      </form>
    </div>
  </div>

  
</div>

@include('layouts.foot')