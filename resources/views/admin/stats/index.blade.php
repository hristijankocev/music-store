@props(['tracks_sold', 'monthly_revenue', 'tracks_per_genre', 'tracks_per_year'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Statistics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto overflow-y-scroll block max-h-80 shadow-md sm:rounded-lg">
                        <p class="pb-2">Track sold per year</p>
                        <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Track name</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Times sold</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Year</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tracks_sold as $t)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $t->track_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $t->times_sold }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $t->year }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 pt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto overflow-y-scroll block max-h-80 shadow-md sm:rounded-lg">
                        <p class="pb-2">Tracks per genre</p>
                        <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Genre</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Number of tracks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tracks_per_genre as $g)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($g->genre) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $g->count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 pt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto overflow-y-scroll block max-h-80 shadow-md sm:rounded-lg">
                        <p class="pb-2">Number of tracks released each year</p>
                        <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Year</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Tracks released</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tracks_per_year as $s)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $s->year }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $s->released_songs }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 pt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto overflow-y-scroll block max-h-80 shadow-md sm:rounded-lg">
                        <p class="pb-2">Average monthly revenue</p>
                        <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Month</th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">Average</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($monthly_revenue as $m)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ date("F", mktime(null, null, null, $m->month)) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ $m->avg }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
