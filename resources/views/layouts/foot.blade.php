<!-- 하단 링크, 인스타       -->
      <div class="bg-primary">
        <div class="container py-16 sm:py-20 md:py-24">
          <div class="mx-auto flex w-5/6 flex-col items-center justify-between lg:flex-row">
            <div class="text-center lg:text-left">
              <!-- <h4 class="pb-8 font-dohyeon text-xl font-bold text-white">고객센터</h4> -->
              <ul class="list-reset">
                
                <li class="block pb-2">
                  <a href="mailto:shop@fancytank.com"
                    class=" text-base tracking-wide text-white transition-colors hover:text-secondary">shop@fancytank.com</a>
                </li>
                
                <li class="block pb-2">
                  <a href="" class=" text-base tracking-wide text-white transition-colors hover:text-secondary">사업자 등록번호 0123 234 222</a>
                </li>
                
                <li class="block pb-2">
                  <a href="https://fancytank.com" class=" text-base tracking-wide text-white transition-colors hover:text-secondary">대표자명</a>
                </li>
                
              </ul>
            </div>
            <div class="py-16 text-center lg:py-0">
              <a href="/"
                class="font-gowunbatang text-4xl uppercase tracking-wider text-white">FANCYTANK</a>
              <div class="flex items-center justify-center pt-5">
                
                <a href="https://fancytank.com" class="group">
                  <div class="mr-5 flex items-center rounded-full bg-white px-2 py-2 transition-colors group-hover:bg-secondary">
                    <i class="bx bxl-facebook text-secondary transition-colors group-hover:text-white"></i>
                  </div>
                </a>
                
                <a href="https://fancytank.com" class="group">
                  <div class="mr-5 flex items-center rounded-full bg-white px-2 py-2 transition-colors group-hover:bg-secondary">
                    <i class="bx bxl-twitter text-secondary transition-colors group-hover:text-white"></i>
                  </div>
                </a>
                
                <a href="https://fancytank.com" class="group">
                  <div class="mr-5 flex items-center rounded-full bg-white px-2 py-2 transition-colors group-hover:bg-secondary">
                    <i class="bx bxl-instagram text-secondary transition-colors group-hover:text-white"></i>
                  </div>
                </a>
                
                <a href="https://fancytank.com" class="group">
                  <div class="mr-5 flex items-center rounded-full bg-white px-2 py-2 transition-colors group-hover:bg-secondary">
                    <i class="bx bxl-pinterest text-secondary transition-colors group-hover:text-white"></i>
                  </div>
                </a>
                
              </div>
            </div>
            <div class="text-center lg:text-left">
              <!-- <h4 class="pb-8 font-dohyeon text-xl font-bold text-white">Link</h4> -->
              <ul class="list-reset">
                <li class="block pb-2">
                  <a href="/faq"
                    class=" text-base tracking-wide text-white transition-colors hover:text-secondary">이용가이드</a>
                </li>
                <li class="block pb-2">
                  <a href="/single"
                    class=" text-base tracking-wide text-white transition-colors hover:text-secondary">이용약관</a>
                </li>
                <li class="block pb-2">
                  <a href="/single"
                    class=" text-base tracking-wide text-white transition-colors hover:text-secondary">개인정보처리방침</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- 하단 링크, 인스타 End   -->

      <!-- 최하단 copyright -->
      <div class="container py-4">
        <p class="text-center font-dohyeon text-base text-secondary">
          All rights reserved © 2022. 
          <a href="/admin" target="_blank" class="text-secondary">fancytank</a>.
        </p>
      </div>
      <!-- 최하단 copyright End -->

    </div>
    
   
<!-- Modal for 장바구니 -->
<x-confirm-modal for="success" type="cart" click="location.href='/cart';"></x-confirm-modal>
<x-confirm-modal for="ask" type="cart" click="addToForce('cart');"></x-confirm-modal>
<!-- Modal End -->

<!-- Modal for 위시리스트 -->
<x-confirm-modal for="success" type="wishlist" click="location.href='/wishlist';" callback="checkWishlist()"></x-confirm-modal>
<x-confirm-modal for="ask" type="wishlist" click="addToForce('wishlist');" callback="checkWishlist()"></x-confirm-modal>
<!-- Modal End -->


    <script src="/assets/js/common.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js" crossorigin="anonymous"></script>

    <script src="/assets/theme/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"></script>

  </body>
</html>