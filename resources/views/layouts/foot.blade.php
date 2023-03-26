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
    
   
    

    
<!-- Modal -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="successModal">
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <!--content-->
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <!--body-->
      <div class="relative p-6 flex-auto">
         <h3 class="font-semibold">
         장바구니에 상품이 담겼어요.
        </h3>
      </div>
      <!--footer-->
      <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
        <a href="/cart" class="btn btn-primary px-6 py-3 mr-4 md:mr-6">
          장바구니로 이동
        </a>
        <button class="btn btn-outline px-6 py-3" type="button" onclick="toggle('successModal')">
          쇼핑 계속하기
        </button>
      </div>
    </div>
  </div>
</div>
<div class="hidden bg-opacity-25 fixed inset-0 z-40 bg-black" id="successModal-backdrop"></div>
<!-- Modal End -->

<!-- Modal -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="askModal">
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <!--content-->
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <!--body-->
      <div class="relative p-6 flex-auto">
         <h3 class="font-semibold">
         장바구니에 동일한 상품이 있습니다. 추가로 담으시겠습니까?
          </h3>
          <input type="hidden" id="cartData" value="">
      </div>
      <!--footer-->
      <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
        <button class="btn btn-primary px-6 py-3 mr-4 md:mr-6" type="button" onclick="addCartForce();">
          추가하기
        </button>
        <button class="btn btn-outline px-6 py-3" type="button" onclick="toggle('askModal')">
          취소
        </button>
      </div>
    </div>
  </div>
</div>
<div class="hidden bg-opacity-25 fixed inset-0 z-40 bg-black" id="askModal-backdrop"></div>
<!-- Modal End -->


<script type="text/javascript">
function addCartForce() {
  let _data = document.getElementById('cartData').value;
  // console.log("추가하기" + _data);
  if (_data) {
    _data = JSON.parse(_data);
    addCart(_data.id, _data.quantity, true);
  }
}

function addCart(productId, quantity, force=false) {
  let route = "/cart/add";
  let data = {
    'id' : productId,
    'quantity' : quantity
  };

  if (force) {
    data.force = true;
    toggle('askModal');
  }

  axios.post(route, data)
        .then((res) => {
          console.log(res);
          if (res.status == 200) {
            toggle('successModal');
          }
          if (res.status == 202) {
            toggle('askModal', data);
          }
      });
}

function toggle(modalId, data=null) {
  let modal = document.getElementById(modalId);
  let modal_backdrop = document.getElementById(modalId + '-backdrop');
  
  if (data !== null) {
    // console.log(data);
    let _data = document.getElementById('cartData');
    _data.value = JSON.stringify(data);
  }

  modal.classList.toggle("hidden");
  modal_backdrop.classList.toggle("hidden");
  modal.classList.toggle("flex");
  modal_backdrop.classList.toggle("flex");
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js" crossorigin="anonymous"></script>

    <script src="/assets/theme/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"></script>

  </body>
</html>