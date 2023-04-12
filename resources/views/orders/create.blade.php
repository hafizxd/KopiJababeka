<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white font-bold text-center leading-tight">
            TAMBAH ORDER
        </h2>
    </x-slot>

    <div x-data="{ selectedOrders: [], payment: false }" class="grid grid-cols-5 gap-2 min-h-max">
        <div class="col-span-3 py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="p-1 text-gray-800">
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($menus as $key => $menu)
                            <div class="relative bg-white rounded-sm hover:cursor-pointer hover:shadow-md" :class="{ 'border-2': selectedOrders.find(o => o.id === '{{ $menu->{"Menu-ID"} }}'), 'border-yellow-400': selectedOrders.find(o => o.id === '{{ $menu->{"Menu-ID"} }}') }"
                                @click="selectedOrders.push({
                                    'id': '{{ $menu->{"Menu-ID"} }}',
                                    'name': '{{ $menu->{"Product-Name"} }}',
                                    'type': '{{ $menu->{"Product-Type"} }}',
                                    'price': '{{ $menu->{"Product-Price"} }}'
                                });">
                                <div x-text="selectedOrders.filter(val => val.id == '{{ $menu->{"Menu-ID"} }}').length" x-show="selectedOrders.find(o => o.id === '{{ $menu->{"Menu-ID"} }}')" class="absolute bg-yellow-500 px-2 py-1 text-white font-bold"></div>


                                <div class="flex items-center justify-center bg-gray-500 align-middle text-gray-400 h-20 w-full font-black text-3xl">
                                    <h3>{{ $menu->{'Menu-ID'} }}</h3>
                                </div>
                                <div class="bg-gray-700 text-white text-center py-1">{{ number_format($menu->{'Product-Price'}, 0, '.', ',') }}</div>

                                <p class="text-gray-800 text-center py-1">{{ $menu->{'Product-Name'} }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-2 bg-white min-h-full flex flex-col justify-between">
            <div class="py-6 sm:px-6 lg:px-8">
                <h3>Order</h3>

                <form x-ref="orderForm" class="py-10" method="POST" action="{{ route('order.store') }}">
                    @csrf

                    <input type="hidden" name="payment" :value="payment">

                    <div class="flex items-center gap-5 mb-5">
                        <label for="">Customer :</label>
                        <select name="customerId">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->{'Customer-ID'} }}">{{ $customer->{'Customer-Name'} }}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-input-error :messages="$errors->get('global')" class="mt-2" />

                    <table class="min-w-full">
                        <tr x-show="selectedOrders != 0">
                            <th></th>
                            <th>
                                <p class="text-left text-gray-600 text-xs mb-1">Sugar Level</p>
                            </th>
                            <th>
                                <p class="text-left text-gray-600 text-xs mb-1">Ice Level</p>
                            </th>
                            <th>
                                <p class="text-left text-gray-600 text-xs mb-1">Jumlah</p>
                            </th>
                            <th>
                                <p class="text-left text-gray-600 text-xs mb-1">Action</p>
                            </th>
                        </tr>
                        <template x-for="(selected, index) in selectedOrders">
                            <tr>
                                <input type="hidden" name="selectedIds[]" :value="selected.id">
                                <td class="py-3">
                                    <p x-text="selected.name"></p>
                                </td>
                                <td>
                                    <select name="sugar_level[]" id="" x-show="selected.type == 'Drink'">
                                        <option value="Less">Less</option>
                                        <option value="Normal">Normal</option>
                                        <option value="More">More</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="ice_level[]" id="" x-show="selected.type == 'Drink'">
                                        <option value="Less">Less</option>
                                        <option value="Normal">Normal</option>
                                        <option value="More">More</option>
                                    </select>
                                </td>
                                <td><input class="border-gray-600 rounded-sm w-20 text-center text-gray-700" min="1" value="1" type="number" name="qtys[]"></td>
                                <td><button type="button" @click="selectedOrders = selectedOrders.filter((val, key) => key != index)" class="border-red-500 text-red-500 border rounded-md px-3 py-2 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out"><i class="uil uil-trash-alt"></i></button></td>
                            </tr>
                        </template>
                    </table>
                </form>
            </div>

            <div class="flex">
                <button class="w-full bg-gray-400 text-gray-100 hover:bg-gray-500 py-3 font-bold transition duration-200 ease-in-out" @click.prevent="$refs.orderForm.submit();">
                    Simpan Saja
                </button>
                <button class="w-full bg-teal-500 text-gray-100 hover:bg-teal-600 py-3 font-bold transition duration-200 ease-in-out" @click.prevent="payment = true; $nextTick(() => { $refs.orderForm.submit() })">
                    <i class="uil uil-bill text-yellow-400"></i> Simpan & Bayar
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
