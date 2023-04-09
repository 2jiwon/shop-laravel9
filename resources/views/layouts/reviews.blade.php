<div :class="{ 'active': activeTab=== 'reviews' }"
    class="tab-pane bg-grey-light py-10 transition-opacity md:py-16"
    role="tabpanel">
    
    <!-- 리뷰 표시 -->
    @if (count($reviews) == 0)
    <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
         <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
            등록된 리뷰가 없습니다.
            </p>
        </div>
    </div>
    @else
        @foreach ($reviews as $review)
        <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
            <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
                @for ($i=0; $i < $review->rate; $i++)
                <i class="bx bxs-star text-primary"></i>
                @endfor
            </div>
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
                {{ $review->title }}
            </p>
            <p class="pt-4 font-dohyeon text-secondary lg:w-5/6 xl:w-2/3">
                {{ $review->contents }}
            </p>
            <div class="flex items-center justify-center pt-3 sm:justify-start">
                <p class="font-dohyeon text-sm text-grey-darkest">
                    @php
                        $name = \App\Models\User::where('id', $review->user_id)->value('nickname');
                        $_name = mb_substr($name,0,1).str_repeat('*', strlen($name)-2).mb_substr($name,-1,1);
                    @endphp
                    <span>By</span> {{ $_name }}
                </p>
                <span class="block px-4 font-dohyeon text-sm text-grey-darkest">.</span>
                <p class="font-dohyeon text-sm text-grey-darkest">
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->created_at)->diffForHumans() }}
                </p>
            </div>
        </div>
        @endforeach
    @endif
    
   
    <!-- 리뷰 쓰기 -->
    @if (Auth::check())
        @if (!\App\Models\User::hasReview(Auth::id(), $product->id))
        <form id="reviewForm" class="mx-auto w-5/6">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="grid grid-cols-1 gap-x-10 gap-y-5 pt-10">
                <div class="w-full">
                    <label class="mb-2 block font-dohyeon text-sm text-secondary" for="review_title">제목</label>
                    <input
                        type="text"
                        placeholder="제목을 입력하세요."
                        class="form-input"
                        id="review_title" 
                        name="title" 
                        />
                </div>
                <div class="w-full pt-10 sm:pt-0">
                    <label class="mb-2 block font-dohyeon text-sm text-secondary">별점</label>
                    <div x-data="
                        {
                            rating: 0,
                            hoverRating: 0,
                            ratings: [
                                {'amount': 1, 'label':'진짜 별로예요'},
                                {'amount': 2, 'label':'마음에 안들어요'},
                                {'amount': 3, 'label':'그냥 그래요'},
                                {'amount': 4, 'label':'좋아요'},
                                {'amount': 5, 'label':'최고예요'}
                            ],
                            rate(amount) {
                                if (this.rating == amount) {
                            this.rating = 0;
                        }
                                else this.rating = amount;
                            },
                        currentLabel() {
                        let r = this.rating;
                        if (this.hoverRating != this.rating) r = this.hoverRating;
                        let i = this.ratings.findIndex(e => e.amount == r);
                        if (i >=0) {return this.ratings[i].label;} else {return ''};     
                        }
                        }
                        " class="flex flex-col justify-start space-y-1 rounded m-1 p-1">
                        <div class="flex space-x-0 bg-gray-100">
                            <template x-for="(star, index) in ratings" :key="index">
                                <button type="button" 
                                    @click="rate(star.amount)" @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating"
                                    aria-hidden="true"
                                    :title="star.label"
                                    class="rounded-sm text-gray-400 fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer"
                                    :class="{'text-gray-600': hoverRating >= star.amount, 'text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                                    <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            </template>
                        </div>
                        <div class="p-2">
                            <template x-if="rating || hoverRating">
                                <p x-text="currentLabel()"></p>
                            </template>
                            <template x-if="!rating && !hoverRating">
                                <p>별점을 매겨주세요</p>
                            </template>
                        </div>
                        <p class="hidden" id="rate" x-text="rating"></p>
                    </div>
                </div>

                <div class="sm:w-12/25 pt-2">
                    <label for="message" class="mb-2 block font-dohyeon text-sm text-secondary">Review Message</label>
                    <textarea
                    placeholder="내용을 작성해주세요."
                    class="form-textarea h-28"
                    name="contents"
                    id="message"></textarea>
                </div>

            </div>
        </form>

        <div class="mx-auto w-5/6 pt-8 pb-4 text-center sm:text-left md:pt-10">
            <a href="javascript:submitReview()" class="btn btn-primary">저장</a>
        </div>
        @endif
    @else
    <div class="w-5/6 mx-auto border-b border-transparent pb-8 text-center sm:text-left">
        <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
                <a href="/login" target="_self">리뷰를 작성하시려면 로그인을 해주세요.</a>
            </p>
        </div>
    </div>
    @endif
</div>


<script>
function submitReview(){
    const form = document.querySelector("#reviewForm");
    const formData = new FormData(form);
    
    const rate = document.querySelector('#rate').innerText;
    formData.append('rate', rate);
    // console.log(...formData);

    const url = `{{ route('reviews.create') }}`;
    axios.post(url, formData)
            .then((res) => {
                console.log(res);
                if (res.status === 200) {
                    alert("등록되었어요.");
                    location.reload();
                }
            })
            .catch((err) => {
            console.log("에러 발생 " + err);
            });
}
</script>

