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
                            @for ($i = 0, $j = count($orders); $i < count($orders); $i++, $j--)
                            <tr class="cursor-pointer" onClick="location.href='/admin/orders'">
                                <td class="text-left py-3 px-4">{{ $j }}</td>
                                <td class="text-left py-3 px-4">{{ $orders[$i]->id }}</td>
                                <td class="text-left py-3 px-4">{{ $orders[$i]->user->uid }}</td>
                                <td class="text-left py-3 px-4">{{ $orders[$i]->created_at }}</td>
                            </tr>
                            @endfor
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
                        @for ($i = 0, $j = count($users); $i < count($users); $i++, $j--)
                        <tr class="cursor-pointer" onClick="location.href='/admin/users'">
                            <td class="text-left py-3 px-4">{{ $j }}</td>
                            <td class="text-left py-3 px-4">{{ $users[$i]->uid }}</td>
                            <td class="text-left py-3 px-4">{{ $users[$i]->nickname }}</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:{{ $users[$i]->phone }}">{{ $users[$i]->phone }}</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:{{ $users[$i]->email }}">{{ $users[$i]->email }}</a></td>
                            <td class="text-left py-3 px-4">{{ $users[$i]->created_at }}</td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
</x-admin-layout>
