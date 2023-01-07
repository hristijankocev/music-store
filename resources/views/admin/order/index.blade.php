@props(['orders'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--                    <div class="pb-3">--}}
                    {{--                        <a href="{{ route('tracks.create') }}"--}}
                    {{--                           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">--}}
                    {{--                            Add track--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Order #</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Order total</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">User #</th>
                                <th scope="col" class="px-6 py-3">Full name</th>
                                <th scope="col" class="px-6 py-3">Username</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Date of birth</th>
                                <th scope="col" class="px-6 py-3">Delivery address</th>
                                <th scope="col" class="px-6 py-3">Phone numbers</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.order.show', ['order' => $order->order_id]) }}"
                                           class="underline text-blue-600 hover:text-blue-500">
                                            {{ $order->order_id }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ $order->order_total }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->user_id }}</td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->user_name }}
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->user_username }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->user_date_birth }}</td>
                                    <td class="px-6 py-4">{{ $order->user_delivery_address }}</td>
                                    <td class="px-6 py-4">
                                        @foreach(explode(',',$order->user_phone_numbers) as $phone_number)
                                            <a href="tel:{{ $phone_number }}"
                                               class="whitespace-nowrap underline text-blue-600 hover:text-blue-500">{{ $phone_number }}</a>
                                            <br/>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-10">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
