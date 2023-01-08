<x-admin-layout>
    @include('layouts.admin.header')  

    <!-- 카테고리 관리 -->
    <h1 class="text-3xl text-black pb-6">카테고리 관리</h1>

    <div x-data="{ clicked : false }">
        <div class="flex flex-wrap mt-3 mb-3 justify-end">
           <button type="button" @click="clicked = !clicked" class="inline-block rounded-md bg-cyan-600 px-4 py-1.5 shadow-sm text-white hover:bg-cyan-700 hover:ring-cyan-700">
            카테고리 등록
            </button>
        </div>

        <form x-show="clicked">
            <div class="flex flex-wrap bg-white">
                <div class="w-full mt-6 lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <div class="p-10 rounded" x-data="{ selected1 : false, selected2 : false }">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="type">타입1</label>
                            <select name="type" @change="$event.target.value == 'sub1' ? selected1=true : ($event.target.value == 'sub2' ? selected2=selected1=true : selected2=selected1=false)" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                <option value="">선택</option>
                                <option value="main">대 카테고리</option>
                                <option value="sub1">중 카테고리</option>
                                <option value="sub2">소 카테고리</option>
                            </select>
                        </div>


                        <div class="mt-2" x-show="selected1">
                            <label class="block text-sm text-gray-600" for="type">대 카테고리 선택</label>
                            @if (count($main) == 0)
                            <p>아직 등록된 카테고리가 없습니다.</p>
                            @else
                            <select name="main" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                @foreach ($main as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="mt-2" x-show="selected2">
                            <label class="block text-sm text-gray-600" for="type">중 카테고리 선택</label>
                            <select name="sub1" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                 @foreach ($sub1 as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-6 lg:w-1/2 pl-0 lg:pl-2">
                    <div class="p-10 rounded">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">카테고리 이름</label>
                            <input class="w-full px-5 py-1 text-gray-300 rounded" name="name" type="text" placeholder="카테고리 이름을 입력" required>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <input class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit"  value="등록하기" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i>카테고리 목록 
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full  text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">번호</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">카테고리 이름</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">카테고리 타입</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">상위 카테고리</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="text-center py-3 px-2">{{ $category->id }}</td>
                        <td class="text-center py-3 px-2">{{ $category->name }}</td>
                        <td class="text-center py-3 px-2">{{ $category->type }}</td>                        
                        <td class="text-center py-3 px-2">{{ $category->parent }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- pagination -->
    <!-- <div class="mt-5">
    </div> -->

<!-- form 처리 -->
<script>
const form = document.querySelector("form");
form.addEventListener("submit", (e) => {
e.preventDefault();

const formData = new FormData(form);
console.log(formData);

const url = `{{ route('category.store') }}`;
axios
.post(url, formData)
.then((res) => {
    console.log(res);
    if (res.status === 200) {
        alert("등록 완료");
        location.reload();
    }
})
.catch((err) => {
    console.log("에러 발생 " + err);
});
});
</script>

</x-admin-layout>