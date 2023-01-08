<x-admin-layout>
    @include('layouts.admin.header')  

    <!-- 상품 관리 -->
    <h1 class="text-3xl text-black pb-6">상품 관리</h1>

    <div x-data="{ clicked : false }">
        <div class="flex flex-wrap mt-3 mb-3 justify-end">
           <button type="button" @click="clicked = !clicked" class="inline-block rounded-md bg-cyan-600 px-4 py-1.5 shadow-sm text-white hover:bg-cyan-700 hover:ring-cyan-700">
            상품 등록
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

                        <div class="mt-2">
                            <label class="block text-sm text-gray-600 dark:text-white" for="image_main">상품 이미지(대표)</label>
                            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="image_main" name="image_main" type="file" required>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="image_detail">상품 이미지(상세)</label>
                            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="image_detail" name="image_detail" type="file" required>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-12 lg:w-1/2 pl-0 lg:pl-2">
                    <div class="p-10 rounded">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="detail">상세설명</label>
                            <textarea id="detail" name="detail"></textarea>
                        </div>

                        <div class="mt-5 flex justify-end">
                            <label class="block mr-2 text-sm text-gray-600" for="supply_price">공급가 (원)</label>
                            <input class=" w-1/2 px-5 py-1 text-gray-300 rounded" id="supply_price" name="supply_price" type="number" value="1000" required>
                        </div>
                        <div class="mt-2 flex justify-end">
                            <label class="block mr-2 text-sm text-gray-600" for="selling_price">판매가 (원)</label>
                            <input class="w-1/2 px-5 py-1 text-gray-300 rounded" id="selling_price" name="selling_price" type="number" value="1000" required>
                        </div>
                        <div class="mt-2 flex justify-end">
                            <label class="block mr-2 text-sm text-gray-600" for="delivery_fee">배송비 (원)</label>
                            <input class="w-1/2 px-5 py-1 text-gray-300 rounded" id="delivery_fee" name="delivery_fee" type="number" value="1000" required>
                        </div>
                        <div class="mt-2 flex justify-end">
                            <label class="block mr-2 text-sm text-gray-600" for="stock_amount">재고 (EA)</label>
                            <input class="w-1/2 px-5 py-1 text-gray-300 rounded" id="stock_amount" name="stock_amount" type="number" value="10" required>
                        </div>

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
            <i class="fas fa-list mr-3"></i>상품 목록 
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">Lian</td>
                        <td class="w-1/3 text-left py-3 px-4">Smith</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/3 text-left py-3 px-4">Emma</td>
                        <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
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
