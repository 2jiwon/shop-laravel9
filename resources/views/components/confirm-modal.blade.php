@props(['type', 'for', 'click', 'callback'])

@php
$h3 = "";
$btn1 = "";
$btn2 = "";
$input = true;
$type_title = "";

switch ($type) {
    case 'cart':
        $type_title = "장바구니";
        break;
    case 'wishlist':
        $type_title = "위시리스트";
        break;
    default:
        break;
}

switch ($for) {
    case 'success':
        $h3 = "{$type_title}에 상품이 담겼어요.";
        $btn1 = "{$type_title}로 이동";
        $btn2 = "쇼핑 계속하기";
        $input = false;
        break;
    case 'ask':
        $h3 = "{$type_title}에 동일한 상품이 있습니다. 추가로 담으시겠습니까?";
        $btn1 = "추가하기";
        $btn2 = "취소";
        break;
    default:
        break;
}

@endphp

<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="{{ $type.$for }}Modal">
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <!--content-->
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <!--body-->
      <div class="relative p-6 flex-auto">
         <h3 class="font-semibold">
         {{ $h3 }}
        </h3>
        @unless(!$input) 
            <input type="hidden" id="{{ $type }}Data" value="">
        @endunless
      </div>
      <!--footer-->
      <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
        <button class="btn btn-primary px-6 py-3 mr-4 md:mr-6" type="button" onclick="{{ $click }}">
          {{ $btn1 }}
        </button>
        <button class="btn btn-outline px-6 py-3" type="button" onclick="toggle('{{ $type }}','{{ $for }}Modal', null, null, {{ $callback ?? null }})">
          {{ $btn2 }}
        </button>
      </div>
    </div>
  </div>
</div>
<div class="hidden bg-opacity-25 fixed inset-0 z-40 bg-black" id="{{ $type.$for }}Modal-backdrop"></div>