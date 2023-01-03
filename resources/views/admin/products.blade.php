<x-admin-layout>
    @include('layouts.admin.header')  

    <!-- 상품 관리 -->
    <h1 class="text-3xl text-black pb-6">상품 관리</h1>
        <div class="flex flex-wrap mt-6 justify-end">
           <button type="button" class="inline-block rounded-md bg-cyan-600 px-4 py-1.5 shadow-sm text-white hover:bg-cyan-700 hover:ring-cyan-700">상품 등록</button>
        </div>

        <form action="">
            <div class="flex flex-wrap bg-white">
                <div class="w-full mt-12 lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <div class="p-10 rounded">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Name</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email">
                        </div>
                        <div class="mt-2">
                            <label class=" block text-sm text-gray-600" for="message">Message</label>
                            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="message" name="message" rows="6" required="" placeholder="Your inquiry.." aria-label="Email"></textarea>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-12 lg:w-1/2 pl-0 lg:pl-2">
                    <div class="p-10 rounded">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Name</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email">
                        </div>
                        <div class="mt-2">
                            <label class=" block text-sm text-gray-600" for="message">Message</label>
                            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="message" name="message" rows="6" required="" placeholder="Your inquiry.." aria-label="Email"></textarea>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Latest Reports
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Lian</td>
                            <td class="w-1/3 text-left py-3 px-4">Smith</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Emma</td>
                            <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</x-admin-layout>
