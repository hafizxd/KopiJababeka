<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white font-bold text-center leading-tight">
            ORDER
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
                                                    <th scope="col" class="px-6 py-4">ID</th>
                                                    <th scope="col" class="px-6 py-4">Tanggal</th>
                                                    <th scope="col" class="px-6 py-4">Customer</th>
                                                    <th scope="col" class="px-6 py-4">No HP</th>
                                                    <th scope="col" class="px-6 py-4">Menu</th>
                                                    <th scope="col" class="px-6 py-4">Total Harga</th>
                                                    <th scope="col" class="px-6 py-4">Status Bayar</th>
                                                    <th scope="col" class="px-6 py-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $key => $order)
                                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            {{ $order->{'Order-ID'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ date('d-m-Y', strtotime($order->{'Date'})) }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $order->customer->{'Customer-Name'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $order->customer->{'Customer-Phone'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            @php $totalPrice = 0; @endphp
                                                            <table>
                                                                @foreach ($order->orderDetails as $orderDetail)
                                                                    <tr>
                                                                        <td class="pr-2">{{ $orderDetail->{'Quantity'} }}</td>
                                                                        <td class="pr-2">{{ $orderDetail->menu->{'Product-Name'} }}</td>
                                                                        <td class="pr-2">:</td>
                                                                        <td>{{ number_format($orderDetail->menu->{'Product-Price'}, 0, ',', '.') }}</td>

                                                                        @php $totalPrice += $orderDetail->menu->{'Product-Price'}; @endphp
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ number_format($totalPrice, 0, ',', '.') }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ isset($order->payment) ? 'Sudah' : 'Belum' }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            @if (isset($order->payment))
                                                                <a href="{{ route('payment.notification', ['paymentId' => $order->payment->{'Payment-ID'}]) }}">
                                                                    <button class="border-sky-500 border rounded-md px-3 py-2 hover:bg-sky-500 text-sky-500 hover:text-white transition duration-200 ease-in-out">Detail</button>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('payment.create', ['orderId' => $order->{'Order-ID'}]) }}">
                                                                    <button class="border-green-500 border rounded-md px-3 py-2 hover:bg-green-500 text-green-500 hover:text-white transition duration-200 ease-in-out">Bayar</button>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="pt-3">
                                            {{ $orders->links() }}
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
