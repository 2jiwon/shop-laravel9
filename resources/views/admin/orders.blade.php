<x-admin-layout>
    @include('layouts.admin.header')  

    <x-toast id="toast" type="success">
    </x-toast>

    <x-toast id="toast" type="danger">
    </x-toast>

    <h1 class="text-3xl text-black pb-6">주문 관리</h1>

    <!-- /* 등록 폼, 수정 폼 표시를 위한 x-data */ -->
    <div x-data="{ edit : false, register : false }">

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i>주문 목록 
            </p>
            <div class="bg-white overflow-auto">

                <table class="min-w-full  text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">번호</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">주문상태</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">주문자 ID</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">연락처</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">배송지</th>
                            <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">주문금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr @click="register=false;edit=true;_getData('order', {{ $order->id }})" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 hover:cursor-pointer">
                            <td class="text-center py-3 px-2">{{ $order->id }}</td>
                            <td class="text-center py-3 px-2">{{ \App\Models\Order::$status[$order->status] }}</td>
                            <td class="text-center py-3 px-2">{{ $order->user->uid }}</td>
                            <td class="text-center py-3 px-2">{{ $order->user_address->phone }}</td>
                            <td class="text-center py-3 px-2">{{ $order->user_address->address1 }} {{ $order->user_address->address2 }}</td>
                            <td class="text-center py-3 px-2">{{ number_format($order->total_amount) }} 원</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- pagination -->
    <div class="mt-5">
        {{ $orders->links() }}
    </div>

    <!-- form 처리 -->
    <script>
    function _getData(model, id) {
        location.href = "/admin/order/" + id;
    }
    </script>
</x-admin-layout>
