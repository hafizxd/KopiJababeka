<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <div class="absolute">
                <a href="{{ route('user.index', ['page' => request()->get('page') ?? '']) }}" class="font-bold text-white">
                    <i class="uil uil-arrow-left"></i> Back
                </a>
            </div>
            <h2 class="text-xl text-white font-bold text-center leading-tight">
                EDIT USER
            </h2>
        </div>
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
                                                    <th scope="col" class="px-6 py-4">User-Login</th>
                                                    <th scope="col" class="px-6 py-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $key => $user)
                                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            {{ $user->{'User-ID'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $user->{'User-Name'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $user->{'User-Login'} }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <a href="{{ route('user.edit', ['id' => $user->{'User-ID'}]) }}">
                                                                <button class="border-yellow-500 border rounded-md px-3 py-2 hover:bg-yellow-500 text-yellow-500 hover:text-white transition duration-200 ease-in-out"><i class="uil uil-edit"></i></button>
                                                            </a>

                                                            <button onclick="document.querySelector('#user-delete-{{ $key }}').submit();" class="ml-2 border-red-500 text-red-500 border rounded-md px-3 py-2 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out"><i class="uil uil-trash-alt"></i></button>

                                                            <form id="user-delete-{{ $key }}" class="hidden" action="{{ route('user.delete', ['id' => $user->{'User-ID'}]) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="pt-3">
                                            {{ $users->links() }}
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
                <h3>Edit User</h3>

                <form id="userForm" class="py-10" method="POST" action="{{ route('user.update', ['id' => $userDetail->{'User-ID'}]) }}">
                    @method('PUT')
                    @csrf

                    <!-- User ID -->
                    <div>
                        <x-input-label for="id" value="ID" />
                        <x-text-input id="id" class="block mt-1 w-full bg-gray-300" type="text" name="user_id" value="{{ $userDetail->{'User-ID'} }}" required disabled />
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>

                    <!-- User Name -->
                    <div class="pt-5">
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="user_name" value="{{ $userDetail->{'User-Name'} }}" required autofocus />
                        <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
                    </div>

                    <!-- User-Login -->
                    <div class="pt-5">
                        <x-input-label for="user_login" value="User-Login" />
                        <x-text-input id="user_login" class="block mt-1 w-full bg-gray-300" type="text" name="user_login" value="{{ $userDetail->{'User-Login'} }}" disabled />
                        <x-input-error :messages="$errors->get('user_login')" class="mt-2" />
                    </div>
                </form>
            </div>

            <button class="bg-teal-500 text-gray-100 hover:bg-teal-600 py-3 font-bold transition duration-200 ease-in-out" onclick="document.querySelector('#userForm').submit();">
                SIMPAN
            </button>
        </div>
    </div>

    <script></script>
</x-app-layout>
