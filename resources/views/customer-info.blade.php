@include('layouts.head')

<div class="container border-t border-grey-dark pt-10 sm:pt-12">

  <!-- <form action="{{ route('order.store') }}" method="POST"> -->
  <form>
    @csrf
    <div class="flex flex-col-reverse justify-between pb-16 sm:pb-20 lg:flex-row lg:pb-24">

      <div class="lg:w-3/5 mt-10 lg:mt-0">
        <h1 class="font-hkbold pb-3 text-center text-2xl text-secondary sm:text-left">
          주문 > 배송 정보 확인
        </h1>
          
        <div class="pt-8 mb-5">
          <div class="flex flex-col-reverse items-center justify-between sm:flex-row">
            <h1 class="font-hk text-xl font-medium text-secondary md:text-2xl">
              연락처
            </h1>
          </div>
          <div class="flex items-center pt-4">
            <input type="checkbox" class="form-checkbox" id="same_phone_info" @click="$refs.phone_receiver.value = $refs.phone_user.value" />
            <p class="pl-3 font-hk text-sm text-secondary">
              받는 사람과 주문자 정보가 동일합니다.
            </p>
          </div>

          <div class="pt-4 md:pt-5">
            <label for="phone_user" class="mb-2 block font-hk text-secondary">주문자 연락처</label>
            <input
              type="text"
              name="phone_user"
              placeholder="주문자 연락처"
              class="form-input"
              id="phone_user" 
              value="{{ Auth::user()->phone }}"
              x-ref="phone_user"
              required />

            <label for="phone_receiver" class="mt-2 block font-hk text-secondary">수령자 연락처</label>
            <input
              type="text"
              name="phone"
              placeholder="수령자 연락처"
              class="form-input mt-3"
              id="phone_receiver" 
              x-ref="phone_receiver"
              required 
              />
            
            <div class="flex items-center pt-4">
              <input type="checkbox" class="form-checkbox" id="save_phone_info"  />
              <p class="pl-3 font-hk text-sm text-secondary">
                이 정보로 내 전화번호를 수정합니다.
              </p>
            </div>
          </div>
        </div>

        <hr />

        <div class="pt-4 pb-10">
          <h4 class="text-center font-hk text-xl font-medium text-secondary sm:text-left md:text-2xl">
            배송지
          </h4>
          <div class="flex items-center pt-4">
            <input type="checkbox" class="form-checkbox" id="same_phone_info" @click="getLatestAddress()" />
            <input type="hidden" name="address_exists" value="false" />
            <p class="pl-3 font-hk text-sm text-secondary">
              최근 배송지 불러오기
            </p>
          </div>

          <div class="pt-4 md:pt-5">
            <div class="flex justify-between">
              <div class="">
                <label for="zip" class="mb-2 block font-hk text-secondary">우편번호</label>
                <input type="text" class="form-input" name="zipcode" required />
              </div>
            </div>

            <div class="mt-3 mb-3 grid grid-cols-1 gap-5 md:grid-cols-2">
              <div class="w-full">
                <label for="street" class="mb-2 block font-hk text-secondary">주소1</label>
                <input type="text" class="form-input" id="address1" name="address1" placeholder="주소를 입력하시려면 클릭하세요." onClick="execDaumPostCode()" required />
              </div>
              <div class="w-full">
                <label for="street2" class="mb-2 block font-hk text-secondary">주소2</label>
                <input type="text" class="form-input" name="address2" placeholder="상세주소를 입력해주세요." required />
              </div>
            </div>

            <div class="flex items-center pt-2">
              <input type="checkbox" class="form-checkbox" id="save_address_info"/>
              <p class="pl-3 font-hk text-sm text-secondary">
                이 주소를 기본 배송지로 수정합니다.
              </p>
            </div>
          </div>

          <div class="flex flex-col items-center justify-between pt-8 sm:flex-row sm:pt-12">
            <a href="javascript:history.back();"
              class="group mb-3 flex items-center font-hk text-sm text-secondary transition-all hover:text-primary group-hover:font-bold sm:mb-0">
              <i class="bx bx-chevron-left -mb-1 pr-2 text-2xl text-secondary transition-colors group-hover:text-primary"></i>
              뒤로가기
            </a>
            <button class="btn btn-primary text-xl" onClick="saveOrder()">계속</a>
            <!-- <button type="submit" class="btn btn-primary text-xl">계속</button> -->
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
            @foreach ($products as $product)
            <input type="hidden" name="product_id[]" value="{{ $product->id }}">
            <div class="mb-5 flex items-center">
              <div class="relative mr-3 w-20 sm:pr-0">
                <div class="flex h-20 items-center justify-center rounded">
                @foreach ($product->images as $image)
                  @if ($image->type == 'main')
                    <img src="{{ asset('storage/'.$image->image) }}"
                          alt="{{ $product->name }}"
                          class="h-16 w-12 object-cover object-center"/>
                  @endif
                @endforeach
                  <!-- <span class="absolute top-0 right-0 -mt-2 -mr-2 flex h-6 w-6 items-center justify-center rounded-full bg-primary px-2 font-hk text-xs leading-none text-white">2</span> -->
                </div>
              </div>
              <p class="font-hk text-lg text-secondary">{{ $product->name }}</p>
            </div>
            @endforeach
          </div>

          @foreach ($quantities as $q)
            <input type="hidden" name="quantities[]" value="{{ $q }}">
          @endforeach

          <h4 class="font-hkbold pt-1 pb-2 text-secondary">총 합계</h4>
          <div class="flex justify-between border-b border-grey-darker py-3">
            <span class="font-hk leading-none text-secondary">주문 금액</span>
            <span class="font-hk leading-none text-secondary">{{ number_format($payments['total_price']) }} 원</span>
            <input type="hidden" name="total_price" value="{{ $payments['total_price'] }}" />
          </div>
          <div class="flex justify-between border-b border-grey-darker py-3">
            <span class="font-hk leading-none text-secondary">주문 수량</span>
            <span class="font-hk leading-none text-secondary">{{ number_format($total_quantities) }} 개</span>
            <input type="hidden" name="total_quantities" value="{{ $total_quantities }}" />
          </div>
          <div class="flex justify-between border-b border-grey-darker py-3">
            <span class="font-hk leading-none text-secondary">할인 금액</span>
            <span class="font-hk leading-none text-secondary">- 원</span>
          </div>
          <div class="flex justify-between border-b border-grey-darker py-3">
            <span class="font-hk leading-none text-secondary">배송비</span>
            <span class="font-hk leading-none text-secondary">{{ number_format($payments['delivery_fee']) }} 원</span>
            <input type="hidden" name="delivery_fee" value="{{ $payments['delivery_fee'] }}" />
          </div>
          <div class="flex justify-between py-3">
            <span class="font-hkbold leading-none text-secondary">합계</span>
            <span class="font-hkbold leading-none text-secondary">{{ number_format($payments['total_payment']) }} 원</span>
            <input type="hidden" name="total_amount" value="{{ $payments['total_payment'] }}" />
          </div>
        </div>
      </div>

    </div>
</form>
</div>

<!-- 모바일 주소찾기 용 -->
<div id="wrap" style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative">
  <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
</div>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
// 우편번호 찾기 찾기 화면을 넣을 element
var element_wrap = document.getElementById('wrap');

function foldDaumPostcode() {
    // iframe을 넣은 element를 안보이게 한다.
    element_wrap.style.display = 'none';
}

function execDaumPostCode() {

    let hasTouchScreen = false;
    const UA = navigator.userAgent;
    hasTouchScreen =
      /\b(BlackBerry|webOS|iPhone|IEMobile)\b/i.test(UA) ||
      /\b(Android|Windows Phone|iPad|iPod)\b/i.test(UA);

    if (hasTouchScreen) {
      // 현재 scroll 위치를 저장해놓는다.
      var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
      new daum.Postcode({
          oncomplete: function(data) {
              // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

              // 각 주소의 노출 규칙에 따라 주소를 조합한다.
              // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
              var addr = ''; // 주소 변수
              var extraAddr = ''; // 참고항목 변수

              //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
              if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                  addr = data.roadAddress;
              } else { // 사용자가 지번 주소를 선택했을 경우(J)
                  addr = data.jibunAddress;
              }

              // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
              if(data.userSelectedType === 'R'){
                  // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                  // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                  if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                      extraAddr += data.bname;
                  }
                  // 건물명이 있고, 공동주택일 경우 추가한다.
                  if(data.buildingName !== '' && data.apartment === 'Y'){
                      extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                  }
                  // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                  if(extraAddr !== ''){
                      extraAddr = ' (' + extraAddr + ')';
                  }
                  // 조합된 참고항목을 해당 필드에 넣는다.
                  document.getElementById("address1").value = extraAddr;
              
              } else {
                  document.getElementById("address1").value = '';
              }

              // 우편번호와 주소 정보를 해당 필드에 넣는다.
              document.querySelector("input[name=zipcode]").value = data.zonecode;
              document.getElementById("address1").value = addr;
              // 커서를 상세주소 필드로 이동한다.
              document.querySelector("input[name=address2]").focus();

              // iframe을 넣은 element를 안보이게 한다.
              // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
              element_wrap.style.display = 'none';

              // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
              document.body.scrollTop = currentScroll;
          },
          // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
          onresize : function(size) {
              element_wrap.style.height = size.height+'px';
          },
          width : '100%',
          height : '100%'
      }).embed(element_wrap);

      // iframe을 넣은 element를 보이게 한다.
      element_wrap.style.display = 'block';
    } else {
      //카카오 지도 발생
      let width = 500; //팝업의 너비
      let height = 600; //팝업의 높이
      new daum.Postcode({
          width: width, //생성자에 크기 값을 명시적으로 지정해야 합니다.
          height: height,
          oncomplete: function(data) { //선택시 입력값 세팅
              document.querySelector("input[name=zipcode]").value = data.zonecode;
              document.getElementById("address1").value = data.address; // 주소 넣기
              document.querySelector("input[name=address2]").focus(); //상세입력 포커싱
          }
      }).open({
            // left: (window.screen.width / 2) - (width / 2),
            // top: (window.screen.height / 2) - (height / 2)
            top: 0,
            left: 0
      });
    }        
}
/**
 * 최근 배송지 불러오기
 */
function getLatestAddress(){
  const url = `{{ route('user.address.show') }}`;
  let user_id = `{{ Auth::user()->id }}`;
    axios.get(url + '?user_id=' + user_id)
    .then((res) => {
        console.log(res);
        if (res.status === 200) {
          // alert("get address success");
          document.querySelector("input[name=zipcode]").value = res.data.address.zipcode;
          document.getElementById("address1").value = res.data.address.address1;
          document.querySelector("input[name=address2]").value = res.data.address.address2;
          document.querySelector("input[name=address_exists]").value = true;
        }
    })
    .catch((err) => {
      console.log("에러 발생 " + err);
    });
}

/**
 *  기본 주문 정보 저장
 */
var product_id = {{ $product->id }};
function saveOrder() {
  event.preventDefault();

  const form = document.querySelector("form");
  let isFormValid = form.checkValidity();

  if (!isFormValid) {
    form.reportValidity();
  } else {
    const formData = new FormData(form);
    // formData.append('product_id', product_id);

    const url = `{{ route('order.store') }}`;
    axios.post(url, formData)
    .then((res) => {
        console.log(res);
        if (res.status === 200) {
          // alert("성공");
          location.href = "/order/shipping/" + res.data.oid;
          // location.href = "/order/shipping/123";
        }
    })
    .catch((err) => {
      console.log("에러 발생 " + err);
    });
  }
}

</script>

@include('layouts.foot')