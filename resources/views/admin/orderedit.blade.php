<x-admin-layout>
    @include('layouts.admin.header')  

    <x-toast id="toast" type="success">
    </x-toast>

    <x-toast id="toast" type="danger">
    </x-toast>

    <h1 class="text-3xl text-black pb-6">주문 관리</h1>

    <!-- /* 등록 폼, 수정 폼 표시를 위한 x-data */ -->
    <div>

        <!-- 수정 form -->
        <form enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="mode" value="edit">
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="flex flex-wrap bg-white">
                <div class="w-full mt-8 lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <h1 class="text-xl mx-10 p-3 bg-tone rounded-lg">주문 정보를 수정합니다</h1>
                    
                    <div class="p-10 rounded">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="status">주문상태</label>
                            <select name="status" id="edit_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach (\App\Models\Order::$status as $key => $val)
                                @if ($order->status == $key)
                                <option value="{{ $key }}" selected>{{ $val }}</option>
                                @else
                                <option value="{{ $key }}">{{ $val }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        
                        <div class="mt-5">
                            <label class="block text-sm text-gray-600" for="user_uid">주문자 ID</label>
                            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="uid" id="edit_uid" value="{{ $order->user->uid }}">
                        </div>
                        
                        <div class="mt-5">
                            <label class="block text-sm text-gray-600" for="user_phone">연락처</label>
                            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="phone" id="edit_phone" value="{{ $order->user_address->phone }}">
                        </div>

                        <div class="mt-5">
                            <label class="block text-sm text-gray-600" for="user_address">배송지</label>
                            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="address1" id="edit_address1" value="{{ $order->user_address->address1 }}">
                            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="address2" id="edit_address2" value="{{ $order->user_address->address2 }}">
                        </div>

                        <div class="mt-5 flex justify-end">
                            <label class="block mr-2 text-sm text-gray-600" for="total_amount">주문금액 (원)</label>
                            <input type="number" class="w-1/2 px-5 py-1 text-gray-300 rounded" id="edit_total_amount" name="total_amount" value="{{ $order->total_amount }}">
                        </div>

                    </div>

                </div>
                <div class="w-full mt-20 lg:w-1/2 my-6 pr-0 lg:pr-2">

                    <div class="p-10 rounded">
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600 dark:text-white" for="image_main">상품</label>
                            
                            @for ($i = 0; $i < count($order->product); $i++)
                                @if ($i > 0)
                                <div class="mt-3"></div>
                                @endif
                            <input type="text" class="w-full px-5 py-1 text-gray-300 rounded" name="name" value="{{ $order->product[$i]->name }}" disabled>
                            <div class="flex justify-end">
                                <input type="text" class="w-1/3 px-5 py-1 text-gray-300 rounded text-right" name="selling_price" value="{{ $order->product[$i]->selling_price }}" disabled> 원
                            </div>
                            <div class="flex justify-end">
                                <input type="number" class="w-1/5 px-5 py-1 text-gray-300 rounded text-right" name="quantities[]" value="{{ $order->quantities[$i] }}"> 개
                            </div>
                            @endfor
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="button" onclick="location.href='/admin/orders/'" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm bg-gray-300 hover:bg-gray-400 focus:bg-gray-400">
                                취소
                            </button>
                            &nbsp;&nbsp;
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm bg-amber-400 hover:bg-amber-600 focus:bg-amber-600">
                                수정하기
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- 수정 form End -->

    </div>

    <!-- form 처리 -->
    <script>
    editElementName = "#editForm";
    editUrl = `{{ route('order.update') }}`;
    </script>
</x-admin-layout>
