<x-admin-layout>
    @include('layouts.admin.header')  

    <!-- 회원 관리 -->
    <h1 class="text-3xl text-black pb-6">회원 관리</h1>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i>회원 목록 
        </p>
        <div class="bg-white overflow-auto">
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
        </div>
    </div>

    <!-- pagination -->
    <div class="mt-5">
        {{ $users->links() }}
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
