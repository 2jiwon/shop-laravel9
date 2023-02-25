@extends('layouts.admin.contents')

@section('menu', '주문')

@section('descriptionForEdit', '주문 정보를 수정합니다')

@section('editLeft')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="status">주문상태</label>
            <select name="status" id="edit_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach (\App\Models\Order::$status as $key => $val)
                <option value="{{ $key }}">{{ $val }}</option>
            @endforeach
            </select>
        </div>
        
        <div class="mt-5">
            <label class="block text-sm text-gray-600" for="user_uid">주문자 ID</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="user_uid" id="edit_uid" required>
        </div>
        
        <div class="mt-5">
            <label class="block text-sm text-gray-600" for="user_phone">연락처</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="user_phone" id="edit_phone" required>
        </div>

        <div class="mt-5">
            <label class="block text-sm text-gray-600" for="user_address">배송지</label>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="user_address" id="edit_address1" required>
            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="user_address" id="edit_address2" required>
        </div>

        <div class="mt-5 flex justify-end">
            <label class="block mr-2 text-sm text-gray-600" for="total_amount">주문금액 (원)</label>
            <input type="number" class="w-1/2 px-5 py-1 text-gray-300 rounded" id="edit_total_amount" name="total_amount">
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
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">주문상태</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">주문자 ID</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">연락처</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">배송지</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">주문금액</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr @click="register=false;edit=true;getData('order', {{ $order->id }})" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 hover:cursor-pointer">
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
@endsection

@section('pagination')
    <!-- pagination -->
    <div class="mt-5">
        {{ $orders->links() }}
    </div>
@endsection

<!-- form 처리 -->
@section('script')
<script>
getUrl = "/admin/order/";
els = {
    "id": "value",
    "status" : "value",
    "user" : {
        "uid" : "value"
    },
    "user_address" : {
        "phone" : "value",
        "address1" : "value",
        "address2" : "value"
    },
    "total_amount" : "value"
};

registerElementName = "#registerForm";
registerUrl = `{{ route('order.store') }}`;

editElementName = "#editForm";
editUrl = `{{ route('order.update') }}`;
</script>
@endsection
