@props(['items'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">#</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Name</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">$ Price</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Type</th>
                                <th scope="col" class="px-6 py-3">Add to cart</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->itemable->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ $item->price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ last(explode('\\' ,$item->itemable_type)) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                             viewBox="0 0 25 25">
                                            <style>
                                                .c {
                                                    fill: #cde;
                                                }
                                            </style>
                                            <path class="c"
                                                  d="m7.2 15 l0-0 1-2h8a2 2 0 0 0 2-1l4-7L20 4h-0l-1 2-3 5H8.5l-0-0L6 6l-1-2-1-2H1v2h2l3.5 8-1.5 2.5A2 2 0 0 0 7 17h12v-2H7az"/>
                                            <circle class="c" cx="7" cy="20" r="2"/>
                                            <circle class="c" cx="17" cy="20" r="2"/>
                                            <rect class="c" x="5" y="4" width="15" height="2"/>
                                        </svg>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-10">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
