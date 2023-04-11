<div :class="{ 'active': activeTab=== 'qna' }"
    class="tab-pane bg-grey-light py-10 transition-opacity md:py-16"
    role="tabpanel">
    
    <!-- 문의 표시 -->
    @if (count($questions) == 0)
    <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
        <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
            등록된 문의가 없습니다.
            </p>
        </div>
    </div>
    @else
        <div x-data="{
            loaded_q : [],
            questions : [
                @foreach ($questions as $question)
                    @php
                        $name = \App\Models\User::where('id', $question->user_id)->value('nickname');
                        $_name = mb_substr($name,0,1).str_repeat('*', strlen($name)-2).mb_substr($name,-1,1);
                    @endphp
                    {
                        title: '{{ $question->title }}',
                        contents: '{{ $question->contents }}',
                        name : '{{ $_name }}',
                        created_at : '{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $question->created_at)->diffForHumans() }}'
                    },
                @endforeach
            ],
            current_q : 0,
            per_q : 3,
            loadmore_q () {
                for (let i=0; i < this.per_q; i++) {
                    if (this.current_q < this.questions.length-1) {
                        this.current_q++;
                        this.loaded_q.push(this.questions[this.current_q])
                    }
                }
            },
            call_q () {
                for (let i=0; i < this.per_q; i++) {
                    if (this.current_q < this.questions.length) {
                        this.loaded_q.push(this.questions[i])
                        this.current_q++;
                    }
                }
            }
        }"
        x-init="call_q"
        >
            <template x-for="(item, index) in loaded_q">
                <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
                    <p class="font-dohyeonbold pt-3 text-lg text-secondary" x-text="item.title"></p>
                    <p class="pt-4 font-dohyeon text-secondary lg:w-5/6 xl:w-2/3" x-text="item.contents"></p>
                    <div class="flex items-center justify-center pt-3 sm:justify-start">
                        <p class="font-dohyeon text-sm text-grey-darkest">
                            <span>By</span> <span x-text="item.name"></span>
                        </p>
                        <span class="block px-4 font-dohyeon text-sm text-grey-darkest">.</span>
                        <p class="font-dohyeon text-sm text-grey-darkest" x-text="item.created_at"></p>
                    </div>
                </div>
            </template>
            <template x-if="current_q < questions.length-1">
                <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
                    <button type="button" @click="loadmore_q()" class="btn btn-xs btn-primary">더 보기</button>
                </div>
            </template>
        </div>
    @endif
    
    <!-- 문의 쓰기 -->
    @if (Auth::check())
        @if (!\App\Models\User::hasQuestion(Auth::id(), $product->id))
        <form id="questionForm" class="mx-auto w-5/6">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="grid grid-cols-1 gap-x-10 gap-y-5 pt-10">
                <div class="w-full">
                    <label class="mb-2 block font-dohyeon text-sm text-secondary" for="review_title">제목</label>
                    <input
                        type="text"
                        placeholder="제목을 입력하세요."
                        class="form-input"
                        id="question_title" 
                        name="title" 
                        />
                </div>

                <div class="sm:w-12/25 pt-2">
                    <label for="message" class="mb-2 block font-dohyeon text-sm text-secondary">내용</label>
                    <textarea
                    placeholder="내용을 작성해주세요."
                    class="form-textarea h-28"
                    name="contents"
                    maxlength="500"
                    id="message"></textarea>
                </div>

            </div>
        </form>

        <div class="mx-auto w-5/6 pt-8 pb-4 text-center sm:text-left md:pt-10">
            <a href="javascript:submitQuestion()" class="btn btn-primary">저장</a>
        </div>
        @endif
    @else
    <div class="w-5/6 mx-auto border-b border-transparent pb-8 text-center sm:text-left">
        <div class="flex items-center justify-center pt-3 sm:justify-start xl:pt-5">
            <p class="font-dohyeonbold pt-3 text-lg text-secondary">
                <a href="/login" target="_self">문의글을 작성하시려면 로그인을 해주세요.</a>
            </p>
        </div>
    </div>
    @endif
</div>

<script>
function submitQuestion(){
    const form = document.querySelector("#questionForm");
    const formData = new FormData(form);
    // console.log(...formData);

    const url = `{{ route('questions.create') }}`;
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