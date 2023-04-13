<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 items-center">
            <h2 class="text-lg text-white font-semibold leading-tight">
                Rincian Pesanan
            </h2>
            <h2 class="text-xl text-white font-bold leading-tight">
                Pembayaran
            </h2>
        </div>
    </x-slot>

    <div class="grid grid-cols-2 min-h-max">
        <div class="bg-white min-h-full flex flex-col justify-between border-r-2 border-r-gray-300">
            <div class="p-5">
                <div class="text-gray-800">
                    <div class="flex justify-between">
                        <h1><i class="uil uil-user-circle"></i> {{ $payment->order->customer->{'Customer-Name'} }}</h1>
                        <h1><i class="uil uil-calendar-alt"></i> {{ date('d-m-Y', strtotime($payment->order->{'Date'})) }}</h1>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full py-2">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Jml</th>
                                            <th scope="col" class="px-6 py-4">Nama</th>
                                            <th scope="col" class="px-6 py-4">Ice Level</th>
                                            <th scope="col" class="px-6 py-4">Sugar Level</th>
                                            <th scope="col" class="px-6 py-4">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $totalPrice = 0; @endphp
                                        @foreach ($payment->order->orderDetails as $key => $detail)
                                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                    {{ $detail->{'Quantity'} }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $detail->menu->{'Product-Name'} }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $detail->menu->{'Product-Type'} == 'Drink' ? $detail->{'Ice-Level'} : '' }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $detail->menu->{'Product-Type'} == 'Drink' ? $detail->{'Sugar-Level'} : '' }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ number_format($detail->menu->{'Product-Price'} * $detail->{'Quantity'}, 0, '.', ',') }}
                                                </td>
                                            </tr>

                                            @php $totalPrice += $detail->menu->{'Product-Price'} * $detail->{'Quantity'}; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-5">
                        <h1 class="text-3xl"><span class="text-base">Total :</span> Rp. {{ number_format($totalPrice, 0, '.', ',') }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{}" class="bg-white min-h-full flex flex-col justify-between">
            <div class="py-6 sm:px-6 lg:px-8">
                <div class="flex justify-between my-2">
                    <h3>Tagihan Pembayaran</h3>
                    <h3 class="text-xl text-green-600">Rp. {{ number_format($totalPrice, 0, '.', ',') }}</h3>
                </div>
                {{-- <div class="flex justify-between my-2">
                    <h3>Pembayaran</h3>
                    <h3 class="text-xl text-green-600">Rp. <span x-text="pembayaran"></span></h3>
                </div>
                <div class="flex justify-between my-2">
                    <h3>Kembalian</h3>
                    <h3 class="text-xl text-green-600">Rp. <span x-text="pembayaran"></span></h3>
                </div> --}}

                <div class="flex justify-between items-center mb-5">
                    <h3>Metode Pembayaran</h3>
                    <div class="grid w-[28rem] grid-cols-4 space-x-1 rounded-xl bg-gray-200 py-2 px-1">
                        <div>
                            <input type="radio" name="payment_method" id="1" class="peer hidden" value="Cash" disabled {{ $payment->{'Cash-Payment'} == 'Cash' ? 'checked' : '' }} />
                            <label for="1" class="block cursor-pointer select-none rounded-xl p-1 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Cash</label>
                        </div>

                        <div>
                            <input type="radio" name="payment_method" id="2" class="peer hidden" value="Debit" disabled {{ $payment->{'Debit-Card'} == 'Debit' ? 'checked' : '' }} />
                            <label for="2" class="block cursor-pointer select-none rounded-xl p-1 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Debit</label>
                        </div>

                        <div>
                            <input type="radio" name="payment_method" id="3" class="peer hidden" value="ShopeePay" disabled {{ $payment->{'ShopeePay-OVO'} == 'ShopeePay' ? 'checked' : '' }} />
                            <label for="3" class="block cursor-pointer select-none rounded-xl px-2 py-1 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">ShopeePay</label>
                        </div>

                        <div>
                            <input type="radio" name="payment_method" id="4" class="peer hidden" value="OVO" disabled {{ $payment->{'ShopeePay-OVO'} == 'OVO' ? 'checked' : '' }} />
                            <label for="4" class="block cursor-pointer select-none rounded-xl p-1 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">OVO</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-center items-center p-5">
                <h1 class="text-3xl">SUDAH DIBAYAR</h1>
                <p>{{ date('d-m-Y H:i:s', strtotime($payment->created_at)) }}</p>
            </div>
            {{-- <button class="w-full bg-teal-500 text-gray-100 hover:bg-teal-600 py-3 font-bold transition duration-200 ease-in-out" @click.prevent="$refs.paymentForm.submit();">
                <i class="uil uil-bill text-yellow-400"></i> Proses Bayar
            </button> --}}
        </div>
    </div>
</x-app-layout>
