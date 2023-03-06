@extends('layouts.admin.contents')

@section('menu', '회원')

@section('descriptionForRegister', '회원 정보를 등록합니다')

@section('registerLeft')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="uid">아이디</label>
            <input class="w-full px-5 py-1 text-gray-300 rounded" name="uid" type="text" placeholder="회원 아이디" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">비밀번호</label>
            <input class="w-full px-5 py-1 text-gray-300 rounded" name="password" type="text" placeholder="비밀번호" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">이메일</label>
            <input type="email" class="w-full px-5 py-1 text-gray-300 rounded" name="email" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="nickname">회원명</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="nickname" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="phone">핸드폰</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="phone" required>
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

@section('descriptionForEdit', '등록한 회원 정보를 수정합니다')

@section('editLeft')
 <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="uid">아이디</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="uid" id="edit_uid" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">비밀번호</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="password" id="edit_password">
        </div>
       
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">이메일</label>
            <input type="email" class="w-full px-5 py-1 text-gray-300 rounded" name="email" id="edit_email" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="name">회원명</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="nickname" id="edit_nickname" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="phone">핸드폰</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="phone" id="edit_phone" required>
        </div>

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="created_at">가입일</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="created_at" id="edit_created_at" required>
        </div>
        
        <div class="mt-2 flex justify-end" x-data="{ toggle: true }">
            <label class="block mr-3 text-sm text-gray-600">탈퇴여부</label>
            <label class="relative inline-flex items-center cursor-pointer">
                <input name="is_deleted" type="checkbox" id="edit_is_deleted" value="Y" class="sr-only peer" x-model="toggle">
                <div class="w-11 h-6 bg-gray-200 rounded-full peer  peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                <span x-text="toggle ? '탈퇴' : '유지'" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
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
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">아이디</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">이메일</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">회원명</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">핸드폰</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">가입일</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">탈퇴여부</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr @click="register=false;edit=true;getData('user', {{ $user->id }})" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="text-center py-3 px-2">{{ $user->id }}</td>
                <td class="text-center py-3 px-2">{{ $user->uid }}</td>
                <td class="text-center py-3 px-2">{{ $user->email }}</td>
                <td class="text-center py-3 px-2">{{ $user->nickname }}</td>
                <td class="text-center py-3 px-2">{{ $user->phone }}</td>
                <td class="text-center py-3 px-2">{{ $user->created_at }}</td>
                <td class="text-center py-3 px-2">{{ $user->is_deleted }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('pagination')
    <!-- pagination -->
    <div class="mt-5">
        {{ $users->links() }}
    </div>
@endsection

<!-- form 처리 -->
@section('script')
    <script>
    getUrl = "/admin/user/";
    els = {
        'id' : 'value',
        'uid': 'value',
        'nickname' : 'value',
        'email' : 'value',
        'phone' : 'value',
        'created_at' : 'value',        
        'is_deleted': 'checked',
    };

    registerElementName = "#registerForm";
    registerUrl = `{{ route('user.store') }}`;

    editElementName = "#editForm";
    editUrl = `{{ route('user.update') }}`;
    </script>
@endsection
