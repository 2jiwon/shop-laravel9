<x-admin-layout>
    @include('layouts.admin.header')  

    <x-toast id="toast" type="success">
    </x-toast>

    <x-toast id="toast" type="danger">
    </x-toast>

    <!-- @yield('menu') 관리 -->
    <h1 class="text-3xl text-black pb-6">@yield('menu') 관리</h1>

    <!-- /* 등록 폼, 수정 폼 표시를 위한 x-data */ -->
    <div x-data="{ edit : false, register : false }">

        <div>
            <div class="flex flex-wrap mt-3 mb-3 justify-end">
                <button type="button" @click="register = !register" x-show="!edit" class="inline-block rounded-md bg-cyan-600 px-4 py-1.5 shadow-sm text-white hover:bg-cyan-700 hover:ring-cyan-700">
                @yield('menu') 등록
                </button>
            </div>

            <!-- 등록 form  -->
            <form enctype="multipart/form-data" x-cloak x-show="register" id="registerForm">
                <div class="flex flex-wrap bg-white">
                    <div class="w-full mt-8 lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <h1 class="text-xl mx-10 p-3 bg-tone rounded-lg">@yield('descriptionForRegister')</h1>

                        @yield('registerLeft')

                    </div>
                    <div class="w-full mt-20 lg:w-1/2 my-6 pr-0 lg:pr-2">

                        @yield('registerRight')
                    </div>
                
                </div>
            </form>
        </div>

        <!-- 수정 form -->
        <div x-cloak x-show="edit">
            <form enctype="multipart/form-data" x-show="edit" id="editForm">
                <input type="hidden" name="mode" value="edit">
                <input type="hidden" name="id" id="edit_id">
                <div class="flex flex-wrap bg-white">
                    <div class="w-full mt-8 lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <h1 class="text-xl mx-10 p-3 bg-tone rounded-lg">@yield('descriptionForEdit')</h1>
                        
                        @yield('editLeft')

                    </div>
                    <div class="w-full mt-20 lg:w-1/2 my-6 pr-0 lg:pr-2">

                        @yield('editRight')

                    </div>
                </div>
            </form>
        </div> 
        <!-- 수정 form End -->

        
        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i>@yield('menu') 목록 
            </p>
            <div class="bg-white overflow-auto">
                @yield('table')
            </div>
        </div>

    </div>

    <!-- pagination -->
    @yield('pagination')

<!-- form 처리 script -->
@yield('script')

</x-admin-layout>
