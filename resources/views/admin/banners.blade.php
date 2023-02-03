@extends('layouts.admin.contents')

@section('menu', '배너')

@section('descriptionForRegister', '메인 슬라이더, 이벤트, 컬렉션에 사용할 배너를 등록합니다')

@section('registerLeft')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="type">타입</label>
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

@section('descriptionForEdit', '등록한 배너를 수정합니다')

@section('editLeft')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="type">타입</label>
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
            <input class="block w-full px-5 py-1 text-gray-300 rounded border border-gray-300" name="image" type="file">
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
            <tr @click="register=false;edit=true;getData('banner', {{ $banner->id }})" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-amber-50 dark:hover:bg-gray-600 hover:cursor-pointer">
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
@endsection

@section('pagination')
    <!-- pagination -->
    <div class="mt-5">
        {{ $banners->links() }}
    </div>
@endsection

<!-- form 처리 -->
@section('script')
    <script>
    getUrl = "/admin/banner/";
    els = {
        'id': 'value',
        'title' : 'value',
        'type': 'value',
        'is_on': 'checked',
        'image' : 'src'
    };

    registerElementName = "#registerForm";
    registerUrl = `{{ route('banner.store') }}`;

    editElementName = "#editForm";
    editUrl = `{{ route('banner.update') }}`;
    </script>
@endsection