<x-admin-layout>
    @include('layouts.admin.header')  

    <!-- 배너 관리 -->
    <h1 class="text-3xl text-black pb-6">배너 관리</h1>

    <div x-data="{ clicked : false }">
        <div class="flex flex-wrap mt-3 mb-3 justify-end">
           <button type="button" @click="clicked = !clicked" class="inline-block rounded-md bg-cyan-600 px-4 py-1.5 shadow-sm text-white hover:bg-cyan-700 hover:ring-cyan-700">
            배너 등록
            </button>
        </div>

        <form enctype="multipart/form-data" x-show="clicked">
            <div class="flex flex-wrap bg-white">
                <div class="w-full mt-12 lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <div class="p-10 rounded">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="cate1">타입</label>
                            <select name="type" id="" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                <option value="main">메인</option>
                                <option value="collection">컬렉션</option>
                                <option value="event">이벤트</option>
                            </select>
                        </div>                       
                        
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600 dark:text-white" for="image">배너 이미지</label>
                            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="image" name="image" type="file" required>
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
            <i class="fas fa-list mr-3"></i>배너 목록 
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full  text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">번호</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">타입</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">이미지</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">수정일시</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">등록일시</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="text-center py-3 px-2">{{ $banner->id }}</td>
                        <td class="text-center py-3 px-2">{{ $banner->type }}</td>
                        <td class="text-left py-3 px-2">
                            <img class="w-20 h-20 border-2 border-solid border-slate-400" src="{{ asset('storage/'.$banner->filename) }}" alt="">
                        </td>
                        <td class="text-center py-3 px-2">{{ $banner->updated_at }}</td>
                        <td class="text-center py-3 px-2">{{ $banner->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- pagination -->
    <div class="mt-5">
        {{ $banners->links() }}
    </div>

<!-- form 처리 -->
<script>
const form = document.querySelector("form");
form.addEventListener("submit", (e) => {
e.preventDefault();
tinymce.triggerSave();

const formData = new FormData(form);
const url = `{{ route('banner.store') }}`;
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
