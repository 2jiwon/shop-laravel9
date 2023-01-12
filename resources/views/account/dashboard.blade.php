@include('layouts.head')


<div class="container border-t border-grey-dark">
  <div class="flex flex-col justify-between pt-10 pb-12 sm:pt-12 sm:pb-20 lg:flex-row lg:pb-24">

    <!-- 왼쪽 사이드 메뉴 -->
    <div class="lg:w-1/4">
      <p class="pb-6 font-dohyeon text-2xl text-secondary sm:text-3xl lg:text-4xl">
        내 쇼핑
      </p>
      <div class="flex flex-col pl-3">
        <a href="/account/dashboard" class="transition-all hover:font-bold hover:text-[#118ab2] px-4 py-3 border-l-2 border-primary-lighter hover:border-primary  font-dohyeon text-2xl font-bold text-[#118ab2] border-primary ">주문현황</a>
        <a href="/account/orders" class="transition-all hover:font-bold hover:text-[#118ab2] px-4 py-3 border-l-2 border-primary-lighter hover:border-primary  font-dohyeon text-2xl text-grey-darkest ">주문내역</a>
        <a href="/account/orders" class="transition-all hover:font-bold hover:text-[#118ab2] px-4 py-3 border-l-2 border-primary-lighter hover:border-primary  font-dohyeon text-2xl text-grey-darkest ">장바구니</a>
        <a href="/account/wishlist" class="transition-all hover:font-bold hover:text-[#118ab2] px-4 py-3 border-l-2 border-primary-lighter hover:border-primary  font-dohyeon text-2xl text-grey-darkest ">위시리스트</a>
        <a href="/account/wishlist" class="transition-all hover:font-bold hover:text-[#118ab2] px-4 py-3 border-l-2 border-primary-lighter hover:border-primary  font-dohyeon text-2xl text-grey-darkest ">리뷰관리</a>
        <a href="/account/account-details" class="transition-all hover:font-bold hover:text-[#118ab2] px-4 py-3 border-l-2 border-primary-lighter hover:border-primary  font-dohyeon text-2xl text-grey-darkest ">내 정보관리</a>
      </div>
      <a href="/logout" class="mt-24 hidden md:inline-block rounded border border-primary px-8 py-3 font-nanumgothic font-bold text-[#118ab2] transition-all hover:bg-primary hover:text-white">로그아웃</a>
    </div>
    <!-- 왼쪽 사이드 메뉴 End -->

    <!-- 메인 컨텐츠 -->
    <div class="mt-12 lg:mt-0 lg:w-3/4">
      <div class="bg-grey-light py-8 px-5 md:px-8">
        <h1 class="font-gowunbatangbold pb-6 text-center text-2xl text-secondary sm:text-left">
          구매 내역
        </h1>

        <div class="hidden sm:block">
          <div class="flex justify-between pb-3">
            <div class="w-1/3 pl-4 md:w-2/5">
              <span class="font-gowunbatangbold text-sm uppercase text-secondary">상품명</span>
            </div>
            <div class="w-1/4 text-center xl:w-1/5">
              <span class="font-gowunbatangbold text-sm uppercase text-secondary">수량</span>
            </div>
            <div class="mr-3 w-1/6 text-center md:w-1/5">
              <span class="font-gowunbatangbold text-sm uppercase text-secondary">구매가</span>
            </div>
            <div class="w-3/10 text-center md:w-1/5">
              <span class="font-gowunbatangbold pr-8 text-sm uppercase text-secondary md:pr-16 xl:pr-8">결과</span>
            </div>
          </div>
        </div>
        
        <div class="mb-3 flex flex-col items-center justify-between rounded bg-white px-4 py-5 shadow sm:flex-row sm:py-4">
          <div class="flex w-full flex-col border-b border-grey-dark pb-4 text-center sm:w-1/3 sm:border-b-0 sm:pb-0 sm:text-left md:w-2/5 md:flex-row md:items-center">
            <span class="font-gowunbatangbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">상품명</span>
            <div class="relative mx-auto w-20 sm:mx-0 sm:mr-3 sm:pr-0">
              <div class="flex h-20 items-center justify-center rounded">
                <div class="aspect-w-1 aspect-h-1 w-full">
                  <img src="https://elyssi.redpixelthemes.com/assets/img/unlicensed/shoes-3.png"
                    alt="product image"     class="object-cover"/>
                </div>
              </div>
            </div>
            <span class="mt-2 font-gowunbatang text-base text-secondary">Classic Beige</span>
          </div>
          <div class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/5 sm:border-b-0 sm:pb-0">
            <span class="font-gowunbatangbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">수량</span>
            <span class="font-gowunbatang text-secondary">11</span>
          </div>
          <div class="w-full pb-4 text-center sm:w-1/6 sm:pr-6 sm:pb-0 sm:text-right xl:w-1/5 xl:pr-16">
            <span class="font-gowunbatangbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">구매가</span>
            <span class="font-gowunbatang text-secondary">$1045</span>
          </div>
          <a href="/collection-grid" class="btn btn-primary whitespace-nowrap">Buy Again</a>
        </div>
        
        <!-- pagination -->
        <div class="flex justify-center pt-6 md:justify-end">
          <span class="cursor-pointer pr-5 font-nanumgothic font-semibold text-grey-darkest transition-colors hover:text-black">이전</span>
          <span class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-gowunbatang text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">1</span>
          <span class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-gowunbatang text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">2</span>
          <span class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-gowunbatang text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">3</span>
          <span class="cursor-pointer pl-2 font-nanumgothic font-semibold text-grey-darkest transition-colors hover:text-black">다음</span>
        </div>
        <!-- pagination End -->
      </div>

      <a href="/logout" class="mt-24 inline-block md:hidden rounded border border-primary px-8 py-3 font-nanumgothic font-bold text-[#118ab2] transition-all hover:bg-primary hover:text-white">로그아웃</a>

    </div>
    <!-- 메인 컨텐츠 End -->
  </div>
</div>


@include('layouts.foot')