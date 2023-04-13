<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white font-bold text-center leading-tight">
            PRODUCT REPORT
        </h2>
    </x-slot>

    <div class="min-h-max">
        <div class="py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-800">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-left text-sm font-light">
                                            <thead class="border-b font-medium dark:border-neutral-500">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">Menu-ID</th>
                                                    <th scope="col" class="px-6 py-4">Product-Name</th>
                                                    <th scope="col" class="px-6 py-4">Terjual</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $key => $product)
                                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            {{ $product->{'Menu-ID'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $product->menu->{'Product-Name'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $product->{'SUM_QTY'} }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="pt-3">
                                            {{ $products->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
</x-app-layout>
