@extends('layouts.admin.contents')

@section('menu', '상품')

@section('descriptionForRegister', '상품 정보를 등록합니다')

@section('registerLeft')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="name">상품명</label>
            <input class="w-full px-5 py-1 text-gray-300 rounded" name="name" type="text" placeholder="상품명을 입력" required>
        </div>
 
        @php $categories = \App\Models\Category::getAll(); @endphp
        <div x-data="{ 
            /**
             *  hasSub1: 대 카테고리 선택 후 표시할 중 카테고리가 있는지
             *  hasSub2: 중 카테고리 선택 후 표시할 소 카테고리가 있는지
            */
            hasSub1:false, 
            hasSub2:false,
            /**
             *  selected1: 대 카테고리를 변경했을 때 선택한 category_id
             *  selected2: 중 카테고리를 변경했을 때 선택한 category_id
            */ 
            selected1: 0,
            selected2: 0,
            /**
             *  대,중,소 별로 카테고리 표시하기 위한 부분
            */
            mains: [
                @foreach ($categories as $category)
                    @if ($category->type == 'main')
                        { id: {{ $category->id }},
                        type: '{{ $category->type }}',
                        name: '{{ $category->name }}'
                        },
                    @endif
                @endforeach
            ],
            sub1s: [
                @foreach ($categories as $category)
                    @if ($category->type == 'sub1')
                        { id: {{ $category->id }},
                        type: '{{ $category->type }}',
                        parent1: '{{ $category->parent1 }}',
                        name: '{{ $category->name }}'
                        },
                    @endif
                @endforeach
            ],
            sub2s: [
                @foreach ($categories as $category)
                    @if ($category->type == 'sub2')
                        { id: {{ $category->id }},
                        type: '{{ $category->type }}',
                        parent1: '{{ $category->parent1 }}',
                        parent2: '{{ $category->parent2 }}',
                        name: '{{ $category->name }}'
                        },
                    @endif
                @endforeach
            ],
            }">

            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="cate1">대 카테고리</label>
                <select name="cate_main" @change="hasSub1=true,selected1=$event.target.value" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option value="">선택</option> 
                    <template x-for="(main, index) in mains" :key="main.id">
                        <option :value="main.id" x-text="main.name"></option> 
                    </template>
                </select>
            </div>

            <div class="mt-2" x-show="hasSub1">
                <label class="block text-sm text-gray-600" for="cate2">중 카테고리</label>
                <select name="cate_sub1" @change="hasSub2=true,selected2=$event.target.value" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option value="">선택</option> 
                    <template x-for="sub1 in sub1s.filter(item => item.parent1 == selected1)" :key="sub1.id">
                        <option :value="sub1.id" x-text="sub1.name"></option>
                    </template>
                </select>
            </div>

            <div class="mt-2" x-show="hasSub2">
                <label class="block text-sm text-gray-600" for="cate3">소 카테고리</label>
                <select name="cate_sub2" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="">선택</option> 
                    <template x-for="sub2 in sub2s.filter(item => item.parent2 == selected2)" :key="sub2.id">
                        <option :value="sub2.id" x-text="sub2.name"></option>
                    </template>
                </select>
            </div>
        </div>   

        <div class="mt-2">
            <label class="block text-sm text-gray-600 dark:text-white" for="image_main">상품 이미지(대표)</label>
            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="image_main" name="image_main" type="file" required>
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="image_detail1">상품 이미지(상세)1</label>
            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="image_detail1" name="image_detail1" type="file" required>
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="image_detail2">상품 이미지(상세)2</label>
            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="image_detail2" name="image_detail2" type="file" required>
        </div>
    </div>
@endsection

@section('registerRight')
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
                <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                <span x-show="toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">판매중</span>
                <span x-show="!toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">판매중지</span>
            </label>
        </div>

        <div class="mt-2 flex justify-end" x-data="{ toggle: true }">
            <label class="block mr-3 text-sm text-gray-600">진열여부</label>
            <label class="relative inline-flex items-center cursor-pointer">
                <input name="is_displaying" type="checkbox" value="Y" class="sr-only peer" @click="toggle === true ? toggle = false : toggle = true" checked>
                <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                <span x-show="toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">진열중</span>
                <span x-show="!toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">진열중지</span>
            </label>
        </div>

        <div class="mt-6 flex justify-end">
            <x-admin.btn type="button" for="cancel" xclick="register=false">
                취소
            </x-admin.btn>
            &nbsp;&nbsp;
            <x-admin.btn type="submit" for="submit">
                등록하기
            </x-admin.btn>
        </div>
        
    </div>
@endsection

@section('descriptionForEdit', '등록한 상품 정보를 수정합니다')

@section('editLeft')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="name">상품명</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="name" id="edit_name" placeholder="상품명을 입력" required>
        </div>
        
        @php $categories = \App\Models\Category::getAll(); @endphp
        <div id="xData" x-data="{
            /**
             *  hasSub1: 대 카테고리 선택 후 표시할 중 카테고리가 있는지
             *  hasSub2: 중 카테고리 선택 후 표시할 소 카테고리가 있는지
            */
            hasSub1:false, 
            hasSub2:false,
            /**
             *  selected1: 대 카테고리를 변경했을 때 선택한 category_id
             *  selected2: 중 카테고리를 변경했을 때 선택한 category_id
            */ 
            selected1: 0,
            selected2: 0,
            /**
             *  ajax로 받아온 카테고리 정보 저장을 위함
            */ 
            categoryInfo: 0,
            /**
             *  대,중,소 별로 카테고리 표시하기 위한 부분
            */
            mains: [
                @foreach ($categories as $category)
                    @if ($category->type == 'main')
                        { id: {{ $category->id }},
                        type: '{{ $category->type }}',
                        name: '{{ $category->name }}'
                        },
                    @endif
                @endforeach
            ],
            sub1s: [
                @foreach ($categories as $category)
                    @if ($category->type == 'sub1')
                        { id: {{ $category->id }},
                        type: '{{ $category->type }}',
                        parent1: '{{ $category->parent1 }}',
                        name: '{{ $category->name }}'
                        },
                    @endif
                @endforeach
            ],
            sub2s: [
                @foreach ($categories as $category)
                    @if ($category->type == 'sub2')
                        { id: {{ $category->id }},
                        type: '{{ $category->type }}',
                        parent1: '{{ $category->parent1 }}',
                        parent2: '{{ $category->parent2 }}',
                        name: '{{ $category->name }}'
                        },
                    @endif
                @endforeach
            ],

            /**
             *  x-data 부분 로딩될 때 처음 실행되고, 
             *  admin.js > setCategory 함수에서 실행함
             */
            cate() {
                // 서버에서 가져온 카테고리 정보(object)
                categoryInfo = this.categoryInfo;

                // 카테고리가 소,중,대인지에 따라 상위 카테고리와 함께 표시하기 위한 부분
                if (categoryInfo.type == 'sub2') {
                    this.hasSub2 = true;
                    this.hasSub1 = true;
                    this.selected2 = categoryInfo.parent2;
                    document.querySelector('#edit_cate_main').value = categoryInfo.parent1;
                    document.querySelector('#edit_cate_sub1').value = categoryInfo.parent2;
                    document.querySelector('#edit_cate_sub2').value = categoryInfo.id;
                } else if (categoryInfo.type == 'sub1') {
                    this.hasSub2 = false;
                    this.hasSub1 = true;
                    this.selected1 = categoryInfo.parent1;
                    this.selected2 = categoryInfo.id;
                    document.querySelector('#edit_cate_main').value = categoryInfo.parent1;
                    document.querySelector('#edit_cate_sub1').value = categoryInfo.id;
                    document.querySelector('#edit_cate_sub2').value = '';
                } else {
                    this.hasSub1 = false;
                    this.hasSub2 = false;
                    this.selected1 = categoryInfo.id;
                    document.querySelector('#edit_cate_main').value = categoryInfo.id;
                    document.querySelector('#edit_cate_sub1').value = '';
                    document.querySelector('#edit_cate_sub2').value = '';
                }
            }
            }" x-init="cate()">

            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="cate1">대 카테고리</label>
                    <select id="edit_cate_main" name="cate_main" @click="hasSub1=true,selected1=$event.target.value" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        <option value="">선택</option> 
                        <template x-for="main in mains" :key="main.id">
                            <option :value="main.id" x-text="main.name"></option>
                        </template>
                </select>
            </div>

            <div class="mt-2" x-show="hasSub1" x-data="{hasChange1:false}">
                <label class="block text-sm text-gray-600" for="cate2">중 카테고리</label>
                <select id="edit_cate_sub1" name="cate_sub1" @click="hasChange1=true" @change="hasSub2=true,selected2=$event.target.value" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option value="">선택</option>
                    <template x-if="!hasChange1">
                        <template x-for="sub1 in sub1s" :key="sub1.id">
                            <option :value="sub1.id" x-text="sub1.name"></option>
                        </template>
                    </template>
                    <template x-if="hasChange1">
                        <template x-for="sub1 in sub1s.filter(item => item.parent1 == selected1)" :key="sub1.id">
                            <option :value="sub1.id" x-text="sub1.name"></option>
                        </template>
                    </template>
                </select>
            </div>
            <div class="mt-2" x-show="hasSub2" x-data="{hasChange2:false}">
                <label class="block text-sm text-gray-600" for="cate3">소 카테고리</label>
                <select id="edit_cate_sub2" name="cate_sub2" @click="hasChange2=true" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="">선택</option>
                    <template x-if="!hasChange2">
                        <template x-for="sub2 in sub2s" :key="sub2.id">
                            <option :value="sub2.id" x-text="sub2.name"></option>
                        </template>
                    </template>
                    <template x-if="hasChange2">
                        <template x-for="sub2 in sub2s.filter(item => item.parent2 == selected2)" :key="sub2.id">
                            <option :value="sub2.id" x-text="sub2.name"></option>
                        </template>
                    </template>
                </select>
            </div>
        </div>

        <div class="mt-2">
            <img id="edit_image_main" class="w-20 h-20 border-2 border-solid border-slate-400" src="" alt="">
            <label class="block text-sm text-gray-600 dark:text-white" for="image_main">상품 이미지(대표)</label>
            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="edit_image_main" name="image_main" type="file">
        </div>
        <div class="mt-2">
            <img id="edit_image_detail1" class="w-20 h-20 border-2 border-solid border-slate-400" src="" alt="">
            <label class="block text-sm text-gray-600" for="image_detail">상품 이미지(상세) 1</label>
            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="edit_image_detail1" name="image_detail1" type="file">
        </div>
         <div class="mt-2">
            <img id="edit_image_detail2" class="w-20 h-20 border-2 border-solid border-slate-400" src="" alt="">
            <label class="block text-sm text-gray-600" for="image_detail">상품 이미지(상세) 2</label>
            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="edit_image_detail2" name="image_detail2" type="file">
        </div>
    </div>
@endsection

@section('editRight')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="detail">상세설명</label>
            <textarea id="edit_detail" name="detail"></textarea>
        </div>

        <div class="mt-5 flex justify-end">
            <label class="block mr-2 text-sm text-gray-600" for="supply_price">공급가 (원)</label>
            <input class=" w-1/2 px-5 py-1 text-gray-300 rounded" id="edit_supply_price" name="supply_price" type="number" value="1000" required>
        </div>
        <div class="mt-2 flex justify-end">
            <label class="block mr-2 text-sm text-gray-600" for="selling_price">판매가 (원)</label>
            <input class="w-1/2 px-5 py-1 text-gray-300 rounded" id="edit_selling_price" name="selling_price" type="number" value="1000" required>
        </div>
        <div class="mt-2 flex justify-end">
            <label class="block mr-2 text-sm text-gray-600" for="delivery_fee">배송비 (원)</label>
            <input class="w-1/2 px-5 py-1 text-gray-300 rounded" id="edit_delivery_fee" name="delivery_fee" type="number" value="1000" required>
        </div>
        <div class="mt-2 flex justify-end">
            <label class="block mr-2 text-sm text-gray-600" for="stock_amount">재고 (EA)</label>
            <input class="w-1/2 px-5 py-1 text-gray-300 rounded" id="edit_stock_amount" name="stock_amount" type="number" value="10" required>
        </div>

        <div class="mt-2 flex justify-end" x-data="{ toggle: true }">
            <label class="block mr-3 text-sm text-gray-600">판매여부</label>
            <label class="relative inline-flex items-center cursor-pointer">
                <input name="is_selling" type="checkbox" id="edit_is_selling" value="Y" class="sr-only peer" @click="toggle === true ? toggle = false : toggle = true" checked>
                <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                <span x-show="toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">판매중</span>
                <span x-show="!toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">판매중지</span>
            </label>
        </div>

        <div class="mt-2 flex justify-end" x-data="{ toggle: true }">
            <label class="block mr-3 text-sm text-gray-600">진열여부</label>
            <label class="relative inline-flex items-center cursor-pointer">
                <input name="is_displaying" type="checkbox" id="edit_is_displaying" value="Y" class="sr-only peer" @click="toggle === true ? toggle = false : toggle = true" checked>
                <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                <span x-show="toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">진열중</span>
                <span x-show="!toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">진열중지</span>
            </label>
        </div>

        <div class="mt-6 flex justify-end">
            <x-admin.btn type="button" for="cancel" xclick="edit=false">
                취소
            </x-admin.btn>
            &nbsp;&nbsp;
            <x-admin.btn type="submit" for="submit">
                수정하기
            </x-admin.btn>
        </div>
    </div>
@endsection

@section('table')
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
                <tr @click="register=false;edit=true;getData('product', {{ $product->id }})" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 hover:cursor-pointer">
                    <td class="text-center py-3 px-2">{{ $product->id }}</td>
                    <td class="text-center py-3 px-2">{{ $product->name }}</td>
                    <td class="text-left py-3 px-2">
                        <div class="grid grid-cols-2">
                        @foreach ($product->images as $image)
                            <img class="w-20 h-20 border-2 border-solid border-slate-400" src="{{ asset('storage/'.$image->image) }}" alt="">
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
@endsection

@section('pagination')
    <!-- pagination -->
    <div class="mt-5">
        {{ $products->links() }}
    </div>
@endsection

<!-- form 처리 -->
@section('script')
    <script>
    getUrl = "/admin/product/";
    els = {
        'id': 'value',
        'name' : 'value',
        'category': 'value',
        'image_main' : 'src',
        'image_detail1' : 'src',
        'image_detail2' : 'src',
        'detail': 'value',
        'supply_price': 'value',
        'selling_price': 'value',
        'delivery_fee': 'value',
        'stock_amount': 'value',
        'is_selling': 'checked',
        'is_displaying': 'checked',
    };

    registerElementName = "#registerForm";
    registerUrl = `{{ route('product.store') }}`;

    editElementName = "#editForm";
    editUrl = `{{ route('product.update') }}`;
    </script>
@endsection
