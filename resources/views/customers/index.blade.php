<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white font-bold text-center leading-tight">
            CUSTOMER
        </h2>
    </x-slot>

    <div class="grid grid-cols-3 gap-2 min-h-max">
        <div class="col-span-2 py-6">
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
                                                    <th scope="col" class="px-6 py-4">Nama</th>
                                                    <th scope="col" class="px-6 py-4">Alamat</th>
                                                    <th scope="col" class="px-6 py-4">No HP</th>
                                                    <th scope="col" class="px-6 py-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $key => $customer)
                                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            {{ $customer->{'Customer-ID'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $customer->{'Customer-Name'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $customer->{'Customer-Address'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $customer->{'Customer-Phone'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <a href="{{ route('customer.edit', ['id' => $customer->{'Customer-ID'}, 'page' => request()->get('page') ?? '']) }}">
                                                                <button class="border-yellow-500 border rounded-md px-3 py-2 hover:bg-yellow-500 text-yellow-500 hover:text-white transition duration-200 ease-in-out"><i class="uil uil-edit"></i></button>
                                                            </a>

                                                            <button onclick="document.querySelector('#customer-delete-{{ $key }}').submit();" class="ml-2 border-red-500 text-red-500 border rounded-md px-3 py-2 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out"><i class="uil uil-trash-alt"></i></button>

                                                            <form id="customer-delete-{{ $key }}" class="hidden" action="{{ route('customer.delete', ['id' => $customer->{'Customer-ID'}]) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="pt-3">
                                            {{ $customers->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white min-h-full flex flex-col justify-between">
            <div class="py-6 sm:px-6 lg:px-8">
                <h3>Tambah Customer</h3>

                <form id="customerForm" class="py-10" method="POST" action="{{ route('customer.store') }}">
                    @csrf

                    <!-- Customer ID -->
                    <div>
                        <x-input-label for="id" value="ID" />
                        <x-text-input id="id" class="block mt-1 w-full" type="text" name="customer_id" :value="old('customer_id')" required autofocus />
                        <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
                    </div>

                    <!-- Customer Name -->
                    <div class="pt-5">
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="customer_name" :value="old('customer_name')" required />
                        <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                    </div>

                    <!-- Customer Address -->
                    <div class="pt-5">
                        <x-input-label for="address" value="Address" />
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="customer_address" :value="old('customer_address')" />
                        <x-input-error :messages="$errors->get('customer_address')" class="mt-2" />
                    </div>

                    <!-- Customer Phone -->
                    <div class="pt-5">
                        <x-input-label for="phone" value="Phone" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="customer_phone" :value="old('customer_phone')" />
                        <x-input-error :messages="$errors->get('customer_phone')" class="mt-2" />
                    </div>
                </form>
            </div>

            <button class="bg-teal-500 text-gray-100 hover:bg-teal-600 py-3 font-bold transition duration-200 ease-in-out" onclick="document.querySelector('#customerForm').submit();">
                SIMPAN
            </button>
        </div>
    </div>

    <script></script>
</x-app-layout>
