<x-admin-layout>
    @include('layouts.admin.header')  

    <!-- Dashboard -->
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>
        <div class="flex flex-wrap mt-6">
            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> 최근 들어온 주문
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">주문번호</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">회원 ID</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">주문일시</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4">aa</td>
                                <td class="text-left py-3 px-4">aa</td>
                                <td class="text-left py-3 px-4">ddd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> 최근 가입한 회원
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">회원 ID</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">닉네임</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">가입일</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr>
                            <td class="text-left py-3 px-4">1</td>
                            <td class="text-left py-3 px-4">Lian</td>
                            <td class="text-left py-3 px-4">Smith</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <td class="w-1/3 text-left py-3 px-4">Emma</td>
                            <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</x-admin-layout>
