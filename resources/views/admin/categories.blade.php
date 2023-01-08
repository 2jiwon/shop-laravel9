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

        <form enctype="multipart/form-data" x-show="clicked">
            <div class="flex flex-wrap bg-white">
                <div class="w-full mt-12 lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <div class="p-10 rounded">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">상품명</label>
                            <input class="w-full px-5 py-1 text-gray-300 rounded" name="name" type="text" placeholder="상품명을 입력" required>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="cate1">카테고리1</label>
                            <select name="cate1" id="" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                <option value="c001">카테1</option>
                                <option value="c002">카테2</option>
                            </select>
                        </div>                       
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="cate2">카테고리2</label>
                            <select name="cate2" id="" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option value="c003">카테1</option>
                                <option value="c004">카테2</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="cate3">카테고리3</label>
                            <select name="cate3" id="" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option value="c005">카테1</option>
                                <option value="c006">카테2</option>
                            </select>
                        </div>

                       
                    </div>
                </div>

                <div class="w-full mt-12 lg:w-1/2 pl-0 lg:pl-2">
                    <div class="p-10 rounded">
                        

                        <div class="mt-2 flex justify-end" x-data="{ toggle: true }">
                            <label class="block mr-3 text-sm text-gray-600">판매여부</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input name="is_selling" type="checkbox" value="Y" class="sr-only peer" @click="toggle === true ? toggle = false : toggle = true" checked>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-600"></div>
                                <span x-show="toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">판매중</span>
                                <span x-show="!toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">판매중지</span>
                            </label>
                        </div>

                        <div class="mt-2 flex justify-end" x-data="{ toggle: true }">
                            <label class="block mr-3 text-sm text-gray-600">진열여부</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input name="is_displaying" type="checkbox" value="Y" class="sr-only peer" @click="toggle === true ? toggle = false : toggle = true" checked>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-600"></div>
                                <span x-show="toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">진열중</span>
                                <span x-show="!toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">진열중지</span>
                            </label>
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
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">상품명</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">이미지</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">상세설명</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">공급가</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">판매가</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">배송비</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">재고</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">판매여부</th>
                        <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">진열여부</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="text-center py-3 px-2">{{ $product->id }}</td>
                        <td class="text-center py-3 px-2">{{ $product->name }}</td>
                        <td class="text-left py-3 px-2">
                            <div class="grid grid-cols-2">
                            @foreach ($product->images as $image)
                                <img class="w-20 h-20 border-2 border-solid border-slate-400" src="{{ asset('storage/'.$image->filename) }}" alt="">
                            @endforeach
                            </div>
                        </td>
                        <td class="text-center text-xs py-3 px-2">{{ $product->detail }}</td>
                        <td class="text-center py-3 px-2">{{ number_format($product->supply_price) }} 원</td>
                        <td class="text-center py-3 px-2">{{ number_format($product->selling_price) }} 원</td>
                        <td class="text-center py-3 px-2">{{ number_format($product->delivery_fee) }} 원</td>
                        <td class="text-center py-3 px-2">{{ number_format($product->stock_amount) }} EA</td>
                        <td class="text-center py-3 px-2">{{ $product->is_selling == "Y" ? "판매중" : "판매중지" }}</td>
                        <td class="text-center py-3 px-2">{{ $product->is_displaying == "Y" ? "진열중" : "진열중지" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- pagination -->
    <div class="mt-5">
        {{ $products->links() }}
    </div>

<!-- form 처리 -->
<script>
const form = document.querySelector("form");
form.addEventListener("submit", (e) => {
e.preventDefault();
tinymce.triggerSave();

const formData = new FormData(form);
const url = `{{ route('product.store') }}`;
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