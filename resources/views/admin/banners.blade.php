<x-admin-layout>
    @include('layouts.admin.header')  

    <x-toast id="toast" type="success">
    </x-toast>
    <!-- 배너 관리 -->
    <h1 class="text-3xl text-black pb-6">배너 관리</h1>

    <!-- /* 수정 폼 표시를 위한 x-data */ -->
    <div x-data="{ edit : false }">

        <!-- /* 등록 폼 표시를 위한 x-data */ -->
        <div x-data="{ clicked : false }">
            <div class="flex flex-wrap mt-3 mb-3 justify-end">
            <button type="button" @click="clicked = !clicked" x-show="!edit" class="inline-block rounded-md bg-cyan-600 px-4 py-1.5 shadow-sm text-white hover:bg-cyan-700 hover:ring-cyan-700">
                배너 등록
                </button>
            </div>

            <form enctype="multipart/form-data" x-show="clicked" id="registerForm">
                <div class="flex flex-wrap bg-white">
                    <div class="w-full mt-12 lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <h1 class="text-xl pl-10">메인 슬라이더, 이벤트, 컬렉션에 사용할 배너를 등록합니다</h1>
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
                                <label class="block text-sm text-gray-600" for="title">타이틀</label>
                                <input class="w-full px-5 py-1 text-gray-300 rounded" name="title" type="text" placeholder="타이틀을 입력" required>
                            </div>

                            <div class="mt-2">
                                <label class="block text-sm text-gray-600 dark:text-white" for="image">배너 이미지</label>
                                <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" id="image" name="image" type="file" required>
                            </div>

                            <div class="mt-2 flex justify-end" x-data="{ toggle: true }">
                                <label class="block mr-3 text-sm text-gray-600">사용여부</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input name="is_on" type="checkbox" value="Y" class="sr-only peer" @click="toggle === true ? toggle = false : toggle = true" checked>
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                                    <span x-show="toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">사용함</span>
                                    <span x-show="!toggle" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">사용안함</span>
                                </label>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-admin.btn type="button" type2="cancel" click2="clicked=false">
                                    취소
                                </x-admin.btn>
                                &nbsp;&nbsp;
                                <x-admin.btn type="button" type2="submit" click="register()">
                                    등록하기
                                </x-admin.btn>
                            </div>
                            
                        </div>
                    </div>
                
                </div>
            </form>
        </div>

        <!-- 수정 form -->
        <div x-show="edit">
            <form enctype="multipart/form-data" x-show="edit" id="editForm">
                <input type="hidden" name="mode" value="edit">
                <input type="hidden" name="id" id="edit_id">
                <div class="flex flex-wrap bg-white">
                    <div class="w-full mt-12 lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <div class="p-10 rounded">
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cate1">타입</label>
                                <select name="type" id="edit_type" class="block w-full p-2 text-sm text-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                    <option value="main">메인</option>
                                    <option value="collection">컬렉션</option>
                                    <option value="event">이벤트</option>
                                </select>
                            </div>                       
                            
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="title">타이틀</label>
                                <input class="w-full px-5 py-1 text-gray-300 rounded" id="edit_title" name="title" type="text" placeholder="타이틀을 입력" required>
                            </div>

                            <div class="mt-2">
                                <img id="edit_image" class="w-20 h-20 border-2 border-solid border-slate-400" src="" alt="">
                                <label class="block text-sm text-gray-600 dark:text-white" for="image">배너 이미지</label>
                                <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" name="image" type="file" required>
                            </div>

                            <div class="mt-2 flex justify-end" x-data="{ toggle2: true }">
                                <label class="block mr-3 text-sm text-gray-600">사용여부</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input name="is_on" id="edit_is_on" type="checkbox" value="Y" class="sr-only peer" @click="toggle2 === true ? toggle2 = false : toggle2 = true">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                                    <span x-show="toggle2" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">사용함</span>
                                    <span x-show="!toggle2" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">사용안함</span>
                                </label>
                            </div>

                            <div class="mt-6 flex justify-end">
                                 <x-admin.btn type="button" type2="cancel" click2="edit=false">
                                    취소
                                </x-admin.btn>
                                &nbsp;&nbsp;
                                <x-admin.btn type="button" type2="submit" click="edit()">
                                    수정하기
                                </x-admin.btn>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div> 
        <!-- 수정 form End -->

        
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
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">타이틀</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">이미지</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">사용여부</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">수정일시</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">등록일시</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                        <tr @click="edit=true;getData({{ $banner->id }})" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-amber-50 dark:hover:bg-gray-600 hover:cursor-pointer">
                            <td class="text-center py-3 px-2">{{ $banner->id }}</td>
                            <td class="text-center py-3 px-2">{{ $banner->type }}</td>
                            <td class="text-center py-3 px-2">{{ $banner->title }}</td>
                            <td class="text-left py-3 px-2">
                                <img class="w-20 h-20 border-2 border-solid border-slate-400" src="{{ asset('storage/'.$banner->image) }}" alt="">
                            </td>
                            <td class="text-center py-3 px-2">{{ $banner->is_on }}</td>
                            <td class="text-center py-3 px-2">{{ $banner->updated_at }}</td>
                            <td class="text-center py-3 px-2">{{ $banner->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- pagination -->
    <div class="mt-5">
        {{ $banners->links() }}
    </div>


<!-- form 처리 -->
<script>
getUrl = "/admin/banner/";
els = {
    'id': 'value',
    'title' : 'value',
    'type': 'value',
    'is_on': 'checked',
    'image' : 'src'
};

registerElement = "#registerForm";
registerUrl = `{{ route('banner.store') }}`;

editElement = "#editForm";
editUrl = `{{ route('banner.update') }}`;
</script>

</x-admin-layout>
