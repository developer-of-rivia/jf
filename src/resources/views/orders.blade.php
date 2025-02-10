<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Заказы') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Номер заказа
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Дата
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Товары
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Цена
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order['id'] }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ date('d-m-Y', strtotime($order['created_at'])) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @foreach($order['products'] as $product)
                                                {{ $product->product->name }},
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $order['total_price'] }} P
                                        </td>
                                        <td>
                                            <form action="{{ route('orders.destroy') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="text" hidden name="id" value="{{ $order['id'] }}">
                                                <button type="submit">
                                                    <svg class="size-6 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <span class="text-white text-xl">Цена за все заказы:</span>
                <span class="text-white text-xl font-bold inline-block ms-2">
                    {{ $allOrdersTotal }} P
                </span>
            </div>
        </div>
    </div>
</x-app-layout>