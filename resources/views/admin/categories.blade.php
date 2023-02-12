@extends('layouts.admin.contents')

@section('menu', '카테고리')

@section('descriptionForRegister', '카테고리를 등록합니다')

@section('registerLeft')
    <div class="p-10 rounded" x-data="{ selected1 : false, selected2 : false }">
        <div class="">
            <label class="block text-sm text-gray-600" for="type">타입1</label>
            <select name="type" @change="$event.target.value == 'sub1' ? selected1=true : ($event.target.value == 'sub2' ? selected2=selected1=true : selected2=selected1=false)" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                <option value="">선택</option>
                <option value="main">대 카테고리</option>
                <option value="sub1">중 카테고리</option>
                <option value="sub2">소 카테고리</option>
            </select>
        </div>


        <div class="mt-2" x-show="selected1">
            <label class="block text-sm text-gray-600" for="type">대 카테고리 선택</label>
            @if (count($main) == 0)
            <p>아직 등록된 카테고리가 없습니다.</p>
            @else
            <select name="main" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                @foreach ($main as $m)
                <option value="{{ $m->id }}">{{ $m->name }}</option>
                @endforeach
            </select>
            @endif
        </div>

        <div class="mt-2" x-show="selected2">
            <label class="block text-sm text-gray-600" for="type">중 카테고리 선택</label>
            <select name="sub1" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                @foreach ($sub1 as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endsection

@section('registerRight')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="name">카테고리 이름</label>
            <input class="w-full px-5 py-1 text-gray-300 rounded" name="name" type="text" placeholder="카테고리 이름을 입력" required>
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

@section('descriptionForEdit', '등록한 카테고리를 수정합니다')

@section('editLeft')
    @php $categoryAll = \App\Models\Category::getAll(); @endphp
    <div id="xData" class="p-10 rounded" x-data="{ 
            selected1 : 0, 
            selected2 : 0,
            changed1 : false,
            changed2 : false,
            sub1s: [
                @foreach ($categoryAll as $category)
                    @if ($category->type == 'sub1')
                        { id: {{ $category->id }},
                        type: '{{ $category->type }}',
                        parent1: '{{ $category->parent1 }}',
                        name: '{{ $category->name }}'
                        },
                    @endif
                @endforeach
            ],
            reset() {
                this.selected1 = 0; 
                this.selected2 = 0;
                this.changed1 = false;
                this.changed2 = false;
            }
        }">
        <div class="">
            <label class="block text-sm text-gray-600" for="type">타입1</label>
            <select name="type" id="edit_type" @click="selected1=$event.target.value;$event.target.value == 'sub1' ? changed1=true : ($event.target.value == 'sub2' ? changed2=changed1=true : changed2=changed1=false)" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                <option value="">선택</option>
                <option value="main">대 카테고리</option>
                <option value="sub1">중 카테고리</option>
                <option value="sub2">소 카테고리</option>
            </select>
        </div>

        <div class="mt-2" x-show="changed1">
            <label class="block text-sm text-gray-600" for="type">대 카테고리 선택</label>
            @if (count($main) == 0)
            <p>아직 등록된 카테고리가 없습니다.</p>
            @else
            <select name="main" id="edit_main" @click="selected1 =='sub1' ? changed2=false : changed2=true;selected2=$event.target.value" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                @foreach ($main as $m)
                <option value="{{ $m->id }}">{{ $m->name }}</option>
                @endforeach
            </select>
            @endif
        </div>

        <div class="mt-2" x-show="changed2">
            <label class="block text-sm text-gray-600" for="type">중 카테고리 선택</label>
            <select name="sub1" id="edit_parent1" class="block w-full p-2 text-sm text-gray-500 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">선택</option>
                <template x-if="changed2">
                    <template x-for="sub1 in sub1s.filter(item => item.parent1 == selected2)" :key="sub1.id">
                        <option :value="sub1.id" x-text="sub1.name"></option>
                    </template>
                </template>
            </select>
        </div>
    </div>
@endsection

@section('editRight')
    <div class="p-10 rounded">
        <div class="">
            <label class="block text-sm text-gray-600" for="name">카테고리 이름</label>
            <input class="w-full px-5 py-1 text-gray-300 rounded" name="name" id="edit_name" type="text" placeholder="카테고리 이름을 입력" required>
        </div>

        <div class="mt-6 flex justify-end">
            <x-admin.btn type="button" for="cancel" xclick="edit=false;document.querySelector('#xData')._x_dataStack[0].reset()">
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
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">카테고리 이름</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">카테고리 타입</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">상위 카테고리1</th>
                <th scope="col" class="text-center py-3 px-4 font-semibold text-sm">상위 카테고리2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr @click="register=false;edit=true;getData('category', {{ $category->id }})" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="text-center py-3 px-2">{{ $category->id }}</td>
                <td class="text-center py-3 px-2">{{ $category->name }}</td>
                <td class="text-center py-3 px-2">{{ $category->type == 'main' ? "대" : ($category->type == 'sub1' ? "중" : "소") }}</td>                      
                <td class="text-center py-3 px-2">
                    @foreach ($categories as $c)
                    {{ $category->parent1 == $c->id ? $c->name : "" }}
                    @endforeach
                </td>
                <td class="text-center py-3 px-2">
                    @foreach ($categories as $c)
                    {{ $category->parent2 == $c->id ? $c->name : "" }}
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('pagination')
    <!-- pagination -->
    <div class="mt-5">
        {{ $categories->links() }}
    </div>
@endsection

<!-- form 처리 -->
@section('script')
    <script>
    getUrl = "/admin/category/";
    els = {
        'id': 'value',
        'name' : 'value',
        'type' : 'value',
        'parent1' : 'value',
        'parent2' : 'value'
    };

    registerElementName = "#registerForm";
    registerUrl = `{{ route('category.store') }}`;

    editElementName = "#editForm";
    editUrl = `{{ route('category.update') }}`;
    </script>
@endsection