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
            <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">
              <h4 class="font-hkbold mb-4 text-xl text-secondary sm:text-left">
                기본 배송지
              </h4>

              <div class="w-full text-right">
                <button class="btn btn-primary px-3 py-2">+</button>
              </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
              <div class="">
                <label for="zip" class="mb-2 block font-hk text-secondary">우편번호</label>
                <input type="email" class="form-input" name="zip" required />
              </div>
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">
              <div class="w-full">
                <label for="street" class="mb-2 block font-hk text-secondary">주소1</label>
                <input type="text" class="form-input" id="address1" name="address1" placeholder="주소를 입력하시려면 클릭하세요." onClick="execDaumPostCode()"/>
              </div>
              <div class="w-full">
                <label for="street2" class="mb-2 block font-hk text-secondary">주소2</label>
                <input type="text" class="form-input" name="address2" placeholder="상세주소를 입력해주세요." />
              </div>
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
               <div class="">
                <label for="phone" class="mb-2 block font-hk text-secondary">핸드폰 번호</label>
                <input type="text" class="form-input" name="phone"/>
              </div>
            </div>
          </div>

          <div class="grid justify-end">
            <button class="btn btn-primary" aria-label="Save button">
              Save
            </button>
          </div>
        </form>

        <!-- 모바일 주소찾기 용 -->
        <div id="wrap" style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative">
          <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
        </div>

      </div>
    </div>
    <!-- 메인 컨텐츠 End -->

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
                  document.querySelector("input[name=zip]").value = data.zonecode;
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
                  document.querySelector("input[name=zip]").value = data.zonecode;
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

    </script>
  
@include('layouts.account.foot')